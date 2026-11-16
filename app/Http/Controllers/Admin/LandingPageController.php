<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\LandingPageSection;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class LandingPageController extends Controller
{
    public function index()
    {
        $pages = LandingPage::withCount('sections')->orderBy('order')->get();
        return view('admin.landing-pages.index', compact('pages'));
    }

    public function edit(LandingPage $landingPage)
    {
        $landingPage->load('sections');
        return view('admin.landing-pages.edit', compact('landingPage'));
    }

    public function update(Request $request, LandingPage $landingPage)
    {
        $data = $request->input('sections', []);
        $allFiles = $request->allFiles();
        $hasUpdated = false;

        foreach ($landingPage->sections as $section) {
            if (!isset($data[$section->id])) {
                continue;
            }

            $sectionInput = $data[$section->id];

            // Visibility
            if (array_key_exists('is_visible', $sectionInput)) {
                $section->is_visible = (bool) $sectionInput['is_visible'];
                unset($sectionInput['is_visible']);
            }

            if ($section->type === 'list') {
                $content = $section->content ?? [];

                if (isset($sectionInput['items']) && is_array($sectionInput['items'])) {
                    $newItems = [];
                    $secIdStr = (string) $section->id;

                    foreach ($sectionInput['items'] as $index => $item) {
                        $processedItem = $item;

                        // Check for file uploads in list item
                        if (isset($allFiles['sections'][$secIdStr]['items'][$index])) {
                            foreach ($allFiles['sections'][$secIdStr]['items'][$index] as $fileKey => $file) {
                                if ($file instanceof UploadedFile) {
                                    $path = $file->store('landing-pages', 'public');
                                    $processedItem[$fileKey] = 'storage/' . $path;
                                }
                            }
                        }

                        $newItems[] = $processedItem;
                    }

                    $content['items'] = $newItems;
                }

                // Header fields if any
                if (isset($sectionInput['header']) && is_array($sectionInput['header'])) {
                    $content['header'] = array_merge($content['header'] ?? [], $sectionInput['header']);
                }

                $section->content = $content;
            } else {
                // Text or single image
                $content = $section->content ?? [];

                foreach ($sectionInput as $key => $val) {
                    if ($key === 'type') continue;
                    $content[$key] = $val;
                }

                $secIdStr = (string) $section->id;
                $currentFiles = $allFiles['sections'][$secIdStr] ?? [];

                foreach ($currentFiles as $fileKey => $file) {
                    if ($file instanceof UploadedFile) {
                        $path = $file->store('landing-pages', 'public');
                        $content[$fileKey] = 'storage/' . $path;
                    }
                }

                $section->content = $content;
            }

            $section->save();
            $hasUpdated = true;
        }

        if ($hasUpdated) {
            $landingPage->touch();
        }

        return redirect()->route('admin.landing-pages.edit', $landingPage->slug)
            ->with('success', 'Perubahan konten halaman ' . $landingPage->title . ' berhasil disimpan!');
    }

    public function reset(LandingPage $landingPage)
    {
        try {
            Artisan::call('db:seed', [
                '--class' => 'LandingPageSeeder',
                '--force' => true,
            ]);

            return redirect()->route('admin.landing-pages.edit', $landingPage->slug)
                ->with('success', 'Konten halaman ' . $landingPage->title . ' berhasil direset ke pengaturan awal.');
        } catch (\Exception $e) {
            Log::error('Reset landing page failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mereset konten: ' . $e->getMessage());
        }
    }
}

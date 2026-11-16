<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WarrantyClaim;
use App\Notifications\WarrantyClaimUpdated;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function index(Request $request)
    {
        $query = WarrantyClaim::with(['serviceOrder', 'user'])->latest();

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $warrantyClaims = $query->paginate(15);

        $counts = [
            'all' => WarrantyClaim::count(),
            'pending' => WarrantyClaim::where('status', 'pending')->count(),
            'approved' => WarrantyClaim::where('status', 'approved')->count(),
            'rejected' => WarrantyClaim::where('status', 'rejected')->count(),
            'completed' => WarrantyClaim::where('status', 'completed')->count(),
        ];

        return view('admin.warranty.index', compact('warrantyClaims', 'counts'));
    }

    public function show($id)
    {
        $warrantyClaim = WarrantyClaim::with(['serviceOrder.technician', 'user'])->findOrFail($id);
        return view('admin.warranty.show', compact('warrantyClaim'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected,completed',
            'admin_note' => 'nullable|string',
        ]);

        $warrantyClaim = WarrantyClaim::findOrFail($id);
        $warrantyClaim->update([
            'status' => $request->status,
            'admin_note' => $request->admin_note,
            'resolved_at' => now(),
        ]);

        // Notify customer
        if ($warrantyClaim->user) {
            $warrantyClaim->user->notify(new WarrantyClaimUpdated($warrantyClaim));
        }

        return redirect()->route('admin.warranty.show', $warrantyClaim->id)
            ->with('success', 'Status klaim garansi berhasil diperbarui.');
    }
}

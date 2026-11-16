<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use App\Models\WarrantyClaim;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $serviceOrders = ServiceOrder::where('user_id', $user->id)->latest()->get();

        $totalCount = $serviceOrders->count();
        $activeCount = $serviceOrders->whereIn('status', ['pending', 'process'])->count();
        $completedCount = $serviceOrders->where('status', 'completed')->count();
        $warrantyActiveCount = $serviceOrders->filter(function ($order) {
            return $order->status === 'completed'
                && $order->warranty_start_date
                && $order->warranty_duration_days > 0
                && Carbon::parse($order->warranty_start_date)->addDays($order->warranty_duration_days)->gte(now());
        })->count();

        $recentOrders = ServiceOrder::where('user_id', $user->id)->latest()->take(5)->get();

        return view('customer.dashboard', compact(
            'totalCount', 'activeCount', 'completedCount', 'warrantyActiveCount', 'recentOrders'
        ));
    }

    public function serviceHistory()
    {
        $user = Auth::user();
        $serviceOrders = ServiceOrder::where('user_id', $user->id)
            ->latest()
            ->paginate(10);

        return view('customer.service-history', compact('serviceOrders'));
    }

    public function serviceDetail($id)
    {
        $user = Auth::user();
        $serviceOrder = ServiceOrder::where('user_id', $user->id)->findOrFail($id);
        $warrantyClaims = WarrantyClaim::where('service_order_id', $serviceOrder->id)->latest()->get();

        return view('customer.service-detail', compact('serviceOrder', 'warrantyClaims'));
    }

    public function warrantyIndex()
    {
        $user = Auth::user();
        $warrantyClaims = WarrantyClaim::where('user_id', $user->id)
            ->with('serviceOrder')
            ->latest()
            ->paginate(10);

        return view('customer.warranty.index', compact('warrantyClaims'));
    }

    public function warrantyCreate($serviceOrderId)
    {
        $user = Auth::user();
        $serviceOrder = ServiceOrder::where('user_id', $user->id)->findOrFail($serviceOrderId);

        // Validate: must be completed and under warranty
        if ($serviceOrder->status !== 'completed') {
            return redirect()->route('customer.service-history')
                ->with('error', 'Klaim garansi hanya bisa diajukan untuk servis yang sudah selesai.');
        }

        $isUnderWarranty = $serviceOrder->warranty_start_date
            && $serviceOrder->warranty_duration_days > 0
            && Carbon::parse($serviceOrder->warranty_start_date)
                ->addDays($serviceOrder->warranty_duration_days)
                ->gte(now());

        if (!$isUnderWarranty) {
            return redirect()->route('customer.service-history')
                ->with('error', 'Masa garansi untuk servis ini sudah berakhir.');
        }

        return view('customer.warranty.create', compact('serviceOrder'));
    }

    public function warrantyStore(Request $request)
    {
        $request->validate([
            'service_order_id' => 'required|exists:service_orders,id',
            'complaint' => 'required|string|min:20',
        ]);

        $user = Auth::user();
        $serviceOrder = ServiceOrder::where('user_id', $user->id)->findOrFail($request->service_order_id);

        // Validate under warranty
        $isUnderWarranty = $serviceOrder->status === 'completed'
            && $serviceOrder->warranty_start_date
            && $serviceOrder->warranty_duration_days > 0
            && Carbon::parse($serviceOrder->warranty_start_date)
                ->addDays($serviceOrder->warranty_duration_days)
                ->gte(now());

        if (!$isUnderWarranty) {
            return redirect()->route('customer.service-history')
                ->with('error', 'Masa garansi untuk servis ini sudah berakhir.');
        }

        $warrantyClaim = WarrantyClaim::create([
            'service_order_id' => $serviceOrder->id,
            'user_id' => $user->id,
            'complaint' => $request->complaint,
            'status' => 'pending',
        ]);

        // Notify all admins
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new \App\Notifications\WarrantyClaimSubmitted($warrantyClaim));
        }

        return redirect()->route('customer.warranty.index')
            ->with('success', 'Klaim garansi berhasil diajukan. Kami akan segera meninjau pengajuan Anda.');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('customer.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $userModel = User::find($user->id);
        $userModel->update([
            'name' => $request->name,
            'phone' => $request->phone ?? $userModel->phone,
        ]);

        // If password change requested
        if ($request->filled('current_password')) {
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|min:4|confirmed',
            ]);
            if (!\Illuminate\Support\Facades\Hash::check($request->current_password, $userModel->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
            }
            $userModel->password = \Illuminate\Support\Facades\Hash::make($request->password);
            $userModel->save();
        }

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}

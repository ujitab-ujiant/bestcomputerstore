<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'pelanggan')->withCount([
            'ownedServiceOrders as total_orders',
            'ownedServiceOrders as active_orders' => function ($q) {
                $q->whereIn('status', ['pending', 'process']);
            }
        ])->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $customers = $query->paginate(15);

        return view('admin.customers.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = User::where('role', 'pelanggan')->findOrFail($id);
        $serviceOrders = ServiceOrder::where('user_id', $customer->id)
            ->with(['technician', 'warrantyClaims'])
            ->latest()
            ->get();

        return view('admin.customers.show', compact('customer', 'serviceOrders'));
    }
}

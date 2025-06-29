<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ServiceOrderController extends Controller
{
    /**
     * 
     */

    private function convertRupiahToNumber($rupiahString)
    {
        return (float) preg_replace('/[^0-9]/', '', $rupiahString);
    }
    public function index(Request $request)
    {
        $query = ServiceOrder::query()->latest();
        
        if (Auth::user()->role == 'teknisi') {
            $query->where('technician_id', Auth::id());
        }

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('service_code', 'like', "%{$searchTerm}%")
                  ->orWhere('customer_name', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $from = Carbon::parse($request->date_from)->startOfDay();
            $to = Carbon::parse($request->date_to)->endOfDay();
            $query->whereBetween('created_at', [$from, $to]);
        } elseif ($request->filled('date_from')) {
            $from = Carbon::parse($request->date_from)->startOfDay();
            $query->whereDate('created_at', '>=', $from);
        } elseif ($request->filled('date_to')) {
            $to = Carbon::parse($request->date_to)->endOfDay();
            $query->whereDate('created_at', '<=', $to);
        }
        
        $serviceOrders = $query->paginate(10);
        return view('service-orders.index', compact('serviceOrders'));
    }

    /**
     * 
     */
    public function create()
    {
        $technicians = User::where('role', 'teknisi')->get();
        return view('service-orders.create', compact('technicians'));
    }

    /**
     * 
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'customer_email' => 'nullable|email|max:255',
            'customer_address' => 'nullable|string',
            'laptop_name' => 'required|string|max:255',
            'laptop_type' => 'required|string|max:255',
            'problem_description' => 'required|string',
            'status' => 'required|in:pending,process,completed,cancelled',
            'price' => 'nullable|string',
            'technician_id' => 'nullable|exists:users,id', 
        ]);

        $serviceCode = 'SVC-' . strtoupper(Str::random(6));
        
        $price = null;
        if ($request->filled('price')) {
            $price = $this->convertRupiahToNumber($request->price);
        }

        $customer = null;
        if ($request->filled('customer_phone')) {
            $customer = Customer::where('name', $request->customer_name)
                ->where('phone', $request->customer_phone)
                ->first();
        } else {
            $customer = Customer::where('name', $request->customer_name)->first();
        }

        if (!$customer) {
            $customer = Customer::create([
                'name' => $request->customer_name,
                'phone' => $request->customer_phone,
                'email' => $request->customer_email,
                'address' => $request->customer_address,
            ]);
        }

        $technicianId = null;
        if (Auth::user()->role == 'teknisi') {
            $technicianId = Auth::id();
        } elseif (Auth::user()->role == 'admin' && $request->filled('technician_id')) {
            $technicianId = $request->technician_id;
        }

        $serviceOrder = ServiceOrder::create([
            'service_code' => $serviceCode,
            'customer_id' => $customer->id,
            'customer_name' => $request->customer_name, 
            'laptop_name' => $request->laptop_name,
            'laptop_type' => $request->laptop_type,
            'problem_description' => $request->problem_description,
            'status' => $request->status,
            'price' => $price,
            'service_note' => $request->service_note,
            'technician_id' => $technicianId,
        ]);

        return redirect()->route('service-orders.index')
            ->with('success', 'Service order created successfully with code: ' . $serviceCode);
    }

    /**
     * 
     */
    public function show(ServiceOrder $serviceOrder)
    {
        return view('service-orders.show', compact('serviceOrder'));
    }

    /**
     * 
     */
    public function edit(ServiceOrder $serviceOrder)
    {
        $technicians = User::where('role', 'teknisi')->get();
        return view('service-orders.edit', compact('serviceOrder', 'technicians'));
    }

    /**
     * 
     */
    public function update(Request $request, ServiceOrder $serviceOrder)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'customer_email' => 'nullable|email|max:255',
            'customer_address' => 'nullable|string',
            'laptop_name' => 'required|string|max:255',
            'laptop_type' => 'required|string|max:255',
            'problem_description' => 'required|string',
            'status' => 'required|in:pending,process,completed,cancelled',
            'price' => 'nullable|string',
            'technician_id' => 'nullable|exists:users,id',
        ]);

        $price = null;
        if ($request->filled('price')) {
            $price = $this->convertRupiahToNumber($request->price);
        }

        if ($serviceOrder->customer_id) {
            $customer = Customer::find($serviceOrder->customer_id);
            if ($customer) {
                $customer->update([
                    'name' => $request->customer_name,
                    'phone' => $request->customer_phone,
                    'email' => $request->customer_email,
                    'address' => $request->customer_address,
                ]);
            }
        } else {
            $customer = null;
            if ($request->filled('customer_phone')) {
                $customer = Customer::where('name', $request->customer_name)
                    ->where('phone', $request->customer_phone)
                    ->first();
            } else {
                $customer = Customer::where('name', $request->customer_name)->first();
            }

            if (!$customer) {
                $customer = Customer::create([
                    'name' => $request->customer_name,
                    'phone' => $request->customer_phone,
                    'email' => $request->customer_email,
                    'address' => $request->customer_address,
                ]);
            }
        }

        $serviceOrder->update([
            'customer_id' => $customer->id ?? null,
            'customer_name' => $request->customer_name,
            'laptop_name' => $request->laptop_name,
            'laptop_type' => $request->laptop_type,
            'problem_description' => $request->problem_description,
            'status' => $request->status,
            'price' => $price,
            'service_note' => $request->service_note,
            'technician_id' => $request->technician_id ?? $serviceOrder->technician_id,
        ]);

        return redirect()->route('service-orders.index')
            ->with('success', 'Service order updated successfully!');
    }

    /**
     * 
     */
    public function destroy(ServiceOrder $serviceOrder)
    {
        $serviceOrder->delete();
        
        return redirect()->route('service-orders.index')
            ->with('success', 'Service order deleted successfully!');
    }
    
    /**
     * 
     */
    public function checkStatus(Request $request)
    {
        $request->validate([
            'service_code' => 'required|string',
        ]);
    
        $serviceOrder = ServiceOrder::where('service_code', $request->service_code)->first();
    
        if (!$serviceOrder) {
            return back()->with('error', 'Service code not found!');
        }
    
        return view('service-status-result', compact('serviceOrder'));
    }

    public function customerHistory($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $serviceOrders = $customer->serviceOrders()->latest()->get();
        
        return view('service-orders.customer-history', compact('customer', 'serviceOrders'));
    }

    /**
     * 
     */
    public function report(Request $request)
    {
        if (!in_array(Auth::user()->role, ['admin', 'teknisi'])) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki hak akses.');
        }
        
        $query = ServiceOrder::query()->latest();

        if (Auth::user()->role == 'teknisi') {
            $query->where('technician_id', Auth::id());
        }

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $from = Carbon::parse($request->date_from)->startOfDay();
            $to = Carbon::parse($request->date_to)->endOfDay();
            $query->whereBetween('created_at', [$from, $to]);
        } elseif ($request->filled('date_from')) {
            $from = Carbon::parse($request->date_from)->startOfDay();
            $query->whereDate('created_at', '>=', $from);
        } elseif ($request->filled('date_to')) {
            $to = Carbon::parse($request->date_to)->endOfDay();
            $query->whereDate('created_at', '<=', $to);
        }

        if ($request->filled('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }
        
        $serviceOrders = $query->get();
        
        return view('service-orders.report', [
            'serviceOrders' => $serviceOrders,
            'dateFrom' => $request->filled('date_from') ? $request->date_from : null,
            'dateTo' => $request->filled('date_to') ? $request->date_to : null,
            'status' => $request->filled('status') ? $request->status : 'all'
        ]);
    }
    
    /**
     * 
     */
    public function printReport(Request $request)
    {
        if (!in_array(Auth::user()->role, ['admin', 'teknisi'])) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki hak akses.');
        }
        
        $query = ServiceOrder::query()->latest();

        if (Auth::user()->role == 'teknisi') {
            $query->where('technician_id', Auth::id());
        }

        if ($request->filled('date_from') && $request->filled('date_to')) {
            $from = Carbon::parse($request->date_from)->startOfDay();
            $to = Carbon::parse($request->date_to)->endOfDay();
            $query->whereBetween('created_at', [$from, $to]);
        } elseif ($request->filled('date_from')) {
            $from = Carbon::parse($request->date_from)->startOfDay();
            $query->whereDate('created_at', '>=', $from);
        } elseif ($request->filled('date_to')) {
            $to = Carbon::parse($request->date_to)->endOfDay();
            $query->whereDate('created_at', '<=', $to);
        }

        if ($request->filled('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }
        
        $serviceOrders = $query->get();
        
        $data = [
            'serviceOrders' => $serviceOrders,
            'dateFrom' => $request->filled('date_from') ? Carbon::parse($request->date_from)->format('d M Y') : 'All time',
            'dateTo' => $request->filled('date_to') ? Carbon::parse($request->date_to)->format('d M Y') : 'Present',
            'status' => $request->filled('status') ? ucfirst($request->status) : 'All statuses',
            'generatedAt' => Carbon::now()->format('d M Y H:i'),
            'generatedBy' => Auth::user()->name,
        ];
        
        return view('service-orders.print', $data);
    }
}
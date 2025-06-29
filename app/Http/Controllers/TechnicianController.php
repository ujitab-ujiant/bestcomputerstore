<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TechnicianController extends Controller
{
    /**
     * 
     */
    public function index(Request $request)
    {
        $query = User::where('role', 'teknisi');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $query->orderBy('created_at', 'desc');

        $technicians = $query->paginate(10);
        
        return view('technicians.index', compact('technicians'));
    }

    /**
     * 
     */
    public function create()
    {
        return view('technicians.create');
    }

    /**
     * 
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'teknisi',
        ]);

        return redirect()->route('technicians.index')
            ->with('success', 'Teknisi berhasil ditambahkan.');
    }

    /**
     * 
     */
    public function show(string $id)
    {
        $technician = User::findOrFail($id);

        if ($technician->role !== 'teknisi') {
            return redirect()->route('technicians.index')
                ->with('error', 'User tersebut bukan teknisi.');
        }

        $serviceOrdersCount = $technician->serviceOrders()->count();
        $recentServiceOrders = $technician->serviceOrders()
            ->with(['customer'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        
        return view('technicians.show', compact('technician', 'serviceOrdersCount', 'recentServiceOrders'));
    }

    /**
     * 
     */
    public function edit(string $id)
    {
        $technician = User::findOrFail($id);

        if ($technician->role !== 'teknisi') {
            return redirect()->route('technicians.index')
                ->with('error', 'User tersebut bukan teknisi.');
        }
        
        return view('technicians.edit', compact('technician'));
    }

    /**
     * 
     */
    public function update(Request $request, string $id)
    {
        $technician = User::findOrFail($id);
        
        if ($technician->role !== 'teknisi') {
            return redirect()->route('technicians.index')
                ->with('error', 'User tersebut bukan teknisi.');
        }
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8',
        ]);

        $technician->name = $validated['name'];
        $technician->email = $validated['email'];
        
        if (!empty($validated['password'])) {
            $technician->password = Hash::make($validated['password']);
        }
        
        $technician->save();

        return redirect()->route('technicians.index')
            ->with('success', 'Informasi teknisi berhasil diperbarui.');
    }

    /**
     * 
     */
    public function destroy(string $id)
    {
        $technician = User::findOrFail($id);

        if ($technician->role !== 'teknisi') {
            return redirect()->route('technicians.index')
                ->with('error', 'User tersebut bukan teknisi.');
        }

        $activeServiceOrders = $technician->serviceOrders()
            ->whereIn('status', ['pending', 'process'])
            ->count();
            
        if ($activeServiceOrders > 0) {
            return redirect()->route('technicians.index')
                ->with('error', 'Tidak dapat menghapus teknisi yang masih memiliki service order aktif.');
        }
        
        $technician->delete();

        return redirect()->route('technicians.index')
            ->with('success', 'Teknisi berhasil dihapus.');
    }
}
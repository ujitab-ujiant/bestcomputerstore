<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceOrder;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $pendingCount = ServiceOrder::where('status', 'pending')->count();
            $processCount = ServiceOrder::where('status', 'process')->count();
            $completedCount = ServiceOrder::where('status', 'completed')->count();

            $techniciansCount = User::where('role', 'teknisi')->where('id', '!=', $user->id)->count();
            $productsCount = Product::where('status', 'active')->count();

            $todayOrders = ServiceOrder::whereDate('created_at', Carbon::today())->count();
            $weeklyOrders = ServiceOrder::whereBetween('created_at', [
                Carbon::now()->startOfWeek(), 
                Carbon::now()->endOfWeek()
            ])->count();
            $monthlyOrders = ServiceOrder::whereMonth('created_at', Carbon::now()->month)
                                       ->whereYear('created_at', Carbon::now()->year)
                                       ->count();

            $urgentOrders = ServiceOrder::whereIn('status', ['pending', 'process'])
                                      ->where('created_at', '<', Carbon::now()->subDays(3))
                                      ->count();

            $recentOrders = ServiceOrder::with('technician')
                                      ->orderBy('created_at', 'desc')
                                      ->take(10)
                                      ->get()
                                      ->map(function($order) {
                                          $order->technician_name = $order->technician ? $order->technician->name : null;
                                          return $order;
                                      });

            $averageRating = '4.5'; 
            
        } 
        else if ($user->role === 'teknisi') {
            $pendingCount = ServiceOrder::where('status', 'pending')
                                      ->where('technician_id', $user->id)
                                      ->count();
            $processCount = ServiceOrder::where('status', 'process')
                                      ->where('technician_id', $user->id)
                                      ->count();
            $completedCount = ServiceOrder::where('status', 'completed')
                                        ->where('technician_id', $user->id)
                                        ->count();
            
            $techniciansCount = 1; 
            $productsCount = Product::where('status', 'active')->count(); 
            
            $todayOrders = ServiceOrder::where('technician_id', $user->id)
                                     ->whereDate('created_at', Carbon::today())
                                     ->count();
            $weeklyOrders = ServiceOrder::where('technician_id', $user->id)
                                      ->whereBetween('created_at', [
                                          Carbon::now()->startOfWeek(), 
                                          Carbon::now()->endOfWeek()
                                      ])->count();
            $monthlyOrders = ServiceOrder::where('technician_id', $user->id)
                                       ->whereMonth('created_at', Carbon::now()->month)
                                       ->whereYear('created_at', Carbon::now()->year)
                                       ->count();
            
            $urgentOrders = ServiceOrder::where('technician_id', $user->id)
                                      ->whereIn('status', ['pending', 'process'])
                                      ->where('created_at', '<', Carbon::now()->subDays(3))
                                      ->count();
                                      
            $recentOrders = ServiceOrder::where('technician_id', $user->id)
                                       ->with('technician')
                                       ->orderBy('created_at', 'desc')
                                       ->take(10)
                                       ->get()
                                       ->map(function($order) {
                                           $order->technician_name = $order->technician ? $order->technician->name : null;
                                           return $order;
                                       });
                                       
            $averageRating = '4.5'; 
        }
        
        return view('dashboard', compact(
            'pendingCount', 
            'processCount', 
            'completedCount', 
            'techniciansCount',
            'productsCount',
            'todayOrders',
            'weeklyOrders', 
            'monthlyOrders',
            'urgentOrders',
            'averageRating',
            'recentOrders'
        ));
    }
}
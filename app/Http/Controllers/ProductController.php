<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * 
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('brand', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('category', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('sku', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('code', 'LIKE', "%{$searchTerm}%");
            });
        }

 
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('featured')) {
            $query->where('featured', $request->featured == '1');
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        $allowedSortFields = ['name', 'price', 'category', 'brand', 'status', 'created_at'];
        if (in_array($sortBy, $allowedSortFields)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $products = $query->paginate(10);
 
        $categories = Product::distinct()->pluck('category')->filter()->sort();
        $brands = Product::distinct()->pluck('brand')->filter()->sort();

        $statistics = $this->getProductStatistics($request);

        return view('admin.products.index', compact('products', 'categories', 'brands', 'statistics'));
    }

    /**
     * 
     */
    public function report(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('brand', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('category', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('sku', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('code', 'LIKE', "%{$searchTerm}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('featured')) {
            $query->where('featured', $request->featured == '1');
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        $allowedSortFields = ['name', 'price', 'category', 'brand', 'status', 'created_at'];
        if (in_array($sortBy, $allowedSortFields)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $products = $query->get();
        $statistics = $this->getProductStatistics($request);

        $filters = [
            'search' => $request->search,
            'category' => $request->category,
            'brand' => $request->brand,
            'status' => $request->status,
            'featured' => $request->featured,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'sort_by' => $sortBy,
            'sort_order' => $sortOrder
        ];

        return view('admin.products.report', compact('products', 'statistics', 'filters'));
    }

    /**
     * 
     */
    public function print(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('brand', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('category', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('sku', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('code', 'LIKE', "%{$searchTerm}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('featured')) {
            $query->where('featured', $request->featured == '1');
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        $allowedSortFields = ['name', 'price', 'category', 'brand', 'status', 'created_at'];
        if (in_array($sortBy, $allowedSortFields)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $products = $query->get();
        $statistics = $this->getProductStatistics($request);
        
        $filters = [
            'search' => $request->search,
            'category' => $request->category,
            'brand' => $request->brand,
            'status' => $request->status,
            'featured' => $request->featured,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'sort_by' => $sortBy,
            'sort_order' => $sortOrder
        ];

        return view('admin.products.print', compact('products', 'statistics', 'filters'));
    }

    /**
     * 
     */
    private function getProductStatistics(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('brand', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('category', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('sku', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('code', 'LIKE', "%{$searchTerm}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('featured')) {
            $query->where('featured', $request->featured == '1');
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $baseQuery = clone $query;

        return [
            'total_products' => $baseQuery->count(),
            'active_products' => (clone $query)->where('status', 'active')->count(),
            'inactive_products' => (clone $query)->where('status', 'inactive')->count(),
            'featured_products' => (clone $query)->where('featured', true)->count(),
            'products_by_category' => (clone $query)->select('category')
                ->selectRaw('count(*) as count')
                ->groupBy('category')
                ->pluck('count', 'category')
                ->toArray(),
            'products_by_brand' => (clone $query)->select('brand')
                ->selectRaw('count(*) as count')
                ->groupBy('brand')
                ->orderBy('count', 'desc')
                ->limit(10)
                ->pluck('count', 'brand')
                ->toArray(),
            'price_statistics' => [
                'min_price' => (clone $query)->min('price') ?? 0,
                'max_price' => (clone $query)->max('price') ?? 0,
                'avg_price' => (clone $query)->avg('price') ?? 0,
            ],
            'recent_products' => (clone $query)->orderBy('created_at', 'desc')->limit(5)->get(),
        ];
    }

    /**
     * 
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * 
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * 
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * 
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'category' => 'required|string|max:100',
            'subcategory' => 'nullable|string|max:100',
            'brand' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'marketplace_shopee' => 'nullable|url',
            'marketplace_tokopedia' => 'nullable|url',
            'sku' => 'nullable|string|max:50',
            'code' => 'nullable|string|max:50',
            'weight' => 'nullable|numeric',
            'status' => 'required|in:active,inactive',
            'featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('img/products'), $imageName);
            $validated['image'] = $imageName;
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * 
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'category' => 'required|string|max:100',
            'subcategory' => 'nullable|string|max:100',
            'brand' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'marketplace_shopee' => 'nullable|url',
            'marketplace_tokopedia' => 'nullable|url',
            'sku' => 'nullable|string|max:50',
            'code' => 'nullable|string|max:50',
            'weight' => 'nullable|numeric',
            'status' => 'required|in:active,inactive',
            'featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                $oldImagePath = public_path('img/products/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            $image = $request->file('image');
            $imageName = time() . '-' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            
            $image->move(public_path('img/products'), $imageName);
            $validated['image'] = $imageName;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * 
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            $imagePath = public_path('img/products/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
    
    /**
     * 
     */
    public function showPcPeripherals()
    {
        $pcComponents = Product::where('category', 'PC Component')
                            ->where('status', 'active')
                            ->orderBy('created_at', 'desc') 
                            ->get();
                            
        $peripherals = Product::where('category', 'Peripheral')
                            ->where('status', 'active')
                            ->orderBy('created_at', 'desc') 
                            ->get();
                            
        $securityProducts = Product::where('category', 'Security')
                                ->where('status', 'active')
                                ->orderBy('created_at', 'desc') 
                                ->get();
 
        $featuredProducts = Product::where('featured', true)
                                ->where('status', 'active')
                                ->orderBy('created_at', 'desc')
                                ->take(12) 
                                ->get();
        
        return view('pcperipheral', compact('pcComponents', 'peripherals', 'securityProducts', 'featuredProducts'));
    }
    public function showProductDetail($id)
    {
        $product = Product::where('id', $id)
                        ->where('status', 'active')
                        ->firstOrFail();

        $relatedProducts = Product::where('category', $product->category)
                                ->where('id', '!=', $id)
                                ->where('status', 'active')
                                ->limit(4)
                                ->get();
        
        return view('product-detail', compact('product', 'relatedProducts'));
    }
}
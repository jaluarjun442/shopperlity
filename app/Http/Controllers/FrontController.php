<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\Store;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latest_data = Products::latest()->limit(8)->get();
        $category_data = Category::where('parent_category_id', null)->get();
        return view('welcome', compact('latest_data', 'category_data'));
    }
    public function page($page)
    {
        $store_data = [];
        $view = 'page.' . $page;
        if (view()->exists($view)) {
            $store_id = store_id();
            $store_data = Store::where('id', $store_id)->first();
        } else {
            $view = '404';
        }
        return view($view, compact('store_data'));
    }
    public function category(Request $request, $slug)
    {
        $data = Products::with('categories.category')
            ->whereHas('categories.category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->orderBy('id', 'desc')
            ->latest()
            ->paginate(8);
        $category_data = Category::with('childCategory')->where('slug', $slug)->first();
        if ($request->ajax()) {
            return view('front.category.products_data', compact('data'))->render();
        }
        return view('front.category.index', compact('data', 'slug', 'category_data'));
    }
    public function product($id, $slug)
    {
        $data = Products::with(['categories', 'products_attributes', 'products_images'])
            ->where('id', $id)
            ->first();
        if ($data) {
            $productId = $id;
            $related_data = Products::with('categories.category', 'products_images')
                ->whereHas('categories.category', function ($query) use ($productId) {
                    $query->whereIn('id', function ($query) use ($productId) {
                        $query->select('category_id')
                            ->from('products_categories')
                            ->where('product_id', $productId);
                    });
                })
                ->where('id', '!=', $productId)
                ->inRandomOrder()
                ->take(8)
                ->get();
            $prev_next_data = Products::limit(2)->inRandomOrder()->get();
            return view('front.product.index', compact('data', 'related_data', 'prev_next_data'));
        }
    }
}

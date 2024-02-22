<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Store;
use Illuminate\Support\Str;
use DataTables;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ck_product_upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            $image = $filenametostore;
            $request->file('upload')->move("uploads/ck/", $image);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/ck/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
    public function index()
    {
        return view('admin.home');
    }
    public function home()
    {
        return view('admin.home');
    }
    public function store()
    {
        return view('admin/store/index');
    }
    public function add_store()
    {
        return view('admin/store/add');
    }
    public function edit_store($store_id)
    {
        $store_data = Store::where('id', $store_id)->first();
        return view('admin/store/edit', compact('store_id', 'store_data'));
    }
    public function save_store(Request $request)
    {
        $file = $request->file('logo');
        $image = $request->post('name') . rand(1111111111, 9999999999) . "." . $file->getClientOriginalExtension();
        $file->move("uploads/category/", $image);

        $data = Store::create(
            [
                'name' => $request->post('name'),
                'logo' => $image,
                'website' => $request->post('website'),
                'website_url' => $request->post('website_url'),
                'email' => $request->post('email'),
                'tag_id' => $request->post('tag_id'),
                'phone' => $request->post('phone'),
                'payment' => $request->post('payment'),
                'pan_card' => $request->post('pan_card'),
                'about_us_tag' => $request->post('about_us_tag'),
                'header_script' => $request->post('header_script'),
                'sidebar_script' => $request->post('sidebar_script'),
                'footer_script' => $request->post('footer_script'),
                'status' => $request->post('status')
            ]
        );
        if ($data) {
            return redirect()->route('admin.store')->with('success', 'Data Added Successfully.');
        }
    }
    public function update_store(Request $request)
    {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $image = $request->post('name') . rand(1111111111, 9999999999) . "." . $file->getClientOriginalExtension();
            $file->move("uploads/category/", $image);
        } else {
            $image = $request->post('old_logo');
        }
        $data = Store::where('id', $request->post('id'))
            ->update(
                [
                    'name' => $request->post('name'),
                    'logo' => $image,
                    'website' => $request->post('website'),
                    'website_url' => $request->post('website_url'),
                    'email' => $request->post('email'),
                    'tag_id' => $request->post('tag_id'),
                    'phone' => $request->post('phone'),
                    'payment' => $request->post('payment'),
                    'pan_card' => $request->post('pan_card'),
                    'about_us_tag' => $request->post('about_us_tag'),
                    'header_script' => $request->post('header_script'),
                    'sidebar_script' => $request->post('sidebar_script'),
                    'footer_script' => $request->post('footer_script'),
                    'status' => $request->post('status')
                ]
            );
        if ($data) {
            return redirect()->route('admin.store')->with('success', 'Data Added Successfully.');
        }
    }

    public function get_store(Request $request)
    {
        $data = Store::select('*');
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('logo', function ($row) {
                return "<img src='" . asset('uploads/category') . '/' . $row['logo'] . "' style='width:50px; height:50px;' />";
            })
            ->addColumn('action', function ($row) {
                $btn = "";
                $btn .= '<a href="' . route('admin.edit_store', $row['id']) . '" class="edit mr-2 btn btn-info btn-sm">Edit</a>';
                // $btn .= '<a href="javascript:void(0)" class="edit mr-2 btn btn-warning btn-sm">View</a>';
                return $btn;
            })
            ->rawColumns(['action', 'logo'])
            ->make(true);
    }
    public function category()
    {
        return view('admin/category/index');
    }
    public function get_category(Request $request)
    {
        $data = Category::select('*');
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('image', function ($row) {
                return "<img src='" . asset('uploads/category') . '/' . $row['image'] . "' style='width:50px; height:50px;' />";
            })
            ->addColumn('action', function ($row) {
                $btn = "";
                $btn .= '<a href="' . route('admin.edit_category', $row['id']) . '" class="edit mr-2 btn btn-info btn-sm">Edit</a>';
                // $btn .= '<a href="javascript:void(0)" class="edit mr-2 btn btn-warning btn-sm">Edit</a>';
                return $btn;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }
    public function edit_category($category_id)
    {
        $category_data = Category::where('id', $category_id)->first();
        return view('admin/category/edit', compact('category_id', 'category_data'));
    }
    public function update_category(Request $request)
    {
        $name = $request->post('name');
        $slug = Str::slug($request->post('name'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $name . rand(1111111111, 9999999999) . "." . $file->getClientOriginalExtension();
            $file->move("uploads/category/", $image);
        } else {
            $image = $request->post('old_image');
        }

        $data = Category::where('id', $request->post('id'))
            ->update(
                [
                    'name' => $name,
                    'image' => $image,
                    'slug' => $slug,
                ]
            );
        if ($data) {
            return redirect()->route('admin.category')->with('success', 'Data Added Successfully.');
        }
    }
    public function add_category()
    {
        return view('admin/category/add');
    }
    public function save_category(Request $request)
    {
        $name = $request->post('name');
        $file = $request->file('image');
        $image = $name . rand(1111111111, 9999999999) . "." . $file->getClientOriginalExtension();
        $file->move("uploads/category/", $image);
        $slug = Str::slug($request->post('name'));

        $data = Category::create(
            [
                'name' => $name,
                'image' => $image,
                'slug' => $slug,
            ]
        );
        if ($data) {
            return redirect()->route('admin.category')->with('success', 'Data Added Successfully.');
        }
    }

    public function product()
    {

        return view('admin/product/index');
    }
    public function get_product(Request $request)
    {
        $data = Products::orderBy('id', 'desc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('image', function ($row) {
                return "<img src='" . asset('uploads/product') . '/' . $row['image'] . "' style='width:50px; height:50px;' />";
            })
            ->addColumn('action', function ($row) {
                $btn = "";
                $btn .= '<a target="_BLANK" href="' . route('admin.add_product_widget', $row['id']) . '" class="edit mr-2 btn btn-info btn-sm">Widgets</a>';
                $btn .= '<a target="" href="' . route('admin.edit_product', $row['id']) . '" class="edit mr-2 btn btn-primary btn-sm">Edit</a>';
                // $btn .= '<a href="javascript:void(0)" class="edit mr-2 btn btn-warning btn-sm">Edit</a>';
                // $btn .= '<a href="javascript:void(0)" class="edit mr-2 btn btn-primary btn-sm">View</a>';
                return $btn;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }
    public function edit_product($product_id)
    {
        $product_data = product::where('id', $product_id)->first();
        $category = Category::all();
        return view('admin/product/edit', compact('product_id', 'product_data', 'category'));
    }
    public function add_product()
    {
        $category = Category::all();
        return view('admin/product/add', compact('category'));
    }
    public function update_product(Request $request)
    {
        $category_id = $request->post('category_id') ?? '';
        $name = $request->post('name') ?? '';
        $body = $request->post('body') ?? '';


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $name . rand(1111111111, 9999999999) . "." . $file->getClientOriginalExtension();
            $file->move("uploads/product/", $image);
        }else{
            $image = $request->post('old_image');
        }

        $slug = Str::slug($request->post('name'), '_');
        $data = product::where('id', $request->post('id'))
            ->update(
                [
                    'category_id' => $category_id,
                    'name' => $name,
                    'image' => $image,
                    'slug' => $slug,
                    'body' => $body
                ]
            );
        if ($data) {
            return redirect()->route('admin.product')->with('success', 'Data Added Successfully.');
        }
    }
    public function save_product(Request $request)
    {
        $category_id = $request->post('category_id') ?? '';
        $name = $request->post('name') ?? '';
        $body = $request->post('body') ?? '';


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $name . rand(1111111111, 9999999999) . "." . $file->getClientOriginalExtension();
            $file->move("uploads/product/", $image);
        } else {
            $image = 'default.png';
        }

        $slug = Str::slug($request->post('name'), '_');
        $data = product::create(
            [
                'category_id' => $category_id,
                'name' => $name,
                'image' => $image,
                'slug' => $slug,
                'body' => $body
            ]
        );
        if ($data) {
            return redirect()->route('admin.product')->with('success', 'Data Added Successfully.');
        }
    }

}

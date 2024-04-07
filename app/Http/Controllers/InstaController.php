<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\InstaAccount;
use Illuminate\Support\Str;
use DataTables;

class InstaController extends Controller
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
    public function insta_account()
    {
        return view('admin/insta_account/index');
    }
    public function get_insta_account(Request $request)
    {
        $data = InstaAccount::select('*');
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('image', function ($row) {
                return "<img src='" . asset('uploads/insta_account') . '/' . $row['image'] . "' style='width:50px; height:50px;' />";
            })
            ->addColumn('action', function ($row) {
                $btn = "";
                $btn .= '<a href="' . route('admin.edit_insta_account', $row['id']) . '" class="edit mr-2 btn btn-info btn-sm">Edit</a>';
                $btn .= '<a href="' . route('admin.delete_insta_account', $row['id']) . '" class="edit mr-2 btn btn-danger btn-sm">Delete</a>';
                // $btn .= '<a href="javascript:void(0)" class="edit mr-2 btn btn-warning btn-sm">Edit</a>';
                return $btn;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }
    public function edit_insta_account($insta_account_id)
    {
        $insta_account_data = InstaAccount::where('id', $insta_account_id)->first();
        $insta_account = InstaAccount::where('id', '!=', $insta_account_id)->get();
        return view('admin/insta_account/edit', compact('insta_account_id', 'insta_account_data', 'insta_account'));
    }
    public function delete_insta_account($insta_account_id)
    {
        $insta_account_data = InstaAccount::where('id', $insta_account_id)->delete();
        return view('admin/insta_account/index');
    }
    public function update_insta_account(Request $request)
    {
        $name = $request->post('name');
        $username = $request->post('username');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $name . rand(1111111111, 9999999999) . "." . $file->getClientOriginalExtension();
            $file->move("uploads/insta_account/", $image);
        } else {
            $image = $request->post('old_image');
        }

        $data = InstaAccount::where('id', $request->post('id'))
            ->update(
                [
                    'name' => $name,
                    'username' => $username,
                    'image' => $image,
                ]
            );
        if ($data) {
            return redirect()->route('admin.insta_account')->with('success', 'Data Added Successfully.');
        }
    }
    public function add_insta_account()
    {
        $insta_account = InstaAccount::all();
        return view('admin/insta_account/add', compact('insta_account'));
    }
    public function save_insta_account(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg', // max 2MB
            'name' => 'required|string',
            'username' => 'required|string',
        ]);
        $name = $request->post('name');
        $username = $request->post('username');
        $file = $request->file('image');
        // $image = $name . "." . $file->getClientOriginalExtension();
        $image = $name . rand(1111111111, 9999999999) . "." . $file->getClientOriginalExtension();
        $file->move("uploads/insta_account/", $image);

        $data = InstaAccount::create(
            [
                'name' => $name,
                'image' => $image,
                'username' => $username,
            ]
        );
        if ($data) {
            return redirect()->route('admin.insta_account')->with('success', 'Data Added Successfully.');
        }
    }
}

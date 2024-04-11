<?php

namespace App\Http\Controllers;

use App\Models\Insta10kFollow;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\InstaAccount;
use Illuminate\Support\Str;
use DataTables;

class Insta10kFollowController extends Controller
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
    public function api_index()
    {
        $accounts = Insta10kFollow::paginate(9);
        return $accounts;
    }
    public function insta_10k_follow()
    {
        return view('admin/insta_10k_follow/index');
    }
    public function get_insta_10k_follow(Request $request)
    {
        $data = Insta10kFollow::select('*');
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('image', function ($row) {
                return "<img src='" . asset('uploads/insta_10k_follow') . '/' . $row['image'] . "' style='width:50px; height:50px;' />";
            })
            ->addColumn('action', function ($row) {
                $btn = "";
                $btn .= '<a href="' . route('admin.edit_insta_10k_follow', $row['id']) . '" class="edit mr-2 btn btn-info btn-sm">Edit</a>';
                $btn .= '<a href="' . route('admin.delete_insta_10k_follow', $row['id']) . '" class="edit mr-2 btn btn-danger btn-sm">Delete</a>';
                // $btn .= '<a href="javascript:void(0)" class="edit mr-2 btn btn-warning btn-sm">Edit</a>';
                return $btn;
            })
            ->rawColumns(['action', 'image'])
            ->make(true);
    }
    public function edit_insta_10k_follow($insta_10k_follow_id)
    {
        $insta_10k_follow_data = Insta10kFollow::where('id', $insta_10k_follow_id)->first();
        $insta_10k_follow = Insta10kFollow::where('id', '!=', $insta_10k_follow_id)->get();
        return view('admin/insta_10k_follow/edit', compact('insta_10k_follow_id', 'insta_10k_follow_data', 'insta_10k_follow'));
    }
    public function delete_insta_10k_follow($insta_10k_follow_id)
    {
        $insta_10k_follow_data = Insta10kFollow::where('id', $insta_10k_follow_id)->delete();
        return view('admin/insta_10k_follow/index');
    }
    public function update_insta_10k_follow(Request $request)
    {
        $name = $request->post('name');
        $username = $request->post('username');
        $added = $request->post('added');
        $total = $request->post('total');


        $data = Insta10kFollow::where('id', $request->post('id'))
            ->update(
                [
                    'name' => $name,
                    'username' => $username,
                    'added' => $added,
                    'total' => $total
                ]
            );
        if ($data) {
            return redirect()->route('admin.insta_10k_follow')->with('success', 'Data Added Successfully.');
        }
    }
    public function add_insta_10k_follow()
    {
        $insta_10k_follow = Insta10kFollow::all();
        return view('admin/insta_10k_follow/add', compact('insta_10k_follow'));
    }
    public function save_insta_10k_follow(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
        ]);
        $name = $request->post('name');
        $username = $request->post('username');
        $added = $request->post('added');
        $total = $request->post('total');
        $data = Insta10kFollow::create(
            [
                'name' => $name,
                'total' => $total,
                'added' => $added,
                'username' => $username,
            ]
        );
        if ($data) {
            return redirect()->route('admin.insta_10k_follow')->with('success', 'Data Added Successfully.');
        }
    }
}

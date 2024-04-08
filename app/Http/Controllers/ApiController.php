<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\InstaAccount;
use Illuminate\Support\Str;
use DataTables;

class ApiController extends Controller
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
    public function insta_account()
    {
        $accounts = InstaAccount::paginate(9);
        $accounts->getCollection()->transform(function ($account) {
            $account->image = asset('uploads/insta_account') . '/' . $account->image;
            return $account;
        });
        return $accounts;
    }
    public function insta_account_random()
    {
        $accounts = InstaAccount::inRandomOrder()->limit(4)->get();
        $accounts->transform(function ($account) {
            $account->image = asset('uploads/insta_account') . '/' . $account->image;
            return $account;
        });
        return $accounts;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        $data_user = DB::table('users')->where('status','customer')->get();
        return view('admin.home',['data_user'=>$data_user]);
    }
}

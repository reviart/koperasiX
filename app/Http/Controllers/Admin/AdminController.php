<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $admins = Admin::all();
      $operators = User::all();
      return view('admin.profile', compact('admins', 'operators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminregister');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
        ]);

        // store in the database
        $admins = new Admin;
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password=bcrypt($request->password);
        $admins->save();

        //ada revisii disini
        return redirect()->route('admin.login')->with('success', 'admin has been created!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return view('welcome');
    }

    public function destroy($id)
    {
      $datas = User::findOrFail($id);
      $datas->delete();
      return redirect()->back()->with('warning', '1 record deleted!');
    }
}

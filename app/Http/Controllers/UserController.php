<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return Redirect
     */
    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}

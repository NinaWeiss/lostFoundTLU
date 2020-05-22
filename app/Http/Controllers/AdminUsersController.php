<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $currentPage = 'users';
        $currentUser = auth()->user();   
        $users = User::all();

        return view('admin.users', compact('users'))->with('currentUser', $currentUser)
            ->with('currentPage', $currentPage);
    }

}

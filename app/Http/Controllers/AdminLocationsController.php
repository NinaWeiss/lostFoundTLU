<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminLocationsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $currentPage = 'locations';
        $locations = DB::table('locations')->get();

        return view('admin.locations', compact('locations'))
            ->with('currentPage', $currentPage);
    }
}

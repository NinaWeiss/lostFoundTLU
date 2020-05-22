<?php

namespace App\Http\Controllers;

use DB;
use App\Found;

class FoundController extends Controller
{
    public function index() {
        $currentPage = 'found';
        $search = null;        
        # Grab category param if exists and form query
        if(request('search') != null) {

            $search = $this->test_input(request('search'));
            $found = Found::where('description', 'LIKE', '%'. $search. '%')
                ->orWhere('name', 'LIKE', '%'. $search. '%')
                ->orWhere('id', '=', $search)
                ->orderBy('id', 'DESC')
                ->paginate(12);

        } elseif(request('category') != null) {

            $found = Found::where('categories_id', '=', request('category'))
                ->orderBy('id', 'DESC')
                ->paginate(12);

        } else {

            $found = Found::orderBy('id', 'DESC')->paginate(12);

        }

        # Get all categories
        $categories = DB::table('categories')->get();

        return view('found.index', compact('found'))
            ->with('categories', $categories)
            ->with('search', $search)
            ->with('currentPage', $currentPage);
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

}

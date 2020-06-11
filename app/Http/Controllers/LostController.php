<?php

namespace App\Http\Controllers;

use App\Lost;
use DB;

class LostController extends Controller
{
    public function index() {
        $currentPage = 'lost';
        $search = null;
        # Grab category param if exists and form query
        if(request('search') != null) {

            $search = $this->test_input(request('search'));
            $lost = Lost::where('description', 'LIKE', '%'. $search. '%')
                ->orWhere('name', 'LIKE', '%'. $search. '%')
                ->orWhere('id', '=', $search)
                ->orderBy('id', 'DESC')
                ->paginate(12);

        } elseif(request('category') != null) {

            $lost = Lost::where('categories_id', '=', request('category'))
                ->orderBy('id', 'DESC')
                ->paginate(12);

        } else {

            $lost = Lost::orderBy('id', 'DESC')->paginate(12);

        }

        # Get all categories
        $categories = DB::select("SELECT *, (SELECT count(*) FROM losts WHERE categories_id = categories.id) AS countLost FROM categories");

        return view('lost.index', compact('lost'))
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

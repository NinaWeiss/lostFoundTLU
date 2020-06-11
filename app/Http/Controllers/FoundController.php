<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;

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
        $categories = DB::select("SELECT *, (SELECT count(*) FROM founds WHERE categories_id = categories.id) AS countFound FROM categories");

        # Get all locations
        $locKeys = [];
        $locValues = [];

        $locations = DB::select("SELECT * FROM locations");
        foreach ($locations as $key => $value) {
            array_push($locKeys, $value->id);
            array_push($locValues, $value->name);
        }
        $locations = array_combine($locKeys, $locValues);

        return view('found.index', compact('found'))
            ->with('categories', $categories)
            ->with('search', $search)
            ->with('currentPage', $currentPage)
            ->with('locations', $locations);
    }

    public function update($id, Request $request) {
        return redirect()->back();
    }

    public function destroy() {
        $id = request('id');
        $post = Found::find($id);
        $post->delete();

        return redirect()->back();
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Found;

class AjaxController extends Controller
{
    public function index(Request $request) {
        $id = request('postId');
        $item = Found::where('id', '=', $id)->get();
        /* var_dump($item); */

        return view('ajax.index', compact('item'));
       /*  return view('ajax.index'); */
    }
}

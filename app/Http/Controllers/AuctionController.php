<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index() {

        $currentPage = 'auction';

        return view('auction.index')
            ->with('currentPage', $currentPage);
    }
}

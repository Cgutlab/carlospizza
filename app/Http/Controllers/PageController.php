<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Pizza;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        $data = Pizza::with('ingredients')->get();
        return view("page.index", compact("data"));
    }
}

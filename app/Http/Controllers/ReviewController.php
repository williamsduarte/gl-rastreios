<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ReviewController extends Controller
{

    public function all()
    {
        return Category::orderBy('name', 'asc')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('review');
    }

}

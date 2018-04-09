<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubcategoryTracking;
use App\CategoryTracking;

class SubcategoryTrackingController extends Controller
{

  public function all()
  {
      return SubcategoryTracking::with('catguia')
        ->where('done', '=', 1)
        ->orderBy('name', 'asc')
        ->get();
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return SubcategoryTracking::with('category')
            ->where('done', '=', 0)
            ->where('cat_guia', 0)
            ->inRandomOrder()
            ->take(1)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {

        SubcategoryTracking::where('done', '=', 0)
            ->where('id', $request->subcategory_id)
            ->update(['done' => 1, 'cat_guia' => $request->category_gl]);

        CategoryTracking::where('done', '=', 0)
            ->where('id', $request->category_id)
            ->update(['done' => 1, 'cat_guia' => $request->category_gl]);


        return redirect()->route('categories')->with('status', 'As catagorias foram atreladas com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function total()
    {
        return SubcategoryTracking::where('cat_guia', '>', 0)->count();
    }

    public function refactory(Request $request)
    {
        return SubcategoryTracking::where('id', $request->id)
            ->update(['done' => $request->done]);
    }
}

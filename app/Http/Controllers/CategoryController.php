<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //SELECT * FROM categories
    public function index()
    {
        //category is equal to get all from category model
        $categories=Category::all();

        //or we can get only categories that havee only sets and get them;

        // $categories=Category::where('name','=','Pants')->get();
        return $categories;
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
        //

        // $categories=new Category();
        // $categories->name=$request->input('name');
        

        //or
        $categories=Category::create([
            'name'=>$request->input('name')
        ]);
        // $categories->save();
        return $categories;
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
        $categories=Category::find($id);
        return $categories;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::find($id)->first();
        return $categories;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $categories=Category::where('id',$id)
        // ->update([
        //     'name'=>$request->input('name')
        // ]);

        // return $categories;

        $categories=Category::find($id);
        $categories->update($request->all());
        return Category::all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories=Category::find($id);
        $categories->delete();
        return $categories;
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Products;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks=Stock::all();
        return $stocks;
    }



    //decrement quantity by specific stock based on product_id and size 
    public function SelectedStock(Request $request){
        $stocks=Stock::all()->where(
            'product_id', '=', $request->product_id
        );

       $sStock=$stocks->where('size', '=', $request->size )->first();
       $product= Stock::where('id', $sStock->id)
           ->update([
                  'quantity'=> DB::raw('quantity-1'), 
                ]);
         return $product;
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
        $stocks=Stock::create([
            'product_id'=>$request->input('product_id'),
            'size'=>$request->input('size'),
            'quantity'=>$request->input('quantity')
        ]);
        return $stocks;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $stocks = Stock::where('product_id', '=', $id)->get(); 
        return $stocks;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}

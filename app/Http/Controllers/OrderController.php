<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::all();
        return $orders;
    }

    //return orders by customer id :
    public function getbyCustomerId($customer_id)
    {
        $orders = Order::where('customer_id', '=', $customer_id)->get();
        return $orders;
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
          $date=Carbon::parse( $request->input('date'))->format('Y-m-d H:i:s');
          $orders=Order::create([       
            'date'=>$date,
            'customer_name'=>$request->input('customer_name'),
            'customer_id'=>$request->input('customer_id'),
            'street'=>$request->input('street'),
            'city'=>$request->input('city'),
            'building'=>$request->input('building'),
            'floor'=>$request->input('floor'),
            'total_price'=>$request->input('total_price')
        ]);
        return $orders;
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

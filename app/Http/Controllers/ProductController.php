<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        //
        $products=Products::join('categories','categories.id','=','products.category_id')->get(['products.id','products.title','products.color','products.description','products.collection','products.price','products.image','products.S','products.M','products.L','products.XL','products.XXL','categories.name']);
        return $products;
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
        $newP=0;
        $categ_name=new Category();   
        $categ_name->name = $request->input('category');
        $all_categories=Category::all();

        foreach ($all_categories as $key => $categ) {
                if ($categ->name ==  $categ_name->name) {
                    $newP = $categ->id;            
                }      
               };
            $products = new Products();
            $products->title = $request->input('title');
            $products->category_id=$newP;
            $products->description = $request->input('description');
            $products->color = $request->input('color');
            $products->collection =  $request->input('collection');
            $products->price =  $request->input('price');
            $products->image =  $request->input('image');
            $products->S =  $request->input('S');
            $products->M =  $request->input('M');
            $products->L =  $request->input('L');
            $products->XL =  $request->input('XL');
            $products->XXL =  $request->input('XXL');
            $products->save();
            return response()->json($request);   
    }

    public function getCount()
    {
       
        $productss=Products::all();
        $products =$productss->last();
        return $products->id;

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newP='';
        $newproduct=DB::table('products')
        ->join('categories','categories.id','=','products.category_id')
        ->select(['products.id','products.title','products.color','products.description','products.collection','products.price','products.image','products.S','products.M','products.L','products.XL','products.XXL','categories.name'])
        ->where('products.id', $id)
        ->get();
        return $newproduct;
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


    public function update2(Request $request, $categoryName)
    {
        $category = Category::where('name', '=', $categoryName)->first();   
        $product = Products::find($request['id']);
        $request['category_id'] = $category['id'];
        $product->update($request->all());
        $product->save();
           
            return response()->json([
                'message'=>'Succesfully updated product',
                'product'=>$product
            ],201);
    }


    public function update(Request $request, $id)
    {
        $category = Category::where('name', '=', $request['name'])->first();
        
        $product = Products::find($id);
        $request['category_id'] = $category['id'];

        // $request['title']=$product['title'];
        // $request['description']=$product['description'];
        // $request['color']=$product['color'];
        // $request['collection']=$product['collection'];
        // $request['price']=$product['price'];
        // $request['image']=$product['image'];
        // $request['S']=$product['S'];
        // $request['M']=$product['M'];
        // $request['L']=$product['L'];
        // $request['XL']=$product['XL'];
        // $request['XXL']=$product['XXL'];
     
        // return $request;


        $product->update($request->all());
        // $product->category_id=request('category_id');
        // $product->title=request('title');

        $product->save();
        /*$products = Products::find(9);
        $newP=0;
        $categ_name=new Category();   
        $categ_name->name = $request->input('category');
        $all_categories=Category::all();

        foreach ($all_categories as $key => $categ) {
                if ($categ->name ==  $categ_name->name) {
                    $newP = $categ->id;            
                }};
       
            // $products->category_id=$newP;       
            // // $products->title = $request->input('title');
            // // $products->category_id=$newP;
            // // $products->description = $request->input('description');
            // // $products->color = $request->input('color');
            // // $products->collection =  $request->input('collection');
            // // $products->price =  $request->input('price');
            // // $products->image =  $request->input('image');
            // // $products->S =  $request->input('S');
            // // $products->M =  $request->input('M');
            // // $products->L =  $request->input('L');
            // // $products->XL =  $request->input('XL');
            // // $products->XXL =  $request->input('XXL');
            // // // $products->update($request->all());
            // // $products->save();*/
            return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products=Products::find($id);
        $products->delete();
        return $products;
    }
}

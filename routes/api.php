<?php
use App\Http\Controllers\categController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\StockController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Authentication
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('logout', [
        AuthController::class, 'logout'
    ]);
});


//get users api
Route::resource('users',AuthController::class);

// feedbacks api
Route::resource('feedbacks',FeedbackController::class);

//for search 
Route::get('/categ/search/{name}',[categController::class,'search']);

//to get all categories:
Route::resource('/categories',CategoryController::class);
//or
Route::resource('categor',categController::class);

//get All products 
Route::resource('/products',ProductController::class);

//count number of products 
Route::get('/countProducts',[ProductController::class,'getCount']);

//update orders with a new category
Route::put('/productsEdit/{categoryName}',[ProductController::class,'update2']);

//get orders
Route::resource('/orders',OrderController::class);

//get orders by customerId
Route::get('ordersbyCustomer/{id}', [OrderController::class, 'getbyCustomerId']);

//get ordersitems
Route::resource('/orderitems',OrderItemController::class);

//get stocks
Route::resource('/stocks',StockController::class);


//return selected stock : SelectedStock
//Route::put('selectedStock/{product_id}/{size}', [StockController::class, 'SelectedStock']);
Route::put('selectedStock/', [StockController::class, 'SelectedStock']);

//middleware
Route::middleware('auth:api')->get('/user', function (Request $request) {
    //   Route::get('logout', [AuthController::class, 'logout']);
    return $request->user();
});




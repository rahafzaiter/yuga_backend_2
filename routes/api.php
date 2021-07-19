<?php
use App\Http\Controllers\categController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
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

// Route::group([
//     'prefix' => 'auth'
// ], function () {
//     // Route::post('login', 'AuthController@login');
//     // Route::post('register', 'AuthController@register');
  
//     Route::group([
//       'middleware' => 'auth:api'
//     ], function() {
//         Route::get('logout', [AuthController::class, 'logout']);
//         // Route::get('user', 'AuthController@user');
//     });
// });
// Route::post('logout', [AuthController::class, 'logout']);

// Route::middleware('auth:api')->group(function (){
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });
//     Route::get('logout', [
//         AuthController::class, 'logout'
//     ]);
// });

//Route::post('logout','AuthController@logout');



Route::group([
    'middleware' => 'auth:api'
  ], function() {
      Route::post('logout', [AuthController::class, 'logout']);
      // Route::get('user', 'AuthController@user');
  });


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//get users api
Route::resource('users',AuthController::class);

// feedbacks api
Route::resource('feedbacks',FeedbackController::class);



Route::resource('categor',categController::class);


//call the method index in class categController by api named products

//get  Users API:

//for search 
Route::get('/categ/search/{name}',[categController::class,'search']);

//to get all categories:
Route::resource('/categories',CategoryController::class);
Route::resource('/products',ProductController::class);
// Route::put('/productsEdit/{categoryName}',[ProductController::class,'update']);
Route::put('/productsEdit/{categoryName}',[ProductController::class,'update2']);

// Route::put('/productsEdit',[ProductController::class,'update2']);


// Route::post('/categ',[categController::class,'store']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    //   Route::get('logout', [AuthController::class, 'logout']);
    return $request->user();
});




<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
// use App\User;
use App\Models\User;

class AuthController extends Controller
{

    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] firstname
     * @param  [string] lastname
     * @param  [integer] phoneNb
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    // public function signup(Request $request)
    // {
    //     $request->validate([
    //         'firstname' => 'required|string',
    //         'lastname' => 'required|string',
    //         'email' => 'required|string|email|unique:users',
    //         'phoneNb' => 'required|integer|phone',
    //         'password' => 'required|string|confirmed'
    //     ]);
    //     $user = new User([
    //         'firstname' => $request->firstname,
    //         'lastname' => $request->lastname,
    //         'phoneNb' => $request->phoneNb,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password)
    //     ]);
    //     $user->save();
    //     return response()->json([
    //         'message' => 'Successfully created user!'
    //     ], 201);
    // }

    public function register(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'phoneNb' => 'required|integer',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('API Token')->accessToken;

        return response([ 'user' => $user, 'token' => $token]);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    // public  function login(Request $request)
    // {
    //     $email = $request->get('email');
    //     $password   = $request->get('password');



    //     if(Auth::attempt(['email' => $email, 'password' => $password])) {

    //         $user = Auth::user();
    //         $token = $user->createToken('MyApp')->accessToken;

    //         return response()->json([
    //             'token' => $token
    //         ]);

    //     }
    //     else {
    //         return response()->json([
    //            'msg' => 'Unauthorized access'
    //         ]);
    //     }
    // }


    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details. 
            Please try again']);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response(['user' => auth()->user(), 'token' => $token]);

    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    // public function logout(Request $request)
    // {
    //     $request->user()->token()->revoke();
    //     return response()->json([
    //         'message' => 'Successfully logged out'
    //     ]);
    //  }

    // public function logout(Request $request)
    // {  
	// $result = $request->user()->token()->revoke();                  
    //         if($result){
    //                 $response = response()->json(['error'=>false,'message'=>'User logout successfully.','result'=>[]],200);
    //           }else{
    //                 $response = response()->json(['error'=>true,'message'=>'Something is wrong.','result'=>[]],400);            
    //           }   
    //         return $response;       
    // }
//     public function logout()
//     { 
//     if (Auth::check()) {
//        Auth::user()->AauthAcessToken()->delete();
//     }
// }

public function logout(Request $request) {
    if ($request->user()) { 
        $request->user()->tokens()->delete();
        //return response()->json(['message' => 'user is logged out'], 200);
    }else{
         return response()->json(['message' => 'user is not logged out'], 200);
    }

    return response()->json(['message' => 'user is logged out'], 200);
}
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    // public function user(Request $request)
    // {
    //     return response()->json($request->user());
    // }



    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {
        $users=User::all();
        return $users;
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller
{

  private $user;

  public function __construct(User $user){
      $this->user = $user;
  }

  //register
  public function register(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'email' => 'required|string|email|max:255|unique:users',
          'name' => 'required',
          'password'=> 'required'
      ]);
      if ($validator->fails()) {
          return response()->json($validator->errors());
      }
      User::create([
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'password' => bcrypt($request->get('password')),
      ]);
      $user = User::first();
      $token = JWTAuth::fromUser($user);
      
      return Response::json(compact('token'));
  }

  //authenticate login api
  public function authenticate(Request $request)
  {
      // grab credentials from the request
      $credentials = $request->only('email', 'password');

      try {
          // attempt to verify the credentials and create a token for the user
          if (! $token = JWTAuth::attempt($credentials)) {
              return response()->json(['error' => 'invalid_credentials'], 401);
          }
      } catch (JWTException $e) {
          // something went wrong whilst attempting to encode the token
          return response()->json(['error' => 'could_not_create_token'], 500);
      }

      // all good so return the token
      return response()->json(compact('token'));
  }







  //login api 2
  public function login(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'email' => 'required|string|email|max:255',
          'password'=> 'required'
      ]);

      if ($validator->fails()) {
          return response()->json([
            'success' => false,
            'errors' => $validator->errors()
            ]);
      }

      $credentials = $request->only('email', 'password');

      try {
          if (! $token = JWTAuth::attempt($credentials)) {
              return response()->json([
                'success' => false,
                'message' => 'Invalid Login Details'
                ], 401);
          }
      } catch (JWTException $e) {
          return response()->json([
            'success' => false,
            'message' => 'could_not_create_token'
            ], 500);
      }
      $userdetails = JWTAuth::toUser($token);
      $token = compact('token');

      return response()->json([
        'success' => true,
        'token' => $token['token'],
        'userdetails' => $this->getUserDetails($userdetails)
        ]);
  }


  // get Auth User
  public function getAuthUser(Request $request){
      $user = JWTAuth::toUser($request->token);
      return response()->json(['result' => $user]);
  }




  public function getUserDetails ($userInfo) {
    return $userInfo;
  }

  public function index () {
    // and you can continue to chain methods
    $userd = JWTAuth::parseToken()->authenticate();
    $token = JWTAuth::getToken();
    return $userd;
  }
}

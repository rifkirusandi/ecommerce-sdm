<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
  public function login(){
      if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
          $user = Auth::user();
          $success['token'] =  $user->createToken('MyApp')-> accessToken;
          return response()->json(['success' => $success], 200);
      }
      else{
          return response()->json(['error'=>'Unauthorized'], 401);
      }
  }

  public function register(Request $request){
      $validator = Validator::make($request->all(), [
          'username' => 'required',
          'email' => 'required|email',
          'password' => 'required',
          'c_password' => 'required|same:password',
          'role' => 'required',
      ]);
      if ($validator->fails()) {
          return response()->json(['error'=>$validator->errors()], 401);
      }
      $input = $request->all();
      $input['password'] = bcrypt($input['password']);
      $user = User::create($input);
      $success['token'] =  $user->createToken('MyApp')-> accessToken;
      return response()->json(['success'=>$user, $success], 200);
  }

  public function details(){
      $user = Auth::user();
      return response()->json(['success' => $user], 200);
  }

  public function getAllUser(){
    return User::all();
  }

  public function getUser($id){
    $id_user = User::find($id);

    if ($id_user == null) {
      return response([
        'status' => false,
        'message' => 'Data tidak ditemukan.'
      ], 404);
    }else{
      return response([
        'data' => $id_user
      ], 200);
    }
  }
}

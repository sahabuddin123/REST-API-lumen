<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
   

    public function create(Request $request){
        /**
         * validation try catch
         */
        try {
            $this->validate($request, [
                'full_name' => 'required',
                'username' => 'required|min:6',
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
          }
          //catch exception
          catch(ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
          }

          /**
           * data insert try catch
           */
       try {
           $id = app('db')->table('users')->insertGetId([
            'full_name' => trim($request->input('full_name')),
            'username' => strtolower(trim($request->input('username'))),
            'email' => strtolower(trim($request->input('full_name'))),
            'password' => app('hash')->make($request->input('password')),
           ]);

            $user = app('db')->table('users')->select('full_name','username','email','password')->where('id', $id)->first();
           
            return response()->json([
            'id' => $id,
            'full_name' => $user->full_name,
            'username' => $user->username,
            'email' => $user->email,
           ], 200);
       }
        //catch exception
        catch(\PDOException $exception) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
          }
    }
}

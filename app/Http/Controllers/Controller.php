<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // use Illuminate\Support\Facades\Session;
    //  Session::flash('message', $th->getMessage());
    // Session::flash('type', 'error');
    // Session::flash('message', 'User successfully updated');

         // For API
         protected function respondWithSuccess($message = '', $data = [], $code = 200)
         {
             return response()->json([
                 'status'   => true,
                 'errors'  => false,
                 'message'  => $message,
                 'data'     => $data
             ], $code);
         }
         protected function respondWithError($message, $data = [], $code = 203)
         {
             return response()->json([
                 'status'   => false,
                 'errors'  => true,
                 'message'  => $message,
                 'data'     => $data
             ], $code);
         }


        //  app('flasher')->addSuccess('Your account has been re-activated.');
}

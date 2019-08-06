<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Gate;

class Controller extends BaseController{

    /**
     * Return a JSON response for success.
     *
     * @param  array  $data
     * @param  string $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($data, $code){
        return response()->json(['data' => $data], $code);
    }

    /**
     * Return a JSON response for error.
     *
     * @param  array  $message
     * @param  string $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($message, $code){
        return response()->json(['message' => $message], $code);
    }
}

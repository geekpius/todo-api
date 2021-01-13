<?php

namespace App\Http\Traits;

use Illuminate\Http\Response;

trait ApiResponseTrait
{
    public function apiCreatedDataResponse($data){
        return response()->json([
            'data' => $data
        ], Response::HTTP_CREATED);
    }

    public function apiDeleteResponse(){
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function apiMessageResponse($message){
        return response()->json([
            'message' => $message
        ], Response::HTTP_OK);
    }

    public function apiErrorResponse($message){
        return response()->json([
            'error' => $message
        ], Response::HTTP_OK);
    }

}
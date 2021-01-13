<?php 

namespace App\Exceptions;

use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request, $exception){
        if($exception instanceof ModelNotFoundException){
            return response()->json([
                "error" => "Model not found"
            ], Response::HTTP_NOT_FOUND);
        }

        if($exception instanceof NotFoundHttpException){
            return response()->json([
                "error" => "Route not found"
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
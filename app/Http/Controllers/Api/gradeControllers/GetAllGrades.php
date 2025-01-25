<?php

namespace App\Http\Controllers\Api\occupationControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Grade;


class GetAllGrades{
    public function getAll(){

        $occupation = Grade::with(['characters'])->get();

        if ($occupation->isEmpty()) {
            $error = config('errors.characters.empty');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        return response()->json($occupation, 200);
    }
}
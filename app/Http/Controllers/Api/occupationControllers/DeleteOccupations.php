<?php

namespace App\Http\Controllers\Api\occupationControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Occupation;


class DeleteOccupations{

    public function delete($id){

        $occupation = Occupation::find($id);

        if(!$occupation) {
            $error = config('errors.characters.not_found');
            return response()->json(['message' => $error['message'],'status' => $error['code'],], $error['code']);
        }

        $occupation->delete();

        $success = config('errors.characters.destroy_success');
        return response()->json($success['message'], $success['code']);
        
    }

}
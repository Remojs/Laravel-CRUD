<?php

namespace App\Http\Controllers\occupationControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Occupation;


class UpdatePartialOccupations{
    public function updatePartial(Request $request, $id){
        $occupation = Occupation::find($id);

        if (!$occupation) { // Si no encuentra el character, devuelve el mensaje de error
            $error = config('errors.occupations.not_found');
            return response()->json([
                'message' => $error['message'],
                'status' => $error['code'],
            ], $error['code']);
        }

        $validator = Validator::make($request->all(), [ // Validar los datos que llegan
            'occupationName' => '',
            'status' => '',
            'leader' => '',
        ]);

        if ($validator->fails()) { // Si falla la validación, devuelve el mensaje de error
            $error = config('errors.occupations.validation_fails');
            return response()->json([
                'message' => $error['message'],
                'errors' => $validator->errors(),
                'status' => $error['code'],
            ], $error['code']);
        }

        if($request->has('occupationName')){ $occupation->occupationName = $request->occupationName; }
        if($request->has('status')){ $occupation->status = $request->status; }
        if($request->has('leader')){ $occupation->leader = $request->leader; }

        $occupation->save();

        $success = config('errors.occupations.update_success');
        return response()->json([
            'message' => $success['message'],
            'occupation' => $occupation,
            'status' => $success['code'],
        ], $success['code']);

        

    }
}
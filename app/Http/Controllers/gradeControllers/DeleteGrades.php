<?php

namespace App\Http\Controllers\gradeControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Grade;


class DeleteGrades{

    public function delete($id){

        $grade = Grade::find($id);

        if(!$grade) {
            $error = config('errors.grades.not_found');
            return response()->json(['message' => $error['message'],'status' => $error['code'],], $error['code']);
        }

        $grade->delete();

        $success = config('errors.grades.destroy_success');
        return response()->json($success['message'], $success['code']);
        
    }

}
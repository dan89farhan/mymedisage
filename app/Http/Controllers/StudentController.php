<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Catch_;

class StudentController extends Controller
{
    //

    public function getStudent(Request $request)
    {
        // dd($req->all());
        // return "i m here";
        try {
            $studentValidator = Validator::make(
                $request->all(),
                array(
                    'name' => 'nullable',
                    'phone_number' => 'nullable',
                    'email' => 'nullable',
                    'country' => "nullable",
                    'country_code' => "nullable",
                )
            );

            $skip = $request->skip ?? 0;
            $take = $request->take ?? 5;
            if ($studentValidator->fails()) {

                $error_messages = implode(',', $studentValidator->messages()->all());
                throw new Exception($error_messages, 101);
            }
            $studentFilterData = $request->all();
            $filterStudentData = Student::orderBy('id');
            if (array_key_exists('name', $studentFilterData)) {
                $filterStudentData = $filterStudentData->where('name','LIKE','%'.$studentFilterData['name'].'%');
            }
            if (array_key_exists('phone_number', $studentFilterData)) {
                $filterStudentData = $filterStudentData->where('phone_number','LIKE','%'.$studentFilterData['phone_number'].'%');
            }
            if (array_key_exists('email', $studentFilterData)) {
                $filterStudentData = $filterStudentData->where('email','LIKE','%'.$studentFilterData['email'].'%');
            }
            if (array_key_exists('country', $studentFilterData)) {
                $filterStudentData = $filterStudentData->where('country','LIKE','%'.$studentFilterData['country'].'%');
            }
            if (array_key_exists('country_code', $studentFilterData)) {
                $filterStudentData = $filterStudentData->where('country_code','LIKE','%'.$studentFilterData['country_code'].'%');
            }

            $result = $filterStudentData->skip($skip)->take($take)->get();
            // dd($studentFilterData);

            return response()->json(['result' => $result, 'success' => true]);
        } catch (Exception $e) {

            $response_array = ['success' => false, 'error_messages' => $e->getMessage(), 'error_code' => $e->getCode()];

            return response()->json($response_array);
        }
    }
}

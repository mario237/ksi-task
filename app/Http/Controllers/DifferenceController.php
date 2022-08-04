<?php

namespace App\Http\Controllers;

use App\Traits\HandleApiResponse;
use Illuminate\Http\Request;

class DifferenceController extends Controller
{
    use HandleApiResponse;

    public function getDifferenceOfTwoLists(Request $request)
    {

        $firstList = $request['first_list']?:[];
        $secondList = $request['second_list']?:[];

        return $this->successResponse($this->arrayDiff($firstList , $secondList) , 'This is a difference between two lists');

    }


    private function arrayDiff(array $original, array $difference): array
    {

        $result = [];

        if (empty($original) || empty($difference)){
            $result = $original;
        }
        else{
            foreach ($original as $originalElement){
                if (!in_array($originalElement , $difference)){
                    $result[] = $originalElement;
                }
            }
        }

        return $result;
    }

}

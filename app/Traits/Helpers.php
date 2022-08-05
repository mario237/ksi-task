<?php

namespace App\Traits;

trait Helpers
{

    public function getCityNameFromWords($words):string{
        $matchCity = "";
        $pattern = "/^([a-zA-Z]+\s)*[a-zA-Z]+$/";

        foreach ($words as $word){
            if (preg_match($pattern , $word)){
                $matchCity = $word;
            }
        }

        return $matchCity;
    }
}

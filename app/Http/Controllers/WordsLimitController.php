<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordsLimitController extends Controller
{
    //checking characters limit 
    public static function words_limit($words) {
        if (strlen($words) > 22) {
            $sub_words = substr("$words",0,10);
            $sub_words = $sub_words."..........";
            return $sub_words;
        }
        else {
            return $words;
        }
    } 
}

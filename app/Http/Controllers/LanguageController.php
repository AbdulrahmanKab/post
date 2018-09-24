<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function changeLang($lang)
    {
        if(in_array($lang, ['ar', 'en'])) {
            Session()->forget('lang');
            Session()->put('lang', $lang);
        } else {
            Session()->put('lang', 'en');
        }

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Lang;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    private $langActive = [
        'vi',
        'en',
    ];
    public function changeLang(Request $request, $lang)
    {
        if (in_array($lang, $this->langActive)) {
            $request->session()->put(['lang' => $lang]);
            return redirect()->back();
        }
    }
}

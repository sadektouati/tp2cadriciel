<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LangueController extends Controller
{

    public function index(string $locale){

        if (! in_array($locale, ['en', 'fr'])) {
            abort(400);
        }

        App::setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();

    }

}
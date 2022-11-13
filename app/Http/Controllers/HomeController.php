<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        $settings = Setting::all();

        return view('import', compact('settings'));
    }
}

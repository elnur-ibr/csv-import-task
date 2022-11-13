<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportRequest;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function __invoke(ImportRequest $request)
    {
        dd($request->safe());
    }
}

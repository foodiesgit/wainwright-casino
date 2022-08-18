<?php

namespace Wainwright\CasinoDog\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class MarkdownParser extends Controller
{
    /**
     * Show the terms of service for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function random_snippets(Request $request)
    {
        return view('wainwright::markdown', [
            'random_snippets' => Str::markdown(file_get_contents(__DIR__.'/../../md/random_snippets.md')),
        ]);
    }
}
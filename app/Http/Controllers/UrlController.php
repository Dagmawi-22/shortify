<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function shorten(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $shortenedUrl = substr(md5(time()), 0, 6);

        Url::create([
            'original_url' => $request->original_url,
            'shortened_url' => $shortenedUrl
        ]);

        return redirect()->back()->with('shortened_url', url($shortenedUrl));
    }

    public function redirect($shortenedUrl)
    {
        $url = Url::where('shortened_url', $shortenedUrl)->firstOrFail();
        return redirect($url->original_url);
    }
}

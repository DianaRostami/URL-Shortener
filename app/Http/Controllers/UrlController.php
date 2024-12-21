<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;


class UrlController extends Controller
{
    public function index()
    {
        return view('url.index');
    }

    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $shortUrl = Url::generateShortUrl($request->url);
        return redirect()->back()->with('shortUrl', $shortUrl);
    }
    public function redirect($shortUrl)
    {
        // Find the original URL based on the short URL
        $url = Url::where('short_url', $shortUrl)->first();

        // If the URL exists, redirect to the original URL
        if ($url) {
            return redirect()->to($url->original_url);
        }

        // If no URL is found, show a 404 error
        return abort(404, 'URL not found');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    // Add these fields to the $fillable property
    protected $fillable = ['original_url', 'short_url'];

    // Optional: add custom logic to generate short URLs
    public static function generateShortUrl($url)
    {
        // Generate a random string of 6 characters
        $shortUrl = substr(md5(time()), 0, 6);

        // Ensure the short URL is unique
        while (self::where('short_url', $shortUrl)->exists()) {
            $shortUrl = substr(md5(time()), 0, 6);
        }

        // Store the URL in the database
        self::create([
            'original_url' => $url,
            'short_url' => $shortUrl,
        ]);

        return $shortUrl;
    }
}

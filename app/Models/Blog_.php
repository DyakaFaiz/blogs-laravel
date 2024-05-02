<?php

namespace App\Models;

class Blog
{
    static $variable = "sas";
    public static function all()
    {
        return collect(self::$variable);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}

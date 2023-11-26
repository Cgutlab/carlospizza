<?php

namespace App\Helpers;
use Carbon\Carbon;

class Helper
{
    // Constants for percentage value, percent symbol, and money symbol
    const percentValue = 50;
    const percentSymbol = "%";
    const moneySymbol = "€";

    public static function saveImage($file, $route, $id = 1)
    {
        // Check if the file is valid
        if ($file && $file->isValid()) {
            // Set the path to the public directory
            $path = public_path('img/'.$route.'/');
            // Get the original file name
            $originalName = $file->getClientOriginalName();
            // Create a unique route for the file, optionally prefixed with ID
            $route_file = $id.'_'.$originalName;
            // Move the file to the specified path
            $file->move($path, $route_file);
            // Return the generated route for the saved file
            return $route_file;
        }
        // Return false if the file is not valid
        return false;
    }
}
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Gallery extends Users
{
    public static function main_()
    {
        if (!static::isLoggedIn())
        {

        }
        else
        {
            Route::redirect("pro-gallery");
            exit();
        }
        static::create_view("gallery");
    }
}
?>
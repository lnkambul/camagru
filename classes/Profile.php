<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Profile extends Users
{
    public static function main_()
    {
        if(static::isLoggedIn())
        {
            echo "There are ";
            print_r (static::countRows("posts"));
            echo "posts<br>";
            if (isset($_GET['username']))
            {
                if (static::query('SELECT username FROM ' .  static::get_db_name()  .  '.users WHERE username=:username',
                    array(':username'=>$_GET['username'])))
                {
                    $username = static::query('SELECT username FROM ' .  static::get_db_name()  .  '.users WHERE username=:username',
                        array(':username'=>$_GET['username']))[0]['username'];
                    echo htmlspecialchars($username) . " the homie's profile";
                }
            }
            else
            {
                $username = static::query('SELECT username FROM ' .  static::get_db_name()  .  '.users WHERE id=:user_id', array(':user_id'=>static::isLoggedIn()))[0]['username'];
                echo htmlspecialchars($username) . " the big dawg's profile";
            }
            static::parsePic();
        }
        else
        {
            Route::redirect("login");
            exit();
        }
        static::create_view("profile");
    }
}
?>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ChangePassword extends Users
{
    private static function authenticate($password)
    {
       if (password_verify($password, static::query('SELECT password FROM ' .  static::get_db_name()  .  '.users WHERE id=:user_id',
       array(':user_id'=>static::isLoggedIn()))[0]['password']))
       {
           return TRUE;
       }
       return FALSE;
    }

    private static function updatePassword($newpword)
    {
        static::query('UPDATE ' .  static::get_db_name()  .  '.users SET password=:newpassword WHERE id=:user_id',
                    array(':newpassword'=>password_hash($newpword, PASSWORD_BCRYPT), ':user_id'=>static::isLoggedIn()));
        echo "Password changed successfully";
    }

    public static function main_()
    {
        if (static::isLoggedIn())
        {
            if (isset($_POST['changepassword']))
            {
                $password = $_POST['oldpassword'];
                $newpword = $_POST['newpassword'];
                $reppword = $_POST['reppassword'];
                if (static::authenticate($password))
                {
                    if (static::validPasswordComplexity($newpword))
                    {
                        if (static::validPasswordLength($newpword))
                        {
                            if ($newpword == $reppword)
                            {
                                if(static::validPasswordLength($newpword))
                                {
                                    static::updatePassword($newpword);
                                }
                                else {  echo "Invalid new password (minimum 8 characters)"; }
                            }
                            else { echo "new password not duplicated accurately, please try again"; }
                        }
                        else { echo "Invalid password (minimum 8 characters)"; }
                    }
                    else { echo "Invalid password<br>Password must consist of at least:<br>- 1 lower case letter<br>- 1 upper case letter<br>- 1 number<br>"; }
                }
                else { echo "<br>You have entered an incorrect password<br>"; }
            }
        }
        else
        {
            Route::redirect("login");
            exit();
        }
        static::create_view("change-password");
    }
}
?>
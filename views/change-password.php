<!DOCTYPE html>
<html>
    <head>
        <title>
            camagru
        </title>
        <link href="./CSS/fonts.css" type="text/css" rel="stylesheet" />
    </head>
    
    <div class="wrapper">
    <body>
        <header>
        <h1 class="title">camagru</h1>
        </header><!-- end of header -->

        <nav>
            <p> 
                <ul>
                    <li><a href="gallery">gallery</a></li>
                    <li><a href="profile">profile</a></li>
                    <li><a href="logout">logout</a></li>
                    <li><a href="settings">settings</a></li>
                </ul>
            </p>
        </nav><!-- end of links -->
        <div class="inner">
        <p>
            <form method="post">
            <fieldset id="field_1">
            <legend>change password</legend>
            <p><input type="password" name="oldpassword" placeholder="current password..." required="required"></p>
            <p><input type="password" name="newpassword" placeholder="new password..." required="required"></p>
            <p><input type="password" name="reppassword" placeholder="repeat new password..." required="required"></p>
            <p><input type="submit" name="changepassword" value="change password" id="changepassword"></p>
            </fieldset>
            </form>
        </p>   
        </div><!-- end of inner -->
        <footer>
            <hr />
            <p>"geeked <em>oop!</em>"</p>
        </footer><!-- end of footer -->
    </body>
    </div><!-- end of wrapper -->
</html>
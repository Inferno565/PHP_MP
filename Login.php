<?php
session_start();
// $_SESSION
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="Stylesheets/welcome.css">

    <script>

    </script>
</head>

<body>


    <div class="main-image">
    </div>
    <div class="secondary-image">

    </div>
    <div>
        <text class="mytext1">Login</text>
        <text class="mytext2">Welcome</text>
        <text class="mytext3">to A+ plus Portal OR <br> If you are new to this portal <br>create a new account</text>

        <form name="f1" method="post">
            <p class="texts" id="p1" style="position: relative; top: 200px; left: 20px;">
                Email id<br>
                <input type="text" class="inputs" name="email">

            <p class="texts" id="p1" style="position: relative; top: 175px; left: 20px;">
                Password<br>
                <input type="password" class="inputs" name="pass">
                <br><input type="text" class="message" id="m3" value="" readonly="true">
            </p>
            <input type="submit" class="block1" name="submit" value="Sign In" />
            <p><a href="createAccount.php"><input type="button" class="block1" name="name" value="Create Account" /></a></p>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            if (empty($_POST["email"]) || empty($_POST["pass"])) {
                echo '<script>alert("Please fill out all the fields")</script>';
            } else {
                $email = $_POST['email'];
                $pass = $_POST['pass'];

                $conn = mysqli_connect("localhost", "root", "", "mp");
                $res = mysqli_query($conn, "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$pass'") or die("Failed to
                                query Table" . mysqli_error($conn));
                $row = mysqli_fetch_array($res);
                if ($row) {
                    echo '<script>alert("Login Successful!")</script>';
                    $user_current = $row['name'];
                    $_SESSION['email_current']=$row['email'];
                    // $_SESSION['user_current'] = $user_current;
                    // =$email;
                    echo '<script>window.open("stud.php") </script>';
                } else
                    echo '<script>alert("Incorrect Credentials!")</script>';
            }
        }


        ?>

    </div>

</body>

</html>
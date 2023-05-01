<?php 
session_start();
?>
<!DOCTYPE html>
<html lang='en'>
<link rel="stylesheet" href="footer.css">

<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="Stylesheets/ccrtaccnt.css">
    <script>
        MyBanners = new Array('Images/ban1.jpg', 'Images/ban2.webp', 'Images/ban3.jpg', 'Images/ban4.jpg')
        banner = 0

        function ShowBanners() {
            banner++
            if (banner == MyBanners.length) {
                banner = 0
            }
            var ChangeBanner = document.getElementById("link")
            ChangeBanner.style.backgroundImage = `url('${MyBanners[banner]}')`
            setTimeout("ShowBanners()", 2300)
        }
    </script>
</head>

<body onload="ShowBanners()">
    <a href="index.html" id="link" style="background-image: url('Images/ban1.avif');">
    </a>

    <div id="form-container" style="background-color: lightgray; height: 680px; width: 59%; position:relative ;top: 40px">
        <form name="f1" method="post">
            <p class="texts">
                Enter your Name<br>
                <input type="text" class="inputs" name="n">

            </p>

            <p class="texts">
                Mobile Number<br>
                <input type="text" class="inputs" name="m" onchange="numCheck()">

            </p>

            <p class="texts">
                Roll Number<br>
                <input type="text" class="inputs" name="r" onchange="numCheck()">

            </p>

            <p class="texts">
                Email id<br>
                <input type="text" class="inputs" name="e" onchange="emailCheck()">

            </p>

            <p>Select Your role</p>
            <input type="radio" name=rd1 value="Admin" />Admin
            <input type="radio" name=rd1 value="Student" />Student



            <p class="texts">
                Password<br>
                <input type="password" class="inputs" name="p" onchange="passCheck()">

            </p>

            <div class="buttonCont">
                <input style="position: relative; top: 40px;" type="submit" class="block1" name="submit" id="b1" value="Create Account" onclick="CookieCreate()">
            </div>
            <?php
            if (isset($_POST['submit'])) {
                if (empty($_POST["n"]) || empty($_POST["m"]) || empty($_POST["r"] || empty($_POST["e"]) || empty($_POST["p"]))) {
                    echo '<script>alert("Please fill out all the fields")</script>';
                } else {
                    $r = $_POST['rd1'];
                    if ($r == "Admin") {
                        $role = 0;
                    } else {
                        $role = 1;
                    }
                    $name = $_POST["n"];
                    $num = $_POST["m"];
                    $roll = $_POST["r"];
                    $email = $_POST["e"];
                    $pass = $_POST['p'];
                    $_SESSION['name'] = $name;
                    // if (!preg_match("/^([a-zA-Z' ]+)$/", $name) || !preg_match('/^[0-9]{10}+$/', $num) || !preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $email)) {
                    //     echo '<script>alert("Please enter proper details")</script>';
                    // } else {
                        $conn = mysqli_connect("localhost", "root", "", "mp");
                        $query = "INSERT INTO `user` (`user_role`,`name`, `number`, `roll_num`,`email`,`password` ) VALUES ('$role','$name','$num','$roll','$email','$pass')";
                        $res = mysqli_query($conn, $query) or die("Failed to
                                query Table" . mysqli_error($conn));
                        echo '<script>alert("Your account has been created!")</script>';
                    }
                }
            // }

            ?>
            <br><br>

            <a href="Login.php"> <input type="button" class="block2" name="b2" id="b2" value="Have an account Log in"></a>

    </div>
</body>

</html>
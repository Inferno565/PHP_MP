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

        function nameCheck() {
            var letters = /^[A-Za-z]+$/;
            var name = document.getElementById("t1").value;
            if (!(name.match(letters))) {
                document.getElementById("m1").value = "Name must only contain characters!";
            }
            else {
                document.getElementById("m1").value = "";
            }
        }

        function numCheck() {
            var letters = /^[0-9]+$/;
            var num = document.getElementById("t2").value;
            if (num.match(letters) && num.length == 10) {
                document.getElementById("m2").value = "";
            }
            else {
                document.getElementById("m2").value = "Enter valid mobile number!"
            }
        }

        function emailCheck() {
            var letters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var email = document.getElementById("t3").value;
            if (letters.test(email)) {
                document.getElementById("m3").value = "";
            }
            else {
                document.getElementById("m3").value = "Enter valid Email id!"
            }
        }

        function passCheck() {
            // var letters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var pass = document.getElementById("t4").value;
            if (pass.length < 8) {
                document.getElementById("m4").value = "Password must contain atleast 8 character!"
            }
            else {
                document.getElementById("m4").value = "";
            }
        }

        function checkFields() {
            var name = document.getElementById("t1").value;
            var num = document.getElementById("t2").value;
            var email = document.getElementById("t3").value;
            var password = document.getElementById("t4").value;
            var msg1 = document.getElementById("m1").value;
            var msg2 = document.getElementById("m2").value;
            var msg3 = document.getElementById("m3").value;
            var msg4 = document.getElementById("m4").value;

            if (name == "" || num == "" || email == "" || password == "" || msg1 != "" || msg2 != "" || msg3 != "" || msg4 != "") {
                document.getElementById("b1").value = "Fill All Details"
            }
        }
        function ReturnPosition() {
                document.getElementById("b1").value = "Create Account"
        }

        function CookieCreate() {
            var name = escape(document.getElementById("t1").value) + ";";
            var num = escape(document.getElementById("t2").value) + ";";
            var email = escape(document.getElementById("t3").value) + ";";
            var password = escape(document.getElementById("t4").value) + ";";
            document.cookie = "name=" + name;
            document.cookie = "number=" + num;
            document.cookie = "email=" + email;
            document.cookie = "password=" + password;
            var allcookie = document.cookie;
            alert("Account Created!")
        }

    </script>
</head>

<body onload="ShowBanners()">
    <a href="index.html" id="link" style="background-image: url('Images/ban1.avif');">
    </a>

    <div id="form-container"
        style="background-color: lightgray; height: 680px; width: 59%; position:relative ;top: 0px">
        <form name="f1">
            <p class="texts">
                Enter your Name<br>
                <input type="text" class="inputs" id="t1" onchange="nameCheck()">
                <input type="text" class="message" id="m1" value="" readonly="true">
            </p>

            <p class="texts">
                Mobile Number<br>
                <input type="text" class="inputs" id="t2" onchange="numCheck()">
                <input type="text" class="message" id="m2" value="" readonly="true">
            </p>

            <p class="texts">
                Email id<br>
                <input type="text" class="inputs" id="t3" onchange="emailCheck()">
                <input type="text" class="message" id="m3" value="" readonly="true">
            </p>

            <p class="texts">
                Password<br>
                <input type="password" class="inputs" id="t4" onchange="passCheck()">
                <input type="text" class="message" id="m4" value="" readonly="true">
            </p>
            <p >Select Your role</p>
            <input type="radio" >Teacher</input>
            <input type="radio">Student</input>

            <div class="buttonCont" onmouseover="checkFields()" onmouseout="ReturnPosition()">
                <input style="position: relative; top: 40px;"  type="button" class="block1" name="b1" id="b1" value="Create Account" onclick="CookieCreate()">
            </div>
            <br><br>

            <a href="Login.html"> <input type="button" class="block2" name="b2" id="b2"
                    value="Have an account Log in"></a>

    </div>
</body>

</html>
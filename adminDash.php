<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="Stylesheets/bootstrap.min.css" />
    <link rel="stylesheet" href="Stylesheets/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="Stylesheets/navbar.css">
    <link rel="stylesheet" href="Stylesheets/adminDash.css">

</head>

<body onscroll="scrolle()" onload="load()">
    <!-- Navbar -->
    <div class="navbar">
        <div>
            <a href="index.html">
                <img src="Images/online-learning.png">
            </a>
        </div>
        <a class="links tab" id="defaultOpen" onclick="openPage('News', this)">Home</a>
        <a class="links tab" onclick="openPage('Test', this)" class="dropbtn">Create/ Manage Tests
            <a class="links tab" onclick="openPage('Home', this)">View Results</a>
            <a class="links tab" onclick="openPage('News', this)">Answer Queries</a>
            <a class="links" style="position:relative; left: 170px;">Hello <?php echo "ADMIN"; ?></a>
            <a href="#" class="pull-right btn sub1" data-toggle="modal" data-target="#myModal"></span>&nbsp;<span class="title1"><b>Sign Out</b></span></a>
    </div>

    <!-- Navbar -->

    <!-- START internal tabs -->
    <div id="Test" class="tabcontent">
        <!-- add quiz start -->
        <div class="tab1">
            <button class="tablinks" onclick="openTab(event, 'add')">Add new Test</button>
            <button class="tablinks" onclick="openTab(event, 'delete')">Manage Tests</button>
        </div>
        <div id="add" class="tabcontent-low">
            <div class="row">
                <span class="title1" style="margin-left:50%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form class="form-horizontal title1" name="form" action="adminDash.php? q=addquiz" method="POST">

                        <div class="form-group">
                            <label class="col-md-12 control-label" for="sub">Select a Subject</label>
                            <div class="col-md-12">

                                <select id="list" class="form-control">
                                    <option id="php" label="PHP" value="PHP"></option>
                                    <option id="pwp" label="PWP" value="PWP"></option>
                                    <option id="mad" label="MAD" value="MAD"></option>
                                </select>

                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="name"></label>
                            <div class="col-md-12">
                                <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">

                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="total"></label>
                            <div class="col-md-12">
                                <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="right"></label>
                            <div class="col-md-12">
                                <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="wrong"></label>
                            <div class="col-md-12">
                                <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">

                            </div>
                        </div>

                        <!-- Text input-->
                        <!-- <div class="form-group">
                            <label class="col-md-12 control-label" for="time"></label>
                            <div class="col-md-12">
                                <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">

                            </div>
                        </div> -->

                        <!-- Text input-->
                        <!-- <div class="form-group">
                            <label class="col-md-12 control-label" for="tag"></label>
                            <div class="col-md-12">
                                <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">

                            </div>
                        </div> -->


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="desc"></label>
                            <div class="col-md-12">
                                <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-12 control-label" for=""></label>
                            <div class="col-md-12">
                                <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- Add quiz END-->

        <!-- ADD quest -->
        <div id="delete" class="tabcontent-low">
            <?php
            if ($_POST) {
                $count = $_POST["total"];
                for ($i = 0; $i < $count; $i++) {
                    echo ' <div class="row">
                <span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form class="form-horizontal title1" name="form" action="adminDash.php  method="POST">
                        <b>Question number&nbsp;1&nbsp;:</><br /><!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="qns1 "></label>
                                <div class="col-md-12">
                                    <textarea rows="3" cols="5" name="qns1" class="form-control" placeholder="Write question number 1 here..."></textarea>
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="1"></label>
                                <div class="col-md-12">
                                    <input id="1" name="1" placeholder="Enter option a" class="form-control input-md" type="text">

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="1"></label>
                                <div class="col-md-12">
                                    <input id="1" name="1" placeholder="Enter option b" class="form-control input-md" type="text">

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="1"></label>
                                <div class="col-md-12">
                                    <input id="1" name="1" placeholder="Enter option c" class="form-control input-md" type="text">

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-12 control-label" for="1"></label>
                                <div class="col-md-12">
                                    <input id="1" name="1" placeholder="Enter option d" class="form-control input-md" type="text">

                                </div>
                            </div>
                            <br />
                            <b>Correct answer</b>:<br />
                            <select id="ans1" name="ans1" placeholder="Choose correct answer " class="form-control input-md">
                                <option value="a">Select answer for question 1</option>
                                <option value="a">option a</option>
                                <option value="b">option b</option>
                                <option value="c">option c</option>
                                <option value="d">option d</option>
                            </select><br /><br />

                            </div>';
                }

                echo '<div class="form-group">
                            <label class="col-md-12 control-label" for=""></label>
                            <div class="col-md-12">
                                <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary" />
                            </div>
                        </div> ';
            }


            ?>
            <!-- Add questions end -->

        </div>
        <!-- End of multi tab internar -->








        <div id="Home" class="tabcontent">
            <h3>Home</h3>
            <p>Home is where the heart is..</p>
        </div>

        <div id="News" class="tabcontent">
            <h3>News</h3>
            <p>Some news this fine day!</p>
        </div>




        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {
                    myIndex = 1;
                }
                x[myIndex - 1].style.display = "block";
                setTimeout(carousel, 2000); // Change image every 2 seconds
            }

            function load() {
                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            }

            function openPage(pageName, elmnt) {
                // Hide all elements with class="tabcontent" by default */
                var i, tabcontent, tab;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Remove the background color of all tablinks/buttons
                tablinks = document.getElementsByClassName("tab");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].style.backgroundColor = "";
                }

                // Show the specific tab content
                document.getElementById(pageName).style.display = "block";

                // Add the specific color to the button used to open the tab content
                elmnt.style.backgroundColor = "rgb(8, 182, 109)";
            }

            function openTab(evt, opname) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent-low");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the button that opened the tab
                document.getElementById(opname).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>

</body>

</html>
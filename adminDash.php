<?php
session_start();
$host = "localhost";
$user = "root";
$database_name = "mp";
$password = "";
$conn = mysqli_connect($host, $user, $password, $database_name) or die("Database connection not established");

?>

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
                    <form class="form-horizontal title1" name="form" action="adminDash.php" method="POST">

                        <div class="form-group">
                            <label class="col-md-12 control-label" for="sub">Select a Subject</label>
                            <div class="col-md-12">

                                <select id="list" class="form-control" name="sub">
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
                        <!-- <div class="form-group">
                            <label class="col-md-12 control-label" for="right"></label>
                            <div class="col-md-12">
                                <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">

                            </div>
                        </div> -->

                        <!-- Text input-->
                        <!-- <div class="form-group">
                            <label class="col-md-12 control-label" for="wrong"></label>
                            <div class="col-md-12">
                                <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">

                            </div>
                        </div> -->

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
                                <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" name="submit" class="btn btn-primary" />
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
            if (isset($_POST['submit'])) {
                if (empty($_POST["total"]) || empty($_POST["name"]) || empty($_POST["desc"])) {
                    echo '<script>alert("Please fill out all the fields")</script>';
                } else {
                    $sub = $_POST["sub"];
                    $title = $_POST["name"];
                    // $_SESSION['subj']=$sub;
                    $_SESSION['test_name'] = $title;
                    // $table_name = $title . $sub;
                    // echo $table_name;
                    $number_of_questions = $_POST["total"];
                    $_SESSION['num_ques']=$number_of_questions;
                    $description = $_POST['desc'];
                    $check_query = "SELECT `test_id` from `quizes` WHERE `test_name`='$title'";
                    $result_check = mysqli_query($conn, $check_query);
                    if (mysqli_num_rows($result_check) == 0) {
                        $insert_query = "INSERT INTO `quizes` (`sub`,`test_name`,`total`,`description`) VALUES ('$sub','$title','$number_of_questions','$description')";
                        $res = mysqli_query($conn, $insert_query) or die("Failed to query Table" . mysqli_error($conn));
                        //create test table query
                        // $query1 = "CREATE TABLE if not exists `mp`.`$table_name` (`q_no` INT NOT NULL AUTO_INCREMENT , `ques` VARCHAR(200) NOT NULL , `op1` VARCHAR(100) NOT NULL , `op2` VARCHAR(100) NOT NULL , `op3` VARCHAR(100) NOT NULL , `op4` VARCHAR(100) NOT NULL , `correct` VARCHAR(50) NOT NULL , PRIMARY KEY (`q_no`))";
                        // $tab_res = mysqli_query($conn, $query1) or die("Database connection not established");

                        // echo '<script>alert("This quiz does not exists")</script>';

                    } else {
                        echo '<script>alert("This quiz already exists")</script>';
                    }
                    // insert into test table query
                    // $query = "INSERT INTO `quizes`(`sub`, `test_name`, `ques_nos`,`description` ) VALUES ('$sub','$title','$number_of_questions','$description')";
                    
                    $query1 = "SELECT * FROM `quizes` WHERE `test_name`='$title' ";
                    $res1 = mysqli_query($conn, $query1);
                    $id = mysqli_fetch_assoc($res1);
                    $myid = $id['test_id'];
                    
                    // $mysub = $id['sub'];
                    print_r($myid);
                    
                    // $myname=$id['test_name'];
                    // $_SESSION['tst_nme'] = $myname;
                    
                    // $_SESSION['num_ques'] = $number_of_questions;

                    for ($i = 1; $i <= $_SESSION['num_ques']; $i++) {
                        echo '<form class="form-horizontal title1" name="form1" action=""  method="POST">
                        <b>Question number&nbsp;&nbsp;:</><br />
                         <div class="form-group">
                          <label class="col-md-12 control-label" for="op1"></label>  
                          <div class="col-md-12">
                          <input id="op1" name="test_id "                                     class="form-control input-md" name="test_id" type="text"
                           value="' . $myid . '">                    
                           
                          </div>
                        <!-- Text input-->
                        // question
                        <div class="form-group">
                          <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
                          <div class="col-md-12">
                          <textarea rows="3" cols="5" name="' . $i . 'q" class="form-control" placeholder="Write question number  here..."></textarea>  
                          </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-12 control-label" for="op1"></label>  
                          <div class="col-md-12">
                          <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
                                            
                          </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-12 control-label" for="op2"></label>  
                          <div class="col-md-12">
                          <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
                                            
                          </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-12 control-label" for="op3"></label>  
                          <div class="col-md-12">
                          <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">
                                            
                          </div>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-12 control-label" for="op"></label>  
                          <div class="col-md-12">
                          <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
                                            
                          </div>
                        </div>
                        <br />
                        <b>Correct answer</b>:<br />
                        <select id="ans' . $i . '" name="' . $i . 'c" placeholder="Choose correct answer " " class="form-control input-md" >
                           <option value="a">Select answer for question </option>
                          <option value="a">option a</option>
                          <option value="b">option b</option>
                          <option value="c">option c</option>
                          <option value="d">option d</option> </select><br /><br />
                          </form>';
                    }
                    echo '<div class="form-group">
                <label class="col-md-12 control-label" for=""></label>
                <div class="col-md-12">
                    <input type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" name="qsubmit" class="btn btn-primary" />
                </div>';
                }
               
            }
            if (isset($_POST['qsubmit'])) {
                $title1 = $_SESSION['test_name'];
                $query5 = "SELECT * FROM `quizes` WHERE `test_name`='$title1'";
                $res5 = mysqli_query($conn, $query5);
                $id = mysqli_fetch_assoc($res5);
                print_r($id);
                $myid = $id['test_id'];
                $mysub = $id['sub'];
                $test = $id['test_name'];
                $count_ques = $id['total'];
                $_SESSION['sub'] = $mysub;
                $_SESSION['test_name'] = $test;
                $_SESSION['id'] = $myid;
                for ($i = 1; $i <= $_SESSION['num_ques']; $i++) {
                    $ques = "this is a test";
                    $op1 = "this is a test";
                    $op2 = "this is a test";
                    $op3 = "this is a test";
                    $op4 = "this is a test";
                    $ans = "this is a test";
                    // $ques = $_POST[$i . 'q'];
                    // $op1 = $_POST[$i . '1'];
                    // $op2 = $_POST[$i . '2'];
                    // $op3 = $_POST[$i . '3'];
                    // $op4 = $_POST[$i . '4'];
                    // $ans = $_POST[$i . 'c'];
                    $test_id_query = "SELECT `test_id`,`test_name` from quizes where test_name='$test'";
                    $result_q = mysqli_query($conn, $test_id_query);
                    $result_for = mysqli_fetch_assoc($result_q);
                    $test_id = $result_for['test_id'];
                    $test_nme = $result_for['test_name'];
                    print_r($result_for);
                    $query_ques = "INSERT INTO `php`(`q_no`,`test_name`,`ques`,`op1`,`op2`,`op3`,`op4`, `correct`,`test_id`) VALUES ('$i','$test','$ques','$op1','$op2','$op3','$op4','$ans','$test_id')";
                    $result_ques = mysqli_query($conn, $query_ques);
                }
            }
            
            ?>
        </div>

        <!-- Add questions end -->

    </div>
    <!-- End of multi tab internal -->





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
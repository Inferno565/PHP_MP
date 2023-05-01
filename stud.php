 <?php
    session_start();
    $host = "localhost";
    $user = "root";
    $database_name = "mp";
    $password = "";
    $conn = mysqli_connect($host, $user, $password, $database_name) or die("Database connection not established");
    $row = array();
    $test_id;
    $sess = $_SESSION['user_current'];
    // print($sess);
// var_dump($_SESSION);
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
     <link rel="stylesheet" href="Stylesheets/stud.css">
     <link rel="stylesheet" href="Stylesheets/adminDash.css">
 </head>

 <body onscroll="scrolle()" onload="load()">
     <div class="navbar">
         <div>
             <a href="index.html">
                 <img src="Images/online-learning.png">
             </a>
         </div>
         <a class="links tab" id="defaultOpen" onclick="openPage('Home', this)">Home</a>
         <a class="links tab" onclick="openPage('Result', this)">View Results</a>
         <a class="links tab" onclick="openPage('News', this)">Ask Queries</a>
         <a class="links" style="position:relative; left: 170px;">Hello <?php echo $_SESSION['user_current']; ?></a>
         <a href="index.php" class="pull-right btn sub1" data-toggle="modal" data-target="#myModal"></span>&nbsp;<span class="title1"><b>Sign Out</b></span></a>
     </div>

     <!-- Navbar -->
     <div id="Home" class="tabcontent">
         <div class="container"><!--container start-->
             <div class="row">
                 <div class="col-md-12">

                     <div class="panel">
                         <form class="form-horizontal title1" name="form1" action="" method="POST">

                             <div class="form-group">
                                 <label class="col-md-12 control-label" for="sub">Enter Test Id to Start</label>
                             </div>
                             <div class="col-md-12">

                                 <select id="list" class="form-control" name="sub">
                                     <option id="php" label="PHP" value="PHP"></option>
                                     <option id="pwp" label="PWP" value="PWP"></option>
                                     <option id="mad" label="MAD" value="MAD"></option>
                                 </select>

                             </div>
                             <!-- Text input -->
                             <div class="form-group">
                                 <label class="col-md-12 control-label" for="name"></label>
                                 <div class="col-md-12">
                                     <input id="name" name="name" placeholder="Enter test Id" class="form-control input-md" type="text" style="width: 200px;">
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-md-12 control-label" for=""></label>
                                 <div class="col-md-12" style="left:-439px">
                                     <input style="margin-left:45%" type="submit" class="btn btn-primary" value="Submit" name="submiti">

                                 </div>
                             </div>
                             <?php
                                if (isset($_POST['submiti'])) {
                                    $start = $_POST['name'];
                                    $start_sub = $_POST['sub'];
                                    $_SESSION['start_id'] = $start;
                                    $_SESSION['start_sub_id'] = $start_sub;

                                    // print_r($_SESSION['sub']);
                                    // print_r($_SESSION['start_id']);
                                    echo "You have entered test id " . $start;
                                    echo "<br>If correct press start to start the exam";
                                }
                                ?>

                         </form>
                         <div class="table-responsive">
                             <div class="col-md-12" style="Padding: 20px;left: -15px;">
                                 <a href="http://localhost/MicroProject/Quiz.php">
                                     <button class="btn btn-primary">
                                         Start Exam
                                     </button>
                                 </a>
                             </div>
                         </div>

                         <div class="table-responsive">
                             <table class="table table-striped title1">
                                 <?php
                                    // $query1 = ";
                                    echo '<tr>
                                 <td><b>S.N.</b></td>
                                 <td><b>Subject</b></td>
                                 <td><b>Topic</b></td>
                                 <td><b>Marks</b></td>
                                 <td></td>
                             </tr>';
                                    $result = mysqli_query($conn, "SELECT * FROM `quizes`");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sr_no = $row['test_id'];
                                        // $_SESSION['test_id'] = $sr_no;
                                        // echo $row['test_id'];
                                        $sub = $row['sub'];
                                        // echo $row['sub'];
                                        $name = $row['test_name'];
                                        $_SESSION['score_nm'] = $name;
                                        // echo $row['test_name'];
                                        $marks = $row['total'];
                                        // echo $row['ques_nos'];
                                        echo '<tr>
                                         <td>' . $sr_no . '</td>
                                         <td>' . $sub . '</td>
                                         <td>' . $name . '</td>
                                         <td>' . $marks . '</td>
                                         <td>
                                         <b>
                                         </td>
                                     </tr> ';
                                    }
                                    ?>
                             </table>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div id="Result" class="tabcontent">
         <div class="table-responsive">
             <table class="table table-striped title1">
                 <?php
                    // $query1 = ";
                    echo '<tr>
                                 <td><b>S.N.</b></td>
                                 <td><b>Subject</b></td>
                                 <td><b>Topic</b></td>
                                 <td><b>Marks</b></td>
                                 <td></td>
                             </tr>';
                    $query_use = "SELECT `name`,`number` from `user` where `name`='$sess'";
                    $row_use = mysqli_query($conn, $query_use);
                    // print_r($row_use);
                    $res_use = mysqli_fetch_assoc($row_use);
                    $pass_name = $res_use['name'];
                    $pass_id = $res_use['number'];
                    $result = mysqli_query($conn, "SELECT * FROM `response` where `user_id`='$sess'");
                    $row = mysqli_fetch_assoc($result);
                    // print_r($row);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sr_no = $row['sr_no'];
                        $_SESSION['test_id'] = $sr_no;
                        // echo $row['test_id'];
                        $sub = $row['user_id'];
                        // echo $row['sub'];
                        $name = $row['test_id'];
                        // echo $row['test_name'];
                        $marks = $row['score'];
                        // echo $row['ques_nos'];
                        echo '<tr>
                                         <td>' . $sr_no . '</td>
                                         <td>' . $_SESSION['start_sub_id'] . '</td>
                                         <td>' . $_SESSION['score_nm'] . '</td>
                                         <td>' . $marks . '</td>
                                         <td>
                                         <b>
                                         </td>
                                     </tr> ';
                    }
                    ?>
             </table>
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
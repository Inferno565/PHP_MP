<?php
session_start();
$host = "localhost";
$user = "root";
$database_name = "mp";
$password = "";
$name = $_SESSION['start_sub_id'];
$start_id = $_SESSION['start_id'];
// $score_name=$_SESSION['score_name'];
$conn = mysqli_connect($host, $user, $password, $database_name) or die("Database connection not established");
$_SESSION['counter'] =  0;
$i = $_SESSION['counter'];
$email = $_SESSION['user_current'];
// var_dump($_SESSION);
// print_r($email);
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz</title>
    <link rel="stylesheet" href="Stylesheets/Quiz.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <?php
    $query_use = "SELECT `number` from `user` where `name`='$email'";
    $row_use = (mysqli_fetch_array(mysqli_query($conn, $query_use), MYSQLI_ASSOC));
    // $pass_name = $row_use['name'];
    // $pass_id = $row_use['number'];
    // print_r($name);
    // print_r($start_id);
    // print_r($qw);

    $queryy = mysqli_query($conn, "SELECT `sr_no`,`q_no`,`ques`,`op1`,`op2`,`op3`,`op4`,`correct` FROM `$name` Where `test_id`='$start_id'");
    $row = mysqli_fetch_array($queryy, MYSQLI_BOTH);
    $correct_answer = $row['correct'];
    $i = 0;
    // do {
        // echo $_SESSION['user'];
        $i = $i + 1;
        echo '<form class="form-horizontal title1" action="stud.php" method="POST">
        <div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="j-md-10 j-lg-10">
                    <div class="border">
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row justify-content-between align-items-center mcq">
                                <h4>MCQ Quiz</h4><span>(
                                    ' . $i . ' of __ )
                                </span>
                            </div>
                        </div>
                        <div class="question bg-white p-3 border-bottom" style="width:1020px">
                            <div class="d-flex flex-row align-items-center question-title">
                                <h3 class="text-danger">Q.</h3>
                                <h5 class="mt-1 ml-2">
                                    ' . $row['ques'] . '
                                </h5>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="' . $i  . 'op" value="' . $row['op1'] . '"> <span>
                                         ' . $row['op1']  . '

                                    </span>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="' . $i  . 'op" value="' . $row['op2'] . '">
                                    <span>
                                        ' . $row['op2'] . '

                                    </span>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="' . $i  . 'op" value="' . $row['op3'] . '">
                                    <span>
                                       ' . $row['op3'] . '
                                    </span>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="' . $i  . 'op" value="' . $row['op4'] . '"> <span>
                                        ' . $row['op4'] . '
                                        </span>
                                    </label>
                                </div>
                         </div>
                     </div>
                 </div>
             </div>           
        </form>';
        // $array[] = $row;
        // print_r($array);
        if (isset($_POST['quizsubmit'])) {
            if (!empty($_POST['' . $i  . 'op'])) {
                $Select_answer = $_POST['' . $i  . 'op'];
                // echo $Select_answer;
                // echo $correct_answer;
                if ($Select_answer == $correct_answer) {
                    $score = +100;
                    $_SESSION['score'] = $score;
                    // echo $score;
                   
                } else {
                    $score = -100;
                    $_SESSION['$score'] = $score;
                    // echo "hahahaha";
                }
            $quer_score_id = "SELECT `number` from `user` where `name`='$email'";
            $quer_score_tid = "SELECT `test_name` from `quizes` where `test_id`='$start_id'";
            $reslly = mysqli_fetch_array(mysqli_query($conn, $quer_score_tid));
            // echo $reslly['test_name'];
            $query_score = "INSERT INTO `response`(`test_id` ,`user_id`,`score`) VALUES ('$start_id','$email',$score)";
            $result = mysqli_query($conn, $query_score);
            echo $result;
            } else {
                echo 'Please select the value.';
            }
        }
    // } while ($row = mysqli_fetch_array($queryy, MYSQLI_ASSOC));



    echo '<div class="form-group">
        <label class="j-md-12 control-label" for=""></label>
        <div class="j-md-12">
        <input  type ="submit"style="margin-left:45%" class="btn btn-primary" value="Submit" name="quizsubmit" class="btn btn-primary" onClick="click()" />
        </div>
     </div>';

    // if (isset($_POST['next'])) {

    // }
    ?>
</body>

</html>
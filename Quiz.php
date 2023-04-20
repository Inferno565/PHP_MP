<?php
// database details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$connect = mysqli_connect("localhost", "root", "", "test") or die("Connection failed");
$query = " select * from questions";
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $count = 0;
    $fname = $row['op1'];
    $count++;
}
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
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>MCQ Quiz</h4><span>(
                                <?php echo $count; ?> of 20)
                            </span>
                        </div>
                    </div>
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger">Q.</h3>
                            <h5 class="mt-1 ml-2">
                                <?php
                                echo $fname;
                                ?>
                            </h5>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="brazil" value="brazil"> <span>
                                    <?php
                                    echo $fname;
                                    ?>
                                </span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="brazil" value="Germany">
                                <span>
                                    <?php
                                    echo $fname;
                                    ?>
                                </span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="brazil" value="Indonesia">
                                <span>
                                    <?php
                                    echo $fname;
                                    ?>
                                </span>
                            </label>
                        </div>
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="brazil" value="Russia"> <span>
                                    <?php
                                    echo $fname;
                                    ?>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white"><button
                            class="btn btn-primary d-flex align-items-center btn-danger" type="button"><i
                                class="fa fa-angle-left mt-1 mr-1"></i>&nbsp;Previous</button><button
                            class="btn btn-primary border-success align-items-center btn-success" type="button">Next<i
                                class="fa fa-angle-right ml-2"></i></button></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
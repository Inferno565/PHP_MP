<?php
// database details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$connect = mysqli_connect("localhost", "root", "", "test") or die("Connection failed");
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <title>Practical </title>
</head>

<body>
    <div class="card">
        <form method="post">
            <?php
            $query = " select * from questions";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $fname = $row['op1'];
            }
            ?>
            <label type="text" name="ques" id="q1">
                <?php echo $fname;
                ?>
                </label><br>
                
                
                
                <!-- <input type="radio" name="ans" id="1" value="one">One
                <input type="radio" name="ans" id="1">Two
                <input type="radio" name="ans" id="1">Three <br> -->
                
                <!-- 
                // creating a connection

                // using sql to create a data entry query
                $sql = "INSERT INTO questions (question,op1) VALUES ('$fname', '$lname')";

                // send query to the database to add values and confirm if successful
                $rs = mysqli_query($con, $sql);
                if ($rs) {
                    echo "Entries added!";
                }

                // close connection
                mysqli_close($con);
         -->

        </form>
    </div>
</body>

</html>
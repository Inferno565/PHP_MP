<!DOCTYPE html>
<html>
<head>
     <title>Micro data </title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            if (isset($_POST['username'])) {
                $username = $_POST['username'];
            }
            if (isset($_POST['textarea'])) {
                $feedback = $_POST['textarea'];
            }
        }
        //Maine database banaya nhi hu to ara hai aisa tera jo database bana hu hoga na uska naam database_name jaha likha hai daal de aur 
        //tera tabalename rahega na mtlb jaha feedback store karna hai wo login ke jage daal dena aur bas ek table banana feedback ka 
    $con = mysqli_connect('localhost', 'root', '', 'DATABASE_NAME') or die("Connection Failed");
    mysqli_query($con, "insert into LOGIN(username,feedback) values ('$username','$feedback')");
    if ($con) {
        echo "feedback submitted";
    }
    else
    {
        echo "failed to enter the feedback";
    }


    $result=mysqli_query($con, "select * from feedback from LOGIN");
    while ($row=mysqli_fetch_assoc($result)) {
        echo "The Feedback you submitted is: ", $row['feedback'];
    }

    

    ?>
</body>
</html>
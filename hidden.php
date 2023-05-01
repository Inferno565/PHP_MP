 <?php
    $query1 = "SELECT `test_id` FROM `quizes` WHERE `test_name`='$title' ";
    $res1 = mysqli_query($conn, $query1);
    $id = mysqli_fetch_assoc($res1);
    // $_POST["test_id"] = $id["test_id"];
?>
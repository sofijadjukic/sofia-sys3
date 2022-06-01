<?php




    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "test";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    $sql="SELECT * FROM crpost";
    $query=mysqli_query($conn,$sql);
 
    if (isset($_POST['submitrec'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];



    if ($conn->connect_error) {
        die('Could not connect to the database.');
    }
    else {
        $sql = "INSERT INTO crpost(title, content) values('$title','$content')";
        mysqli_query($conn, $sql);
        header('location:main.html?info:added');
}
} 


?>
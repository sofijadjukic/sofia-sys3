<?php 
$error='';
if (isset($_POST['submitlogin'])) {

if (empty($_POST['usernamelogin']) || empty($_POST['passwordlogin'])) {
    $error= "Username or Password not entered";
}
else{
$user=$_POST['usernamelogin'];
$pass= $_POST['passwordlogin'];

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "test";
$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
// iz baze zelim da dobijem ime i sifru da bih proverila da li se slaze sa unetom
$query= "SELECT id,password FROM register WHERE username=? ";

if ($stmt= $conn->prepare($query)){ 
$stmt->bind_param('s', $user);
$stmt->execute();
//$stmt->bind_result($username, $password);
$stmt->store_results();

if($stmt->num_rows >0) {
    // ako postoji naog sa tim username
    $stmt->bind_result ($id,$password);
    $stmt->fetch();
    if($pass === $password) {
        echo "Welcome";
        header('location:main.html');

    }
    else echo "Incorrect password";
}
$stmt->close();
echo "The user doesn't have an account";
}


}

}





?>
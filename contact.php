<?php

$Firstname= $_POST['fname'];
$Lastname= $_POST['lname'];
$Telephone = $_POST['tel'];
$Email = $_POST['email'];

$conn = new mysqli('localhost', 'root', '', 'medvibe');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO one (fname,lname,tel, email) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("ssss", $Firstname, $Lastname, $Telephone, $Email);
    $stmt->execute();
    echo "<div class='alert alert-success'>
      <strong>Your Message Was Sent Successfully!</strong>
    </div>";

    $stmt->close();
    $conn->close();
}

?>

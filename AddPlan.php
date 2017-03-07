<?php

function AddPlan($id) {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "CPET";
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$sql = "INSERT INTO Plans VALUES ('". $id['plan_id'] ."', '". $id['semester'] ."', '". $id['c_id'] ."')";

if ($conn->query($sql) == TRUE)
{ echo "Record updated successfully"; } 
else 
{ echo "Error updating record: " . $conn->error; }

$conn->close(); 
}
AddPlan($_POST['plan']);
?>

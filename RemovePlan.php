<?php

function RemovePlan($id) {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "CPET";
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$sql = "DELETE FROM Plans WHERE plan_id = '". $id['plan_id']."' and semester = '". $id['semester'] ."' and c_id = '". $id['c_id'] ."'";

if ($conn->query($sql) == TRUE)
{ echo "Record removed successfully"; } 
else 
{ echo "Error removing record: " . $conn->error; }

$conn->close(); 
}
RemovePlan($_POST['plan']);
?>

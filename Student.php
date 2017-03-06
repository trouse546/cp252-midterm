<?php

function Students() {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "CPET";
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$sql = "SELECT * FROM Students";
$result = $conn->query($sql);

$return_arr = array();
if($result->num_rows > 0)
{
while($row = $result->fetch_assoc())
{
$row_array['s_id'] = $row['s_id'];
$row_array['fname'] = $row['fname'];
$row_array['lname'] = $row['lname'];
$row_array['plan_id'] = $row['plan_id'];

array_push($return_arr,$row_array);
}
}
echo json_encode($return_arr);

$conn->close(); 
}
Students();
?>

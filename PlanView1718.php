<?php

function Plans($id) {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "CPET";
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$sql = "SELECT P.semester, c_name, credits FROM Plans P JOIN Courses C ON P.c_id = C.c_id WHERE plan_id = '". $id . "'and (P.semester = 'Spr18' or P.semester = 'Fal17')";
$result = $conn->query($sql);

$return_arr = array();
if($result->num_rows > 0)
{
while($row = $result->fetch_assoc())
{
$row_array['semester'] = $row['semester'];
$row_array['c_name'] = $row['c_name'];
$row_array['credits'] = $row['credits'];

array_push($return_arr,$row_array);
}
}
echo json_encode($return_arr);

$conn->close(); 
}
Plans('1');
?>

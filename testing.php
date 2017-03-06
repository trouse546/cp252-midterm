<!DOCTYPE html>
<html lang="en">
<header>
test
</header>
<body>
<?php

function Courses() {
$servername = "localhost"; 
$username = "root"; 
$password = "root"; 
$dbname = "CPET";
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$sql = "SELECT * FROM Courses";
$result = $conn->query($sql);

$return_arr = array();
if($result->num_rows > 0)
{
while($row = $result->fetch_assoc())
{
$row_array['c_id'] = $row['c_id'];
$row_array['c_name'] = $row['c_name'];
$row_array['credits'] = $row['credits'];
$row_array['semester'] = $row['semester'];

array_push($return_arr,$row_array);
}
}
echo json_encode($return_arr);

$conn->close(); 
}
Courses();
?>
</body>
</html>

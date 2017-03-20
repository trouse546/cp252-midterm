<?php

require 'flight-master/flight/Flight.php';

Flight::register('cpet_db', 'PDO', array('mysql:host=localhost;port=3306;dbname=CPET', 'root', 'root')); 

function get_plan() { 
	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

	$sql = "SELECT * FROM Plans"; 

	$stmt = $handle->prepare($sql);

        try{

		$result = $stmt->execute(); 
		
		$rows = array(); 

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$rows[] = $row;
		}

		$row_json = json_encode($rows); 
		
		echo $row_json; 
	 

	}catch(PDOException $e) {

  		echo "error " . $e->getMessage();
	}

	$stmt->closeCursor(); 
 
	$handle = null; 
	$stmt = null; 
}

function get_plan_by_id($id) { 

	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

	$sql = "SELECT * FROM Plans WHERE plan_id = ?"; 

	$stmt = $handle->prepare($sql);

        try{

		$result = $stmt->execute(array($id)); 
		
		$rows = array(); 

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$rows[] = $row;
		}

		$row_json = json_encode($rows); 
		
		echo $row_json; 
	 

	}catch(PDOException $e) {

  		echo "error " . $e->getMessage();
	}

	$stmt->closeCursor(); 
 
	$handle = null; 
	$stmt = null; 
}

function get_planview($id) { 

	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

	$sql = "SELECT P.semester, c_name, credits FROM Plans P JOIN Courses C ON P.c_id = C.c_id WHERE plan_id = ?"; 

	$stmt = $handle->prepare($sql);
	
        try{
		$result = $stmt->execute(array($id)); 
		
		$rows = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$rows[] = $row;
		}

		$row_json = json_encode($rows); 

		echo $row_json; 
	 

	}catch(PDOException $e) {

  		echo "error " . $e->getMessage();
	}

	$stmt->closeCursor(); 
 
	$handle = null; 
	$stmt = null; 
}

function get_planview_by_id($id) { 

	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

	$sql = "SELECT P.semester, c_name, credits FROM Plans P JOIN Courses C ON P.c_id = C.c_id WHERE plan_id = '". $id['plan_id'] . "' and (P.semester = '". $id['f_sem'] ."' or P.semester = '". $id['s_sem'] ."')"; 

	$stmt = $handle->prepare($sql);

        try{

		$result = $stmt->execute(array($id)); 
		
		$rows = array(); 

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$rows[] = $row;
		}

		$row_json = json_encode($rows); 
		
		echo $row_json; 
	 

	}catch(PDOException $e) {

  		echo "error " . $e->getMessage();
	}

	$stmt->closeCursor(); 
 
	$handle = null; 
	$stmt = null; 
}

function get_students() { 
	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

	$sql = "SELECT * FROM Students"; 

	$stmt = $handle->prepare($sql);

        try{

		$result = $stmt->execute(); 
		
		$rows = array(); 

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$rows[] = $row;
		}

		$row_json = json_encode($rows); 
		
		echo $row_json; 
	 

	}catch(PDOException $e) {

  		echo "error " . $e->getMessage();
	}

	$stmt->closeCursor(); 
 
	$handle = null; 
	$stmt = null; 
}

function get_courses() { 
	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

	$sql = "SELECT * FROM Courses"; 

	$stmt = $handle->prepare($sql);

        try{

		$result = $stmt->execute(); 
		
		$rows = array(); 

		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$rows[] = $row;
		}

		$row_json = json_encode($rows); 
		
		echo $row_json; 
	 

	}catch(PDOException $e) {

  		echo "error " . $e->getMessage();
	}

	$stmt->closeCursor(); 
 
	$handle = null; 
	$stmt = null; 
}

function Remove_plan($id) { 

	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

	$sql = "DELETE FROM Plans WHERE plan_id = '". $id['plan_id']."' and semester = '". $id['semester'] ."' and c_id = '". $id['c_id'] ."'";

	$stmt = $handle->prepare($sql);

	$result = $stmt->execute(array($id));  
	
	if($result == true)
	{	
		echo "Data Removed";
	} 
	else
	{
		echo "Remove failed";
	}
	
	$stmt->closeCursor(); 
 
	$handle = null; 
	$stmt = null; 
}

function Add_plan($id) { 

	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

	$sql = "INSERT INTO Plans VALUES ('". $id['plan_id'] ."', '". $id['semester'] ."', '". $id['c_id'] ."')";

	$stmt = $handle->prepare($sql);

	$result = $stmt->execute(array($id));  
	
	if($result == true)
	{	
		echo "Data Added";
	} 
	else
	{
		echo "Add failed";
	}
	
	$stmt->closeCursor(); 
 
	$handle = null; 
	$stmt = null; 
}

function Update_studentplan($id) { 

	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

	$sql = "UPDATE Students SET plan_id = '". $id['plan_id'] ."' WHERE s_id = '". $id['s_id'] ."'";

	$stmt = $handle->prepare($sql);

	$result = $stmt->execute(array($id));  
	
	if($result == true)
	{	
		echo "Data Updated";
	} 
	else
	{
		echo "Update failed";
	}
	
	$stmt->closeCursor(); 
 
	$handle = null; 
	$stmt = null; 
}

function Update_plan($id) { 

	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

	$sql = "UPDATE Plans set c_id = '". $id['nc_id'] ."' where plan_id = '". $id['plan_id'] ."' and semester = '". $id['semester'] ."' and c_id = '". $id['c_id'] ."'";

	$stmt = $handle->prepare($sql);

	$result = $stmt->execute(array($id));  
	
	if($result == true)
	{	
		echo "Data Updated";
	} 
	else
	{
		echo "Update failed";
	}
	
	$stmt->closeCursor(); 
 
	$handle = null; 
	$stmt = null; 
}

Flight::route('GET /Plans(/@planid)', function($planid) { 

	if($planid) get_plan_by_id($planid);  
	else get_plan(); 
} 
); 

Flight::route('GET /PlansView/@plan', function($plan) { 
	
	get_planview($plan); 	  
} 
); 

Flight::route('GET /PlansViewbyID/@plan', function($plan) { 
	
	get_planview_by_id($plan); 	  
} 
);

Flight::route('GET /Students', function() { 
	
	get_students(); 	  
} 
);

Flight::route('GET /Courses', function() { 
	
	get_courses(); 	  
} 
);

Flight::route('DELETE /RemovePlan/@plan', function($plan) { 
	
	Remove_plan($plan); 	  
} 
);

Flight::route('POST /AddPlan/@plan', function($plan) { 
	
	Add_plan($plan); 	  
} 
);

Flight::route('UPDATE /UpdateStudentPlan/@plan', function($plan) { 
	
	Add_plan($plan); 	  
} 
);

Flight::route('UPDATE /UpdatePlan/@plan', function($plan) { 
	
	Add_plan($plan); 	  
} 
);	 

Flight::start(); 

?>

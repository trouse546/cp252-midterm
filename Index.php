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

function Add_plan($plan, $sem, $cid) { 

	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO Plans VALUES ('". $plan ."', '". $sem ."', '". $cid ."')";

	$stmt = $handle->prepare($sql);

	$result = $stmt->execute();;

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

Flight::route('POST /AddPlan/@plan/@sem/@cid', function($plan, $sem, $cid) { 
	Add_plan($plan, $sem, $cid);
	 	  
} 
);

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

function Remove_plan($id, $sem, $cid) { 

	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$setup = "UPDATE Students SET plan_id = '0' WHERE plan_id = '" . $id . "'";

	$stmt = $handle->prepare($setup);
	$result = $stmt->execute();

	$sql = "DELETE FROM Plans WHERE plan_id = '". $id ."' and semester = '". $sem ."' and c_id = '". $cid ."'";

	$stmt = $handle->prepare($sql);

	$result = $stmt->execute();  
	
	if($result == true)
	{	
		echo "Data Removed";
	} 
	else
	{
		echo "Remove failed";
	}
	
	$setup = "UPDATE Students SET plan_id = '" . $id . "' WHERE plan_id = '0'";

	$stmt = $handle->prepare($setup);
	$result = $stmt->execute();

	$stmt->closeCursor(); 
 
	$handle = null; 
	$stmt = null; 
}

function Update_studentplan($plan_id, $s_id) { 

	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "UPDATE Students SET plan_id = '". $plan_id ."' WHERE s_id = '". $s_id ."'";

	$stmt = $handle->prepare($sql);

	$result = $stmt->execute();  
	
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

function Update_plan($nc_id, $plan_id, $semester, $c_id) { 

	$handle = Flight::cpet_db(); 

	$handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "UPDATE Plans set c_id = '". $nc_id ."' where plan_id = '". $plan_id ."' and semester = '". $semester ."' and c_id = '". $c_id ."'";

	$stmt = $handle->prepare($sql);

	$result = $stmt->execute();  
	
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

Flight::route('DELETE /RemovePlan/@plan/@sem/@cid', function($plan, $sem, $cid) { 
	
	Remove_plan($plan, $sem, $cid); 	  
} 
);



Flight::route('PUT /UpdateStudentPlan/@plan_id/@s_id', function($plan_id, $s_id) { 
	
	Add_plan($plan_id, $s_id); 	  
} 
);

Flight::route('PUT /UpdatePlan/@nc_id/@plan_id/@semsester/@c_id', function($nc_id, $plan_id, $semester, $c_id) { 
	
	Add_plan($nc_id, $plan_id, $semester, $c_id); 	  
} 
);	 

Flight::start(); 

?>

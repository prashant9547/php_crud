<?php 
function loginChk($login){

    // to declare connection variable to global use within a function
    global $db;

    //fetch all data from database and match the condition
   $sql = "SELECT * FROM tbl_admin ";
   $sql .= "WHERE adminEmail = '$login[email]' AND adminPass = '$login[password]'";

   // to get all data in result set 
   $result = mysqli_query($db, $sql);

   // to get all data from database in arrya formate and access to theme
   $data = mysqli_fetch_assoc($result);

   //to add or assign name and email to appropiate varibales like below
   $adminName = $data['adminName'];
   $adminEmail =  $data['adminEmail'];
    
   //to check number of record is exists or not in database
   if($result-> num_rows > 0){
       session_start();
        echo $_SESSION['adminEmail'] = $adminEmail;
        echo $_SESSION['adminName'] = $adminName;
        //header("location:index.php");
        redirect_to('index');
} else{
    echo "Email Or Password Is Wrong!";
}

}

function fetch_all_record($tbl_name){
    global $db;
    $sql = "SELECT * FROM $tbl_name ";
    $sql .= "ORDER BY id DESC";
    // echo $sql;
    // exit;
    // echo $sql;
    $result = mysqli_query($db,$sql);
    // confrim_result_set($result);
    return $result;
}

function fetch_one_record_by_id($id,$tblName){
	global $db;

    $sql = "SELECT * FROM $tblName ";
    $sql .= "WHERE id='" . $id . "'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    // confirm_result_set($result);
    $about_us = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	// echo '<pre>';
	// print_r($subject);
	// echo '</pre>';
    return $about_us; // returns an assoc. array

}

function aboutInsert($aboutUs){
	global $db;
	$sql = "INSERT INTO tbl_about_us ";
	$sql .= "(myName, myDesignation, myEmail, myWebsite, mySkype, mycell) ";
	$sql .= "VALUES(";
	$sql .= "'" . $aboutUs['name'] . "', '" . $aboutUs['email'] . "', '" . $aboutUs['designation'] . "', ";
	$sql .= "'" . $aboutUs['skypeId'] . "', '" . $aboutUs['website'] . "', '" . $aboutUs['cell'] . "'";
	$sql .= ")";
	// echo $sql;
	// exit;
	$result = mysqli_query($db, $sql);
	if($result) {
		header('location:'.WWW_ROOT.'/admin/about/index.php');
	  } else {
		// INSERT failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	  }
	// return $result;
}

function aboutUpdate($aboutus, $id){
	global $db;
	$sql = "UPDATE tbl_about_us SET ";
    $sql .= "myName='" . $aboutus['name'] . "', ";
    $sql .= "myDesignation='" . $aboutus['designation'] . "', ";
	$sql .= "myEmail='" . $aboutus['email'] . "' ,";
	$sql .= "myWebsite='" . $aboutus['website'] . "' ,";
	$sql .= "mySkype='" . $aboutus['skypeId'] . "' ,";
	$sql .= "mycell='" . $aboutus['cell'] . "' ";
    $sql .= "WHERE id='" . $id . "' ";
	$sql .= "LIMIT 1";
	// echo $sql;
	// exit;

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
		header('location:'.WWW_ROOT.'/admin/about/index.php');
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function aboutDelete($id,$tblName){
	global $db;
	$sql = "DELETE FROM $tblName ";
	$sql .= "WHERE id='" . $id . "' ";
	$sql .= "LIMIT 1";
	$result = mysqli_query($db,$sql); 
	if($result) {
		header('location:'.WWW_ROOT.'/admin/about/index.php');
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      //db_disconnect($db);
      exit;
    }
}

function aboutInsertMore($aboutMore){
	global $db;
	$sql = "INSERT INTO tbl_about_more ";
	$sql .= "(profileImage, resumePdf, visitCardFront, visitCardBack, videoUrl, description) ";
	$sql .= "VALUES(";
	$sql .= "'" . $aboutMore['pimage'] . "', '" . $aboutMore['resume'] . "', '" . $aboutMore['bfront'] . "', ";
	$sql .= "'" . $aboutMore['bback'] . "', '" . $aboutMore['vurl'] . "', '" . $aboutMore['editor1'] . "'";
	$sql .= ")";
	// echo $sql;
	// exit;
	$result = mysqli_query($db, $sql);
	if($result) {
		header('location:'.WWW_ROOT.'/admin/about_more/index.php');
	  } else {
		// INSERT failed
		echo mysqli_error($db);
		//db_disconnect($db);
		exit;
	  }
	// return $result;
}

function aboutMoreUpdate($aboutmore, $id){
	global $db;
	$sql = "UPDATE tbl_about_more SET ";
    $sql .= "profileImage='" . $aboutmore['pimage'] . "', ";
    $sql .= "resumePdf='" . $aboutmore['resume'] . "', ";
	$sql .= "visitCardFront='" . $aboutmore['bfront'] . "' ,";
	$sql .= "visitCardBack='" . $aboutmore['bback'] . "' ,";
	$sql .= "videoUrl='" . $aboutmore['vurl'] . "' ,";
	$sql .= "description='" . $aboutmore['editor1'] . "' ";
    $sql .= "WHERE id='" . $id . "' ";
	$sql .= "LIMIT 1";
	// echo $sql;
	// exit;

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
		header('location:'.WWW_ROOT.'/admin/about_more/index.php');
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      //db_disconnect($db);
      exit;
    }
}

function sliderInsert($sliderImage){
	global $db;
	$sql = "INSERT INTO tbl_slider_image ";
	$sql .= "(imageName) ";
	$sql .= "VALUES(";
	$sql .= "'" . $sliderImage['sliderimage'] . "'";
	$sql .= ")";
	// echo $sql;
	// exit;
	$result = mysqli_query($db, $sql);
	if($result) {
		header('location:'.WWW_ROOT.'/admin/slider/index.php');
	  } else {
		// INSERT failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	  }
	// return $result;
}

function sliderUpdate($sliderImage, $id){
	global $db;
	$sql = "UPDATE tbl_slider_image SET ";
    $sql .= "imageName='" . $sliderImage['sliderimage'] . "'";
    $sql .= "WHERE id='" . $id . "' ";
	$sql .= "LIMIT 1";
	// echo $sql;
	// exit;

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
		header('location:'.WWW_ROOT.'/admin/slider/index.php');
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      //db_disconnect($db);
      exit;
    }
}


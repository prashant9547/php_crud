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
        header("location:index.php");
} else{
    echo "Email Or Password Is Wrong!";
}


}
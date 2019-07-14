<?php

include '../initilize.php';

$id = $_GET['id'] ?? '';

session_start();

if (!isset($_SESSION['adminEmail'])) {
    redirect_to('login');
} else {
    $adminEmail = $_SESSION['adminEmail'];
    $adminName = $_SESSION['adminName'];
}
$tblName = "tbl_about_more";
$aboutMore = fetch_one_record_by_id($id,$tblName);
// print_r($about_us);
// exit;

if(is_post_request()){
    if(isset($_FILES["pimage"]) && $_FILES["pimage"]["error"] == 0){
        $allowed = array("jpeg" => "image/jpeg", "jpg" => "image/jpg");
        $filename = $_FILES["pimage"]["name"];
        $filetype = $_FILES["pimage"]["type"];
        $filesize = $_FILES["pimage"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype,$allowed)){
            // Check whether file exists before uploading it
      
                move_uploaded_file($_FILES["pimage"]["tmp_name"], ADMIN."/assets/img/profileimage/".$filename);
             //   echo "Your file was uploaded successfully.";
       
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
       $filename = $aboutMore['profileImage'];
    }
    if(isset($_FILES["resume"]) && $_FILES["resume"]["error"] == 0){
        $allowed1 = array("jpeg" => "image/jpeg", "jpg" => "image/jpg", "pdf" =>"application/pdf");
        $filename1 = $_FILES["resume"]["name"];
        $filetype1 = $_FILES["resume"]["type"];
        $filesize1 = $_FILES["resume"]["size"];
    
        // Verify file extension
        $ext1 = pathinfo($filename1, PATHINFO_EXTENSION);
        if(!array_key_exists($ext1, $allowed1)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize1 = 5 * 1024 * 1024;
        if($filesize1 > $maxsize1) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype1,$allowed1)){
            // Check whether file exists before uploading it
      
                move_uploaded_file($_FILES["resume"]["tmp_name"], ADMIN."/assets/img/resumefile/".$filename1);
             //   echo "Your file was uploaded successfully.";
       
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        $filename1 = $aboutMore['resumePdf'];
    }
    if(isset($_FILES["bfront"]) && $_FILES["bfront"]["error"] == 0){
        $allowed2 = array("jpeg" => "image/jpeg", "jpg" => "image/jpg");
        $filename2 = $_FILES["bfront"]["name"];
        $filetype2 = $_FILES["bfront"]["type"];
        $filesize2 = $_FILES["bfront"]["size"];
    
        // Verify file extension
        $ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
        if(!array_key_exists($ext2, $allowed2)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize2 = 5 * 1024 * 1024;
        if($filesize2 > $maxsize2) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype2,$allowed2)){
            // Check whether file exists before uploading it
      
                move_uploaded_file($_FILES["bfront"]["tmp_name"], ADMIN."/assets/img/visitingcard/".$filename2);
             //   echo "Your file was uploaded successfully.";
       
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        $filename2 = $aboutMore['visitCardFront'];
    }
    if(isset($_FILES["bback"]) && $_FILES["bback"]["error"] == 0){
        $allowed3 = array("jpeg" => "image/jpeg", "jpg" => "image/jpg");
        $filename3 = $_FILES["bback"]["name"];
        $filetype3 = $_FILES["bback"]["type"];
        $filesize3 = $_FILES["bback"]["size"];
    
        // Verify file extension
        $ext3 = pathinfo($filename3, PATHINFO_EXTENSION);
        if(!array_key_exists($ext3, $allowed3)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize3 = 5 * 1024 * 1024;
        if($filesize2 > $maxsize2) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype3,$allowed3)){
            // Check whether file exists before uploading it
      
                move_uploaded_file($_FILES["bback"]["tmp_name"], ADMIN."/assets/img/visitingcard/".$filename3);
             //   echo "Your file was uploaded successfully.";
       
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        $filename3 = $aboutMore['visitCardBack'];
    }
    $aboutMore = [];
    $aboutMore['pimage'] = $filename ?? '';
    $aboutMore['resume'] = $filename1 ?? '';
    $aboutMore['bfront'] = $filename2 ?? '';
    $aboutMore['bback'] = $filename3 ?? '';
    $aboutMore['vurl'] = $_POST['vurl'] ?? '';
    $aboutMore['editor1'] = $_POST['editor1'] ?? '';
    // print_r($aboutUs);
    // exit;
    $result = aboutMoreUpdate($aboutMore,$id);
}
?>

<!DOCTYPE html>
<html                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       >

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Data Tables</title>
    <?php require(ADMIN . '/include/css.php'); ?>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
</head>

<body>

    <div id="wrapper">

        <?php require(ADMIN . '/include/sidebar.php'); ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <?php require(ADMIN . '/include/header.php'); ?>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>About</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo ADMIN.'/'; ?>">Home</a>
                        </li>
                        <li>
                            <a>About</a>
                        </li>
                        <li class="active">
                            <strong>Add About</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Add About Information</h5>
                                <div class="ibox-tools">
                                    <!-- <a title="Create" href="<?php echo WWW_ROOT . '/admin/about/create.php'; ?>">
                                        <i class="fa fa-plus"></i>
                                    </a> -->
                                </div>
                            </div>
                            <div class="ibox-content">
                                <p>* Required all field </p>
                                <form id="aboutMore" name="aboutMore" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <div class="form-group"><label class="col-lg-2 control-label">Profile Image</label>
                                        <div class="col-lg-5"><input title="Profile Image" type="file" name="pimage" id="pimage" placeholder="Enter Profile Image" class="form-control">
                                         <span class="help-block m-b-none btn btn-outline btn-warning form-control"> Max file size must be 2MB .jpg|.jpeg|.png </span>
                                            </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Upload Resume</label>
                                        <div class="col-lg-5"><input title="Resume" type="file" name="resume" id="resume" placeholder="Enter Resume" class="form-control">
                                         <span class="help-block m-b-none btn btn-outline btn-warning form-control"> Max file size must be 1MB .jpg|.jpeg|.pdf </span>
                                            </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Business card Front</label>
                                        <div class="col-lg-5"><input title="Visiting Card Frontside" type="file" name="bfront" id="bfront" placeholder="Enter Profile Image" class="form-control">
                                         <span class="help-block m-b-none btn btn-outline btn-warning form-control"> Max file size must be 5MB .jpg|.jpeg|.pdf </span>
                                            </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Business card Back</label>
                                        <div class="col-lg-5"><input title="Visiting Card Backside" type="file" name="bback" id="bback" placeholder="Enter Profile Image" class="form-control">
                                         <span class="help-block m-b-none btn btn-outline btn-warning form-control"> Max file size must be 5MB .jpg|.jpeg|.pdf </span>
                                            </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Video Url</label>
                                        <div class="col-lg-5"><input type="url" name="vurl" id="vurl" value="<?php echo $aboutMore['videoUrl']; ?>" placeholder="Enter Video Link"
                                                class="form-control">
                                                <span class="help-block m-b-none">Eg. Max file size must be 2MB .jpg|.jpeg|.png </span>
                                            </div>
                                            
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Description</label>
                                        <div class="col-lg-5"><textarea name="editor1" id="editor1" rows="10" cols="80" placeholder="Enter About Description"
                                                class="form-control"><?php echo $aboutMore['description']; ?></textarea></div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-5">
                                            <button title="Submit" class="btn btn-sm btn-primary" name="addAboutMore" id="addAboutMore" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit </button>
                                            <button title="Reset" class="btn btn-sm btn-danger" name="addReset" id="addReset" type="reset"><i class="fa fa-file-o" aria-hidden="true"></i> Reset </button>
                                            <a title="Back" href="<?php echo WWW_ROOT.'/admin/about_more/index.php'; ?>" class="btn btn-sm btn-info" name="backAboutMore" id="backAboutMore" type="button"><i class="fa fa-arrow-left" aria-hidden="true"> Back </i></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include(ADMIN . '/include/footer.php'); ?>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        function confrimDelete() {
            var retVal = confirm("Are u sure to delete?");
            if (retVal == true) {
                return true;
            } else {
                return false;
            }
        }

        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'editor1' );
        $("#addAboutMore").on('submit',(function(e){
            e.preventDefault();
            //var formData1 = document.getElementById("aboutMore");
            var formData = new FormData(this);
            console.log(formData);
            // $.ajax({
            //     url: "../query_function.php",
            //     data: {
            //         zipcode: 97201
            //     },
            //     success: function( result ) {
            //         $( "#weather-temp" ).html( "<strong>" + result + "</strong> degrees" );
            //     }
            // });
    }));
    });
    


</script>
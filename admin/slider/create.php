<?php

include '../initilize.php';

session_start();
if (!isset($_SESSION['adminEmail'])) {
    redirect_to('login');
} else {
    $adminEmail = $_SESSION['adminEmail'];
    $adminName = $_SESSION['adminName'];
}
if(is_post_request()){
    if(isset($_FILES["sliderimage"]) && $_FILES["sliderimage"]["error"] == 0){
        $allowed = array("jpeg" => "image/jpeg", "jpg" => "image/jpg");
        $filename = $_FILES["sliderimage"]["name"];
        $filetype = $_FILES["sliderimage"]["type"];
        $filesize = $_FILES["sliderimage"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype,$allowed)){
            // Check whether file exists before uploading it
      
                move_uploaded_file($_FILES["sliderimage"]["tmp_name"], ADMIN."/assets/img/sliderimage/".$filename);
             //   echo "Your file was uploaded successfully.";
       
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["sliderimage"]["error"];
    }

    $sliderImage = [];
    $sliderImage['sliderimage'] = $filename ?? '';
    // echo "<pre>";
    // print_r($sliderImage);
    // echo "</pre>";
    // exit;
    $result = sliderInsert($sliderImage);
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
                                    <div class="form-group"><label class="col-lg-2 control-label">Slider Image</label>
                                        <div class="col-lg-5"><input title="Slider Image" type="file" name="sliderimage" id="sliderimage" placeholder="Enter Profile Image" class="form-control">
                                         <span class="help-block m-b-none btn btn-outline btn-warning form-control"> Max file size must be 2MB .jpg|.jpeg|.png </span>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-5">
                                            <button title="Submit" class="btn btn-sm btn-primary" name="sliderImage" id="sliderImage" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit </button>
                                            <button title="Reset" class="btn btn-sm btn-danger" name="addReset" id="addReset" type="reset"><i class="fa fa-file-o" aria-hidden="true"></i> Reset </button>
                                            <a title="Back" href="<?php echo WWW_ROOT.'/admin/slider/index.php'; ?>" class="btn btn-sm btn-info" name="backAboutMore" id="backAboutMore" type="button"><i class="fa fa-arrow-left" aria-hidden="true"> Back </i></a>
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
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

$tblName = "tbl_about_us";
$about_us = fetch_one_record_by_id($id,$tblName);
// print_r($about_us);
// exit;

if(is_post_request()){
    $aboutUs = [];
    $aboutUs['name'] = $_POST['name'] ?? '';
    $aboutUs['email'] = $_POST['email'] ?? '';
    $aboutUs['designation'] = $_POST['designation'] ?? '';
    $aboutUs['skypeId'] = $_POST['skypeId'] ?? '';
    $aboutUs['website'] = $_POST['website'] ?? '';
    $aboutUs['cell'] = $_POST['cell'] ?? '';
    // print_r($aboutUs);
    // exit;
    $result = aboutUpdate($aboutUs,$id);
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Data Tables</title>

    <?php require(ADMIN . '/include/css.php'); ?>

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
                            <strong>Edit About</strong>
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
                                <h5>Update About information</h5>
                                <div class="ibox-tools">
                                    <!-- <a title="Create" href="<?php echo WWW_ROOT . '/admin/about/create.php'; ?>">
                                        <i class="fa fa-plus"></i>
                                    </a> -->
                                </div>
                            </div>
                            <div class="ibox-content">
                                <p>* Required all field </p>
                                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <div class="form-group"><label class="col-lg-2 control-label">Your Name</label>
                                        <div class="col-lg-5"><input type="text" name="name" value="<?php echo $about_us['myName']; ?>" id="name" placeholder="Enter Name" class="form-control"> 
                                                <!-- <span class="help-block m-b-none">Example
                                                block-level help text here.</span> -->
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Your Email</label>
                                        <div class="col-lg-5"><input type="email" name="email" value="<?php echo $about_us['myEmail'] ?>" id="email" placeholder="Enter Email"
                                                class="form-control"></div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Your Designation</label>
                                        <div class="col-lg-5"><input type="text" name="designation" value="<?php echo $about_us['myDesignation'] ?>" id="designation" placeholder="Enter Designation"
                                                class="form-control"></div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Your Website</label>
                                        <div class="col-lg-5"><input type="url" name="website" value="<?php echo $about_us['myWebsite'] ?>" id="website" placeholder="Enter Website"
                                                class="form-control"></div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Your Skype Id</label>
                                        <div class="col-lg-5"><input type="text" name="skypeId" id="skypeId" value="<?php echo $about_us['mySkype'] ?>" placeholder="Enter Skype-id"
                                                class="form-control"></div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Your Cell No</label>
                                        <div class="col-lg-5"><input type="tel" name="cell" id="cell" value="<?php echo $about_us['myCell'] ?>" placeholder="Enter Cell-No"
                                                class="form-control"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-5">
                                            <button title="Update" class="btn btn-sm btn-primary" name="addAbout" id="addAbout" type="submit">Update</button>
                                            <a title="Back" href="<?php echo WWW_ROOT.'/admin/about/index.php'; ?>" class="btn btn-sm btn-info" name="addBack" id="addBack" type="submit">Back</a>
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

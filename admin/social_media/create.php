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
    $aboutUs = [];
    $aboutUs['name'] = $_POST['name'] ?? '';
    $aboutUs['email'] = $_POST['email'] ?? '';
    $aboutUs['designation'] = $_POST['designation'] ?? '';
    $aboutUs['skypeId'] = $_POST['skypeId'] ?? '';
    $aboutUs['website'] = $_POST['website'] ?? '';
    $aboutUs['cell'] = $_POST['cell'] ?? '';
    // print_r($aboutUs);
    // exit;
    $result = aboutInsert($aboutUs);
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
                                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <div class="form-group"><label class="col-lg-2 control-label">Facebook</label>
                                        <div class="col-lg-5"><input type="text" name="name" id="name" placeholder="Enter Name" class="form-control"> 
                                                <!-- <span class="help-block m-b-none">Example
                                                block-level help text here.</span> -->
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Twitter</label>
                                        <div class="col-lg-5"><input type="email" name="email" id="email" placeholder="Enter Email"
                                                class="form-control"></div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">LinkedIn</label>
                                        <div class="col-lg-5"><input type="text" name="designation" id="designation" placeholder="Enter Designation"
                                                class="form-control"></div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Youtube</label>
                                        <div class="col-lg-5"><input type="url" name="website" id="website" placeholder="Enter Website"
                                                class="form-control"></div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Pintrest</label>
                                        <div class="col-lg-5"><input type="text" name="skypeId" id="skypeId" placeholder="Enter Skype-id"
                                                class="form-control"></div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Your Cell No</label>
                                        <div class="col-lg-5"><input type="tel" name="cell" id="cell" placeholder="Enter Cell-No"
                                                class="form-control"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-5">
                                            <button title="Submit" class="btn btn-sm btn-primary" name="addAbout" id="addAbout" type="submit">Submit</button>
                                            <button title="Reset" class="btn btn-sm btn-danger" name="addReset" id="addReset" type="reset">Reset</button>
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
<script>
    function confrimDelete() {
        var retVal = confirm("Are u sure to delete?");
        if (retVal == true) {
            return true;
        } else {
            return false;
        }
    }
</script>
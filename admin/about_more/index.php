<?php

include'../initilize.php';

session_start();
if(!isset($_SESSION['adminEmail'])) {
    redirect_to('login');
} else{
    $adminEmail = $_SESSION['adminEmail'];
    $adminName = $_SESSION['adminName'];
}
$about = fetch_all_record('tbl_about_us');
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Data Tables</title>

    <?php require (ADMIN.'/include/css.php'); ?>

</head>

<body>

    <div id="wrapper">

    <?php require (ADMIN.'/include/sidebar.php'); ?>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <?php require (ADMIN.'/include/header.php'); ?>
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
                            <strong>List About</strong>
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
                        <h5>List About information</h5>
                        <div class="ibox-tools">
                            <a title="Create" href="<?php echo WWW_ROOT.'/admin/about/create.php'; ?>">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($row = mysqli_fetch_assoc($about)) { ?>
                    <tr>
                        <td><?php echo html_specialchars($row['id']); ?></td>
                        <td><?php echo html_specialchars($row['myName']); ?></td>
                        <td><?php echo html_specialchars($row['myDesignation']); ?></td>
                        <td><?php echo html_specialchars($row['myEmail']); ?></td>
                        <td><?php if($row['status'] == 0){
                            echo '<span class="label label-primary">Active</span>';
                        }else{
                            echo '<span class="label label-danger">Deactivee</span>';
                        } ?></td>
                        <td>
                            <a title="Edit" class="btn btn-primary" href="<?php echo WWW_ROOT.'/admin/about/edit.php?id='.html_specialchars(url_Encode($row['id'])); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                             <a title="Deletee" class="btn btn-danger" onclick="return confrimDelete();" href="<?php echo WWW_ROOT.'/admin/about/delete.php?id='.html_specialchars(url_Encode($row['id']));?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
       <?php include (ADMIN.'/include/footer.php'); ?>

        </div>
        </div>

</body>

</html>
<script>
    function confrimDelete(){
        var retVal = confirm("Are u sure to delete?");
        if( retVal == true ) {
                  return true;
               } else {
                  return false;
               }
    }
    </script>
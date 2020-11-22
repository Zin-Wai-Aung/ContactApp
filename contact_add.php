<?php
session_start();
require_once "function.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Validation</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="vendor/data_table/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="container">
    <div class="row d-flex">
        <div class="col-12 col-md-6 offset-2">
            <div class="card my-5">
                <div class="card-body">
                    <h4 class="font-weight-bold text-uppercase text-center">Create New Contact</h4>
                    <hr>
                    <?php
                    if (isset($_POST['register'])){
                        echo register();
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <i class="feather-users text-primary font-weight-bold"></i>
                            <label for="name" class="text-primary font-weight-bold">Your Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo old('name'); ?>">
                            <?php if (getError('name')){ ?>
                                <small class="text-danger"><?php echo getError('name')?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <i class="feather-phone text-primary font-weight-bold"></i>
                            <label for="phone" class="text-primary font-weight-bold">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="<?php echo old('phone'); ?>">
                            <?php if (getError('phone')){ ?>
                                <small class="text-danger"><?php echo getError('phone')?></small>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <i class="feather-file text-primary font-weight-bold"></i>
                            <label for="photo" class="text-primary font-weight-bold">Upload Photo</label>
                            <input type="file" id="photo" name="photo" class="form-control p-1" value="<?php echo old('uload'); ?>">
                            <?php if (getError('photo')){ ?>
                                <small class="text-danger"><?php echo getError('photo')?></small>
                            <?php } ?>
                        </div>

                        <hr>
                        <div class="form-row justify-content-end align-items-center">
                            <div class="form-group mb-0">
                                <a href="index.php" class="btn btn-outline-primary">Cancel</a>
                                <button name="register" class="btn btn-primary"> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php clearError(); ?>
<script src="vendor/bootstrap/js/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
<?php
require_once "function.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validation Project</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="vendor/data_table/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-row align-items-center mt-3 ml-5">
                <div style="width: 50px;height:50px;border-radius: 50%;" class="d-flex align-items-center justify-content-center bg-primary mr-2">
                    <i class="feather-user text-light"></i>
                </div>
                <h3 class="font-weight-bold text-black-50">
                    Contacts
                </h3>
            </div>
            <div class="card mt-5">
                <div class="card-body">
                    <div class="mb-5">
                        <a href="contact_add.php" class="btn btn-outline-primary">
                            <i class="feather-plus"></i>
                            Create Contact
                        </a>
                    </div>
                    <table class="table table-hover mt-3 mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th class="text-nowrap">Phone Number</th>
                            <th class="text-nowrap">Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach (contactAll() as $c){?>
                            <tr>
                                <td><?php echo $c['id'];?></td>
                                <td>
                                    <img src="<?php echo $c['photo']; ?>"
                                         style="height:70px;width:70px;border:1px solid #fff;border-radius:50%;" alt="">
                                </td>
                                <td class="text-nowrap"><?php echo $c['name'];?></td>
                                <td><?php echo $c['phone'];?></td>
                                <td class="text-nowrap"><?php echo showTime($c['created_at']);?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="vendor/bootstrap/js/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="vendor/data_table/jquery.dataTables.min.js"></script>
<script src="vendor/data_table/dataTables.bootstrap4.min.js"></script>
<script>
    $(".table").dataTable({

    });
</script>
</body>
</html>
<?php
include 'connect to database.php';

if (isset($_GET['att'])) {
    $id = $_GET['att'];
    $status = "t";
    $update = "UPDATE `data` SET `status` = '$status' WHERE  '$id' = `id`";

    $update = mysqli_query($conn, $update);
    header("location: index.php");

}
if (isset($_GET['pay'])) {
    $id = $_GET['pay'];
    $status = "paid";
    $update = "UPDATE `data` SET `money` = '$status' WHERE  '$id' = `id`";

    $update = mysqli_query($conn, $update);
    header("location: index.php");
}
?>


<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style3.css">
    <style>
        tr {
            cursor: pointer;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background: linear-gradient(rgb(66, 44, 44), rgb(29, 17, 17));
        }

        .td {
            transition: all 0.5ms;
        }

        .nav {
            width: 50% !important;
            background-color: rgb(43, 8, 71);
            margin: 20px 0px;
        }

        .nav li {
            margin: 30px auto;

        }

        .nav li a {
            padding: 15px 40px;
            background-color: rgb(6, 24, 65);
            transition: all .2s;
        }

        .nav li a:hover {
            transform: scale(1.2, 1.2);
        }
    </style>
</head>

<body>

    <div class="container">
        <ul class="nav nav-pills mx-auto" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active text-white" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Paid</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Unpaid</a>
            </li>
          
            <li>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <input class="form-control mr-sm-2" id="myInput" type="search" placeholder="Search" aria-label="Search">

            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <table class="table  table-advance text-light" id="myTable">
                    <tbody>
                        <tr>

                            <th><i class="icon_profile"></i> Ticket Code</th>
                            <th><i class="icon_calendar"></i> Name</th>
                            <th><i class="icon_mail_alt"></i> Council</th>
                            <th><i class="icon_mobile"></i>Phone</th>
                            <th><i class="icon_cogs"></i> Attend</th>
                            <th><i class="icon_cogs"></i> Fees</th>          
                                  
                        <tr>
                            <?php
                            $select = "SELECT * FROM `data` where `money` = 'paid'  ORDER BY `status`";
                            $q = mysqli_query($conn, $select);
                            foreach ($q as $data) {
                            ?>
                                <td> <?php echo $data['code'] ?> </td>
                                <td> <?php echo $data['name'] ?> </td>
                                <td> <?php echo $data['council'] ?> </td>
                                <td> <?php echo $data['phone'] ?> </td>
                                <td>
                                    <form method="GET">
                                        <?php if ($data['status'] == "f") : ?>
                                            <a href="index.php?att=<?php echo $data['id']; ?>" class="btn btn-primary"> Attend </a>
                                        <?php else : ?>
                                            <button disabled class="btn btn-info" > Attend </button>
                                        <?php endif ?>
                                    </form>
                                </td>
                                <td>
                                    <form method="GET">
                                        <?php if ($data['money'] == "paid") : ?>
                                                 <button class="btn btn-info btn-sm" disabled> Paid </button>
                                        <?php else : ?>
                                            <a href="index.php?att=<?php echo $data['id']; ?>" class="btn btn-primary"> Attend </a>
                                            <?php endif ?>
                                    </form>
                                </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <table class="table  table-advance text-light" id="myTable">
                    <tbody>
                        <tr>

                            <th><i class="icon_profile"></i> Ticket Code</th>
                            <th><i class="icon_calendar"></i> Name</th>
                            <th><i class="icon_mail_alt"></i> Council</th>
                            <th><i class="icon_mobile"></i>Phone</th>
                            <th><i class="icon_cogs"></i> Attend</th>
                            <th><i class="icon_cogs"></i> Fees</th>
                        </tr>
                        <tr>
                            <?php
                            $select = "SELECT * FROM `data` where `money` = 'non'  ORDER BY `status`";
                            $q = mysqli_query($conn, $select);
                            foreach ($q as $data) {
                            ?>
                                <td> <?php echo $data['code'] ?> </td>
                                <td> <?php echo $data['name'] ?> </td>
                                <td> <?php echo $data['council'] ?> </td>
                                <td> <?php echo $data['phone'] ?> </td>
                                
                                <td>
                                    <form method="GET">
                                        <?php if ($data['status'] == "f") : ?>
                                            <a href="index.php?att=<?php echo $data['id']; ?>" class="btn btn-primary"> Attend </a>
                                        <?php else : ?>
                                            <button class="btn btn-info" disabled  > Attend </button>
                                        <?php endif ?>
                                    </form>
                                </td>
                                <td>
                                    <form method="GET">
                                        <?php if ($data['money'] == "paid") : ?>
                                                 <button class="btn btn-info" disabled> Paid </button>
                                        <?php else : ?>
                                            <a href="index.php?pay=<?php echo $data['id']; ?>" class="btn btn-danger"> Unpaid  </a>
                                            <?php endif ?>
                                    </form>
                                </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>





</body>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

</html>
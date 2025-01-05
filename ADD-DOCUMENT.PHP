<?php
// include "ADD-DOCUMENT-PROCCESS.PHP";
// global $disable;
// global $heding1 , $heding2 , $heding3 , $heding4;
require("CONNECTION.PHP");
$disable = false;
$heding1 = "HEADING-1";
$heding2 = "HEADING-2";
$heding3 = "HEADING-3";
$heding4 = "HEADING-4";
$exist = FALSE;
$record_submit = FALSE;
$exist_main = FALSE;
$insert_success = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['user-id1'])) {
        $user_name = $_POST['user-id1'];

        $check_exist_table = $con->query("SHOW TABLES LIKE '$user_name'");
        if ($check_exist_table->num_rows > 0) {
            $query = "SELECT * FROM `$user_name` WHERE sno = 1;";
            $result = mysqli_query($con, $query);
            if ($row = mysqli_fetch_assoc($result)) {

                global $heding1, $heding2, $heding3, $heding4;
                $heding1 = $row["H1"];
                $heding2 = $row["H2"];
                $heding3 = $row["H3"];
                $heding4 = $row["H4"];
                $disable = true;
                //  echo var_dump($row);
            }
        } else {
            # code...
            $exist_main = TRUE;
        }
    } else {
        if (isset($_POST['hed1_insert'])) {
            $h1_insert = $_POST['hed1_insert'];
            $h2_insert = $_POST['hed2_insert'];
            $h3_insert = $_POST['hed3_insert'];
            $h4_insert = $_POST['hed4_insert'];
            $userinsert = $_POST["user-id_insert"];
            $check_exist_tableQ = $con->query("SHOW TABLES LIKE '$userinsert'");
            if ($check_exist_tableQ->num_rows > 0) {
                $query = "INSERT INTO `$userinsert` (`sno`, `H1`, `H2`, `H3`, `H4`) VALUES (NULL, '$h1_insert', '$h2_insert', '$h3_insert', '$h4_insert');";
                $result = mysqli_query($con, $query);
                if ($result) {
                    global $insert_success;
                    $insert_success = true;

                } else {
                    echo "not submit data";
                }
            } else {
                $exist = TRUE;
            }
        }
    }
}


//mysqli_close($con);
?>

<!--INSER DOCUMENT
-->

<?php


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>RECORD CREATER</title>
</head>

<body>
    <div class="navbar-my my-md-1 py-md-3 py-0 sticky-top">
        <div class="container">
            <!--NAVBAR-->
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-md navbar-light h5">
                        <a href="" class="navbar-brand px-md-1 px-2">
                            <img src="image/logo.png" alt="RECORD CREATER" style="height: 60px; width: 60px;">
                        </a>
                        <button class="navbar-toggler " data-bs-toggle="collapse" data-bs-target="#menumy-ADD-DOC"
                            aria-controls="menumy-ADD-DOC" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="menumy-ADD-DOC">
                            <ul class="navbar-nav px-3">
                                <li class="nav-item"><a href="" class="nav-link">HOME</a></li>
                                <li class="nav-item"><a href="ADD-DOC.php" class="nav-link">ADD-DOC</a></li>
                                <li class="nav-item"><a href="" class="nav-link">ABOUT</a></li>
                                <li class="nav-item"><a href="" class="nav-link">CONTECT</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--ALIRT BOX-->
    <div class="alirt-box">
        <?php
        global $exist;
        if ($exist_main) {
            echo '<div class="my-2 alert alert-info alert-dismissible fade show" role="alert">
        <strong>Error...</strong>
        
        USERNAME INCORRECT, PLEASE TRY AGAIN
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        if ($exist) {
            echo '<div class="my-2 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error...</strong>
        
        USERNAME INCORRECT, PLEASE TRY AGAIN
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        if ($insert_success) {
            echo '<div class=" my-2 alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success...</strong> YOUER RECORD SUCCESSFULLY SUBMITED.. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>
    </div>
    <!-- CREATE DOC FORM
    -->
    <div class="create-doc-form">
        <div class="container py-1">
            <div class="row">
                <div class="col">
                    <h1>INSERT RECORDE</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php
                    if (!$disable) {
                        echo '
        <form method="POST" action="" >
                        <div class="form-group py-md-3 px-3 bg-info">
                            <label for="user-id">USER-NAME</label>
                           <div class="input-group">
                            <input type="text" class="form-control "require name="user-id1" id="user-id">
                            <div class="input-group-append"><button class="btn btn-group btn-primary">click</button> </div>
                           </div>
                            <small class="form-text text-muted">ENTER YOUR USERNAME FIRST</small>
                        </div>
        </form>';
                    }
                    ?>
                    <form method="POST" action="">
                        <div class="form-group py-md-3">
                            <label for="user-id">USER-NAME</label>
                            <div class="input-group">
                                <input type="text" class="form-control " <?php if (!$disable) {
                                    echo " disabled ";
                                } ?> require name="user-id_insert" id="user-id">
                            </div>
                            <small class="form-text text-muted">ENTER YOUR USERNAME </small>
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h1"><?php echo "$heding1" ?></label>
                            <input type="text" name="hed1_insert" <?php if (!$disable) {
                                echo " disabled ";
                            } ?>class="form-control" id="h1">
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h2"><?php echo "$heding2" ?></label>
                            <input type="text" name="hed2_insert" id="h2" <?php if (!$disable) {
                                echo " disabled ";
                            } ?> class="form-control">
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h3"><?php echo "$heding3" ?></label>
                            <input type="text" name="hed3_insert" id="h3" <?php if (!$disable) {
                                echo " disabled ";
                            } ?> class="form-control">
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h4"><?php echo "$heding4" ?></label>
                            <input type="text" name="hed4_insert" id="h4" <?php if (!$disable) {
                                echo " disabled ";
                            } ?> class="form-control">
                        </div>
                        <button class="btn btn-outline-danger btn-lg py-md-3 py-1">INSERT RECORDE</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
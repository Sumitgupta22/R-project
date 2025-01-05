<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exist = FALSE;
    $record_submit = FALSE;
    require("CONNECTION.PHP");
    $userid = $_POST['user-id'];
    $hed_1 = $_POST['hed-1'];
    $hed_2 = $_POST['hed-2'];
    $hed_3 = $_POST['hed-3'];
    $hed_4 = $_POST['hed-4'];

    $result = $con->query("SHOW TABLES LIKE '$userid'");
    if ($result->num_rows > 0) {
        $exist = TRUE;
    } else {

        $query = "CREATE TABLE `$database`.`$userid` (`sno` int AUTO_INCREMENT PRIMARY KEY,`H1` TEXT , `H2` TEXT, `H3` TEXT , `H4` TEXT) ENGINE = InnoDB;";
        $DataProsess = mysqli_query($con, $query);

        if ($DataProsess === true) {
            $query_first_row = "INSERT INTO `$userid` (`sno`, `H1`, `H2`, `H3`, `H4`) VALUES (NULL, '$hed_1', '$hed_2', '$hed_3', '$hed_4');";
            $DataProsess1 = mysqli_query($con, $query_first_row);
            if ($DataProsess1 === true) {
                $record_submit = TRUE;
            }

        }

    }
}


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
        global $exist, $record_submit;
        if ($exist) {
            echo '<div class="my-2 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error...</strong>  USERNAME ALREADY EXISTS, PLEASE ENTER ANOTHER USERNAME
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }

        if ($record_submit) {
            echo '<div class=" my-2 alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success...</strong> YOUER USER NAME SUCCESSFULLY SUBMITED AND CREATED HEADING <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                    <h1>HEADINGS FORM</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form method="POST" action=" ">
                        <div class="form-group py-md-3">
                            <label for="user-id">USER-NAME</label>
                            <div class="input-group">
                                <input type="text" class="form-control" require name="user-id" id="user-id">
                                <div class="input-group-append"><span
                                        class="input-group-text">example123@uniqu.rec</span></div>
                            </div>
                            <small class="form-text text-muted">ENTER THE UNIQU USER NAME</small>
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h1">HEADING - 1 </label>
                            <input type="text" name="hed-1" class="form-control" id="h1">
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h2">HEADING - 2 </label>
                            <input type="text" name="hed-2" id="h2" class="form-control">
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h3">HEADING - 3 </label>
                            <input type="text" name="hed-3" id="h3" class="form-control">
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h4">HEADING - 4 </label>
                            <input type="text" name="hed-4" id="h4" class="form-control">
                        </div>
                        <button class="btn btn-outline-success btn-lg py-md-3 py-1">INSERT HEADING</button>
                        <a href="ADD-DOCUMENT.PHP" class="btn btn-outline-danger btn-lg py-md-3 py-1">INSERT
                            RECORDES</a>
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
<?php
include("CONNECTION.PHP");
$NO_SHOW_TABLE = false;



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
    <div class="navbar-my d-print-none py-md-3 py-0 sticky-top">
        <div class="container">
            <!--NAVBAR-->
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-md navbar-light h5">
                        <a href="" class="navbar-brand px-md-1 px-2">
                            <img src="image/logo.png" alt="RECORD CREATER" style="height: 60px; width: 60px;">
                        </a>
                        <button class="navbar-toggler " data-bs-toggle="collapse" data-bs-target="#menumy"
                            aria-controls="menumy" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="menumy">
                            <ul class="navbar-nav px-3">
                                <li class="nav-item"><a href="" class="nav-link disabled">HOME</a></li>
                                <li class="nav-item"><a href="ADD-DOC.php" class="nav-link">ADD-DOC</a></li>
                                <li class="nav-item"><a href="ADD-DOCUMENT.PHP" class="nav-link">INSERT_DOCUMENTS</a>
                                </li>
                                <li class="nav-item"><a href="" class="nav-link">CONTECT</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-3">
        <div class="row">
            <div class="col">
                <form method="POST" action="">
                    <div class="form-group py-md-3 px-3 bg-info">
                        <label for="user-id">USER-NAME</label>
                        <div class="input-group">
                            <input type="text" class="form-control user-iden" require name="display_uid" id="user-id">
                            <div class="input-group-append"><button class="btn btn-group btn-primary ">click</button>
                            </div>
                        </div>
                        <small class="form-text text-muted">ENTER YOUR USERNAME FIRST</small>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <section class="intro">
                    <div class="bg-image h-100" style="background-color: #f5f7fa;">
                        <div class="mask d-flex align-items-center h-100">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <div class="table-responsive table-scroll"
                                                    data-mdb-perfect-scrollbar="true"
                                                    style="position: relative; height: 700px">
                                                    <table class="table table-striped mb-0">

                                                        <?php
                                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                            echo '<a href="PDF.PHP?USERID=' . $_POST['display_uid'] . '" class="btn" >downelod</a>';
                                                            if (isset($_POST["display_uid"])) {
                                                                $user_id = $_POST['display_uid'];
                                                                $check_exist_table = $con->query("SHOW TABLES LIKE '$user_id'");

                                                                if ($check_exist_table->num_rows > 0) {
                                                                    $query = "SELECT * FROM `$user_id`;";
                                                                    $result = mysqli_query($con, $query);
                                                                    $son = 0;
                                                                    //DATA SHOW
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        if ($row['sno'] == 1) {
                                                                            echo " <thead style='background-color: #002d72;'>
                       <tr>
                       <th scope='col'>S. No.</th>
                       <th class ='heading1' scope='col'>" . $row['H1'] . "</th>
                       <th class ='heading2' scope='col'>" . $row['H2'] . "</th>
                       <th class ='heading3' scope='col'>" . $row['H3'] . "</th>
                       <th class ='heading4' scope='col'>" . $row['H4'] . "</th>
                       </tr>
                       </thead>
                        <tbody>
                      ";
                                                                        } else {
                                                                            echo "<tr>
                        <th scope='row'>" . $son . "</th>
                        <td>" . $row['H1'] . "</td>
                        <td>" . $row['H2'] . "</td>
                        <td>" . $row['H3'] . "</td>
                        <td>" . $row['H4'] . "</td>
                        </tr>";
                                                                        }
                                                                        $son = $son + 1;
                                                                    }
                                                                    echo '</tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>';
                                                                } else {
                                                                    $NO_SHOW_TABLE = TRUE;
                                                                    echo '<div class="alert my-3 alert-warning" role="alert">
                                          <h4 class="alert-heading">FAILL !</h4>
                                          <p>INCORRECT USER NAME , PLEASE TRY AGAIN</p>
                                          <hr>
                                          <p class="mb-0">THANKS FOR USE..</p>
                                          </div>';
                                                                }
                                                            }
                                                        }
                                                        ?>

                                                </div>
                                            </div>
                                        </div>
                                        <a href="PDF.PHP?USERID=" class="btn">downelod</a>
</body>

</html>
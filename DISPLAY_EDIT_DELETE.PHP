<?php
include("CONNECTION.PHP");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css"
        integrity="sha384-NvKbDTEnL+A8F/AA5Tc5kmMLSJHUO868P+lDtTpJIeQdGYaUIuLr4lVGOEA1OcMy" crossorigin="anonymous">
    <title>RECORD CREATER</title>
</head>

<body>

    <!-- EDIT modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EDITModal">
        Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="EDITModal" tabindex="-1" aria-labelledby="EDITModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="EDITModalLabel">UPDATE RECORD</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- MODAL FORM -->
                    <form method="POST" action="?update=true">
                        <input type="hidden" name="sno_edit" id="sno_edit">
                        <div class="form-group py-md-3">
                            <label for="user-id">USER-NAME</label>
                            <div class="input-group">
                                <input type="text" required class="form-control " name="user-id_edit" id="user-id">
                            </div>
                            <small class="form-text text-muted">ENTER YOUR USERNAME </small>
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h1" id="eh1">H1</label>
                            <input type="text" name="hed1_edit" class="form-control" id="h1">
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h2" id="eh2">H2</label>
                            <input type="text" name="hed2_edit" id="h2" class="form-control">
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h3" id="eh3">H3</label>
                            <input type="text" name="hed3_edit" id="h3" class="form-control">
                        </div>
                        <div class="form-group py-md-3">
                            <label for="h4" id="eh4">H4</label>
                            <input type="text" name="hed4_edit" id="h4" class="form-control">
                        </div>
                        <!-- <button class="btn btn-outline-danger btn-lg py-md-3 py-1">INSERT RECORDE</button>
-->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn  btn-outline-primary">INSERT RECORDE</button>
                </div>
                </form>
            </div>
        </div>
    </div>

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
    <div class="container d-print-none mt-5">
        <div class="row">
            <div class="col">
                <form method="POST" action="">
                    <div class="form-group py-md-3 px-3 bg-info">
                        <label for="user-id">USER-NAME</label>
                        <div class="input-group">
                            <input type="text" class="form-control user-iden" require name="user-id1" id="user-id">
                            <div class="input-group-append"><button class="btn btn-group btn-primary ">click</button>
                            </div>
                        </div>
                        <small class="form-text text-muted">ENTER YOUR USERNAME FIRST</small>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container table-responsive my-3">
        <div class="row">
            <div class="col">
                <table class="table" id="myTable">

                    <?php
                    // echo $_POST['sno_edit'];
                    //echo $_POST['update'];
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST["sno_edit"])) {
                            $user_id = $_POST['user-id_edit'];
                            $check_exist_table = $con->query("SHOW TABLES LIKE '$user_id'");
                            if ($check_exist_table->num_rows > 0) {
                                $user_id = $_POST['user-id_edit'];
                                $edit_h1 = $_POST['hed1_edit'];
                                $edit_h2 = $_POST['hed2_edit'];
                                $edit_h3 = $_POST['hed3_edit'];
                                $edit_h4 = $_POST['hed4_edit'];
                                $edit_key = $_POST['sno_edit'];

                                $query = "UPDATE `$user_id` SET `H1` =  '$edit_h1' ,`H2` =  '$edit_h2' ,`H3` =  '$edit_h3' , `H4` =  '$edit_h4' WHERE `$user_id`.`sno` = $edit_key;";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    echo '<div class="alert alert-success" role="alert">
                                          <h4 class="alert-heading">SUCCESSFULLY!</h4>
                                          <p>YOUR RECORD SUCCESSFULLY SUBMITED , PLEASE ENTER USER NAME TO USE AGAIN</p>
                                          <hr>
                                          <p class="mb-0">THANKS FOR USE..</p>
                                          </div>';
                                    $SHOW_TABLE = true;
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">
                                          <h4 class="alert-heading">NOT SUCCESSFULLY!</h4>
                                          <p>YOUR RECORD NOT SUCCESSFULLY SUBMITED , PLEASE TRY AGAIN..</p>
                                          <hr>
                                          <p class="mb-0">NOT SUCCESSFULLY SUBMITED..</p>
                                          </div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger" role="alert">
                                      <h4 class="alert-heading">NOT SUCCESSFULLY!</h4>
                                      <p>YOUR RECORD NOT SUCCESSFULLY SUBMITED BECAUSE INCORRECT USER NAME , PLEASE TRY AGAIN..</p>
                                      <hr>
                                      <p class="mb-0">INCORRECT USER NAME..</p>
                                      </div>';
                            }
                        } else {
                            $user_id = $_POST['user-id1'];
                            $check_exist_table = $con->query("SHOW TABLES LIKE '$user_id'");
                            if ($check_exist_table->num_rows > 0) {
                                $query = "SELECT * FROM `$user_id`;";
                                $result = mysqli_query($con, $query);
                                // while ($row = mysqli_fetch_assoc($result)) {
                                //     echo $row["sno"] . $row['H1'] . $row['H2'] . $row['H3'] . $row['H4'] . "\n";
                                // }
                                $son = 0;
                                //DATA SHOW
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['sno'] == 1) {
                                        echo " <thead>
                                       <tr>
                                       <th>S. No.</th>
                                       <th class ='heading1'>" . $row['H1'] . "</th>
                                       <th class ='heading2'>" . $row['H2'] . "</th>
                                       <th class ='heading3'>" . $row['H3'] . "</th>
                                       <th class ='heading4'>" . $row['H4'] . "</th>
                                       <th>ACTION</th>
                                       </tr>
                                       </thead>
                                      ";
                                    } else {
                                        echo "<tr>
                                        <th scope='row'>" . $son . "</th>
                                        <td>" . $row['H1'] . "</td>
                                        <td>" . $row['H2'] . "</td>
                                        <td>" . $row['H3'] . "</td>
                                        <td>" . $row['H4'] . "</td>
                                        <td class='btn-group'><button class='edit active btn btn-info'id='" . $row['sno'] . "'>EDIT</button> <button class='delete btn btn-info'id='d" . $row['sno'] . "'>DELETE</button></td>
                                        </tr>";
                                    }
                                    $son = $son + 1;

                                }
                            } else {
                                echo "-- YOUR USER ID IS INCORRECT --";
                            }
                        }

                    }
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if (isset($_GET['delete'])) {
                            $sno = $_GET['delete'];
                            $USERNAME = $_GET['USERID'];
                            $check_exist_table = $con->query("SHOW TABLES LIKE '$USERNAME'");
                            if ($check_exist_table->num_rows > 0) {
                                $sno = $_GET['delete'];
                                $USERNAME = $_GET['USERID'];
                                $query = "DELETE FROM `$USERNAME` WHERE `$USERNAME`.`sno` = $sno";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    echo '<div class="alert alert-info" role="alert">
                                          <h4 class="alert-heading">SUCCESSFULLY!</h4>
                                          <p>YOUR RECORD SUCCESSFULLY DELETED </p>
                                          <hr>
                                          <p class="mb-0">THANKS FOR USE..</p>
                                          </div>';
                                }
                            } else {
                                echo '<div class="alert alert-warning" role="alert">
                                          <h4 class="alert-heading">FAILL !</h4>
                                          <p>INCORRECT USER NAME , PLEASE TRY AGAIN</p>
                                          <hr>
                                          <p class="mb-0">THANKS FOR USE..</p>
                                          </div>';
                            }
                        } else {

                        }
                    }
                    mysqli_close($con);

                    ?>

                </table>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
    let table = new DataTable('#myTable');
    </script>
    <script>
    edit = document.getElementsByClassName('edit');
    //iden = document.getElementsByClassName('heading');
    Array.from(edit).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ", );
            tr = e.target.parentNode.parentNode;
            H1 = tr.getElementsByTagName("td")[0].innerText;
            H2 = tr.getElementsByTagName("td")[1].innerText;
            H3 = tr.getElementsByTagName("td")[2].innerText;
            H4 = tr.getElementsByTagName("td")[3].innerText;
            EH1 = document.getElementsByClassName('heading1')[0].innerText;
            EH2 = document.getElementsByClassName('heading2')[0].innerText;
            EH3 = document.getElementsByClassName('heading3')[0].innerText;
            EH4 = document.getElementsByClassName('heading4')[0].innerText;
            h1.value = H1;
            h2.value = H2;
            h3.value = H3;
            h4.value = H4;
            eh1.innerText = EH1;
            eh2.innerText = EH2;
            eh3.innerText = EH3;
            eh4.innerText = EH4;
            sno_edit.value = e.target.id;
            //console.log(EH1, EH2, EH3, EH4);
            console.log(e.target.id);
            $('#EDITModal').modal('toggle');

        })
    })
    delete_Record = document.getElementsByClassName('delete');
    Array.from(delete_Record).forEach((element) => {
        element.addEventListener("click", (e) => {
            // console.log("delete_Record ", );
            tr = e.target.parentNode.parentNode;
            DEL = e.target.id.substr(1, );
            uid = prompt("ENTER THE YOUR USER ID");
            if (confirm("ARE YOU SURE YOU WANT TO DELETE THIS NOTE ! ")) {
                window.location =
                    `/project_for_clg/R PROJECT/DISPLAY_EDIT_DELETE.PHP?delete=${DEL}&USERID=${uid}`;
            } else {

            }
        })
    })
    </script>
</body>

</html>
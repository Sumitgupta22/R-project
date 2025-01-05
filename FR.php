<?php

?>
<?php

/*
$insert=false;
//echo $_SERVER["REQUEST_METHOD"];
//INSERT INTO `collection` (`sno`, `title`, `description`, `time/date`) VALUES ('2', 'intro', 'i am kishan', current_timestamp());

$sname="localhost";

$uname="id21826698_sumitgupta132";

$password="AIO91@Hs";

$database="id21826698_aioh";



$con = mysqli_connect($sname,$uname,$password,$database);
//echo $con;
if(!$con){

    dei("sorry not connect database".mysqli_connect_error());



}
//echo $_SERVER["REQUEST_METHOD"];

if ($_SERVER["REQUEST_METHOD"]=="POST"){

try{    $title= $_POST["title"];

    $desc =$_POST["desc"];

   //   $sql = "INSERT INTO `$tablename` (`title`,`description`) VALUES ($title,$desc);";

    //$sql = "CREATE TABLE collection(
    //          son int NOT NULL AUTO_INCREMENT,
    //              title varchar(50),
    //              description text(1000),
     //             timedate datetime DEFAULT CURRENT_TIMESTAMP,
    //              PRIMARY KEY(son)
   //           );";
    $sql = "INSERT INTO `$tablename` (`sno`, `title`, `description`, `timedate`) VALUES (NULL, '$title ','$desc', current_timestamp());";
   
    $result = mysqli_query($con,$sql);
}catch (mysqli_sql_exception $e) { 
   //   var_dump($e);
   echo "<script>alert('Server issue');</script>";
   echo "<script>window.open('Form.php','_self') </script>";
   
      exit; 
   } 
    if($result){
       // echo  header("refresh: 3"); 
       // echo'<div class="alert ale-info" role="alert">
     //     record has been successfully 
//</div>';
    $insert=true;
  
    }

    else{

        echo"the record has been not successfully <br>";

        mysqli_error($con);

    }



}
*/



?>


<!doctype html>

<html lang="en">

<head>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .callout {
        position: fixed;
        bottom: 35px;
        right: 20px;
        margin-left: 20px;
        max-width: 300px;
    }

    .callout-header {
        padding: 25px 15px;
        background: #555;
        font-size: 30px;
        color: white;
    }

    .callout-container {
        padding: 15px;
        background-color: #ccc;
        color: black
    }

    .closebtn {
        position: absolute;
        top: 5px;
        right: 15px;
        color: white;
        font-size: 30px;
        cursor: pointer;
    }

    .closebtn:hover {
        color: lightgrey;
    }
    </style>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AIO Helper By Sumit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Edit modal -->
    <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Editmodal">
Edit Modal
</button>
-->
    <!--Edit modal-->
    <div class="modal fade" id="Editmodal" tabindex="-1" aria-labelledby="EditmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="EditmodalLabel">Edit This Note</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!--  <form  method="post" action="\CRUD\index1.php">

<div class="mb-3">

  <label for="title" class="form-label">Note Title</label>

  <input type="text" name="titleedit" class="form-control" id="titleedit" aria-describedby="emailHelp">

 



<div class="mb-3">

<label for="desc" class="form-label">Note Description</label>

<textarea class="form-control" id="descedit" name="descedit" rows="3"></textarea>

</div>

<button type="submit" class="btn btn-primary">Add Note</button>

</form>-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <?php

    if ($error) {
        echo '<div class="my-2 alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error...</strong>Please You Fill All Section
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <?php
    if ($insert) {
        echo '<div class=" my-2 alert alert-success alert-dismissible fade show" role="alert">
<strong>Success...</strong>Your Note Hasbeen Submited Successfully
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if ($key3) {
        echo '<div class=" my-2 alert alert-success alert-dismissible fade show" role="alert">
<strong>Success...</strong>Your have Login Successfully
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>




    <!--navebar-->

    <nav class="navbar navbar-expand-lg bg-body-tertiary ">

        <div class="container-fluid">

            <a class="navbar-brand" href="#"><b>AIOS Helper</b></a>

            <a href="Signup.html">

                <button class="btn btn-primary" type="button">Sign Up</button>

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Form.php">Form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Signup.html">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login.html">Login</a>
                    </li>
                </ul>

            </div>

        </div>

    </nav>

    <div class="container my-3">

        <h2>Add A Note</h2>


        <form action="Formpro.php" method="POST">
            <div class="mb-3">

                <label for="title" class="form-label">Note Title</label>

                <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" required>





                <div class="mb-3">

                    <label for="desc" class="form-label">Note Description</label>

                    <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>

                </div>

                <button type="submit" class="btn btn-primary">Add Note</button>

        </form>

    </div>

    <div class="container">



        <table class="table" id="myTable">

            <thead>

                <tr>

                    <th scope="col">S.No</th>

                    <th scope="col">Title</th>

                    <th scope="col">Description</th>

                    <th scope="col">Actions</th>

                </tr>

            </thead>

            <tbody>
                <tr>

                    <th scope='row'>hee</th>

                    <td>skfdoi</td>

                    <td>udof</td>

                    <td><button class="edit btn btn-sm btn-primary">Edit</button> <a href="/del">Edit</a></td>
                </tr>
                <tr>

                    <th scope='row'>hee</th>

                    <td>skfdgdfdoi</td>

                    <td>udof</td>

                    <td><button class="edit btn btn-sm btn-primary">Edit</button> <a href="/del">Edit</a></td>
                </tr>
                <tr>

                    <th scope='row'>hee</th>

                    <td>skfdddfoi</td>

                    <td>udof</td>

                    <td><button class="edit btn btn-sm btn-primary">Edit</button> <a href="/del">Edit</a></td>
                </tr>
                <tr>

                    <th scope='row'>hee</th>

                    <td>skfdfksadoi</td>

                    <td>udof</td>

                    <td><button class="edit btn btn-sm btn-primary">Edit</button> <a href="/del">Edit</a></td>
                </tr>




            </tbody>

        </table>

    </div>
    <hr>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
    /*$(document).ready( function () {
                              $('#myTable').DataTable();
                            });*/
    let table = new DataTable('#myTable');
    </script>
    <script>
    let edit = document.getElementsByClassName('edit');
    Array.from(edit).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ", );
            tr = e.target.parentNode.parentNode;
            title = tr.getElementsByTagName("td")[0].innerText;
            desc = tr.getElementsByTagName("td")[1].innerText;
            console.log(title, desc);
            // descedit.value = desc;
            // titleedit.value = title;
        })
    })
    </script>

</body>

</html>
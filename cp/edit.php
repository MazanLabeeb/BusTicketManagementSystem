<?php
$updated = false;

include "../config.php";
session_start();
    if(isset($_SESSION["id"])){
       
    }else{
        header('location:login.php');
    }

    $user =$_SESSION["id"] ;
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $ticketid = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM `tickets` WHERE `id` = {$ticketid} AND `user` LIKE '{$_SESSION["id"]}'";

    if ($result = mysqli_query($conn, $sql)) {
        $row = mysqli_fetch_assoc($result);
        $from_ =  $row['from_'];
        $id =  $row['id'];
        $to_ =  $row['to_'];
        $departure_ =  $row['departure'];
        $return_ =  $row['return_'];
        $class =  $row['class'];
    }

    mysqli_close($conn);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $from_2 = mysqli_real_escape_string($conn, $_POST['from_']);
    $id_2 = mysqli_real_escape_string($conn, $_POST['id_']);
    $to_2 = mysqli_real_escape_string($conn, $_POST['to_']);
    $departure2 = mysqli_real_escape_string($conn, $_POST['departure']);
    $return_2 = mysqli_real_escape_string($conn,  $_POST['return_']);
    $class2 = mysqli_real_escape_string($conn, $_POST['class']);

    $sqlL = "UPDATE `tickets` SET `from_` = '{$from_2}', `to_` = '{$to_2}', `departure` = '{$departure2}', `return_` = '{$return_2}', `class` = '{$class2}' WHERE `tickets`.`id` = {$id_2};";

    if ($result = mysqli_query($conn, $sqlL)) {
        $updated = true;
        if($updated){
            echo "Records Updated! <a href='./tickets.php'>Go Back</a> ";
            exit();
        }
    }

    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modify your Ticket</title>

    <!-- Custom fonts for this template-->
    <link href="./css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Panel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tickets
            </div>
            <!-- Nav Item - Charts -->
            
            <li class="nav-item">
                <a class="nav-link" href="order.php">
                    <i class="fas fa-fw fa-list-ul"></i>
                    <span>Buy a new Ticket</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tickets.php">
                    <i class="fas fa-fw fa-list-ul"></i>
                    <span>Your Tickets</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-solid fa-user-xmark"></i>
                    <span>Logout</span></a>
            </li>






        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <b  style="padding-top:15px"> <a class="text-danger" href="../index.html">HomePage</a></b>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Modify your ticket</h1>
                    </div>
                    <?php
                        if($updated){ ?>
                            <h1 class="text-success">Ticket details updated</h1><?php 
                        }
                    ?>

                    <!-- Content Row -->
                    <div class="row">
                    <div class="col-md-9 col-md-offset-1">
                    <section id="first-tab-group" class="tabgroup">
                        <div id="tab1" style="display: block;">
                            <div class="submit-form">
                                <form id="form-submit" action="edit.php?id=<?php echo $id; ?>" method="post">
                                    <table>
                                        <body>
                                            <input type="hidden" name="id_" value="<?php echo $id; ?>">
                                            <tr>
                                                <td><label for="from">From:</label></td>
                                                <td><fieldset>
                                                
                                                <select required="" name="from_" onchange="this.form.()">
                                                    <option value="">Select a location...</option>
                                                    
                                                    <option value="<?php
                                                    echo $from_;
                                                    ?>" selected><?php
                                                        echo $from_;
                                                    ?></option>
                                                    <option value="Lahore">Lahore</option>
                                                    <option value="Karachi">Karachi</option>
                                                    <option value="Multan">Multan</option>
                                                    <option value="Bhawalpur">Bhawalpur</option>
                                                    <option value="Ghotki">Ghotki</option>
                                                    <option value="Islamabad">Islamabad</option>
                                                    <option value="Hyderabad">Hyderabad</option>
                                                    <option value="Sukkur">Sukkur</option>
                                                    <option value="Muree">Muree</option>
                                                    <option value="Gilgit">Gilgit</option>
                                                </select>
                                            </fieldset></td>
                                            </tr>
                                            <tr>
                                               
                                                <td> <label for="to">To:</label></td>
                                                <td>  <fieldset>
                                                <select required="" name="to_" onchange="this.form.()">
                                                    <option value="">Select a location...</option>
                                                    <option value="<?php
                                                    echo $to_;
                                                    ?>" selected><?php
                                                        echo $to_;
                                                    ?></option>
                                                    <option value="Lahore">Lahore</option>
                                                    <option value="Karachi">Karachi</option>
                                                    <option value="Multan">Multan</option>
                                                    <option value="Bhawalpur">Bhawalpur</option>
                                                    <option value="Ghotki">Ghotki</option>
                                                    <option value="Islamabad">Islamabad</option>
                                                    <option value="Hyderabad">Hyderabad</option>
                                                    <option value="Sukkur">Sukkur</option>
                                                    <option value="Muree">Muree</option>
                                                    <option value="Gilgit">Gilgit</option>
                                                </select>
                                            </fieldset></td>
                                            </tr>
                                            <tr>
                                                <td><label for="departure">Departure date:</label></td>
                                                <td><input type="date"  name="departure" id="departure"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="return">Return date:</label></td>
                                                <td><input type="date"  name="return_" id="return"></td>
                                            </tr>
                                            <tr>
                                                <td>Class:</td>
                                                <td>        <label for="premium">Premium</label>
                                                        <input type="radio"<?php
                                                            if($class == "premium") echo "checked";
                                                            
                                                        ?> name="class" id="premium" value="premium" required="required" onchange="this.form.()">
                                                        <label for="business">Business</label>
                                                        <input type="radio" <?php
                                                            
                                                            if($class == "business") echo "checked";
                                                        ?> name="class" id="business" value="business" required="required" onchange="this.form.()">
                                                      </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><fieldset>
                                                <button type="submit" id="form-submit" class="btn btn-sm btn-danger">Update details</button>
                                            </fieldset></td>
                                            </tr>
                                        </body>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            
                    </div>


                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white mt-5">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy;  2022 Bus Online Ticket and Travel Company</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>

<?php  
    $date = $departure_; 
    //converts date and time to seconds  
    $sec = strtotime($date);  
    //converts seconds into a specific format  
    $newdate = date ("Y-m-d", $sec); 
    echo $newdate;

    ?>
<script>
    function myFunction() {
  document.getElementById("departure").defaultValue = "<?php echo $newdate; ?>";
}myFunction();

<?php  
    $date = $return_;
    //converts date and time to seconds  
    $sec = strtotime($date);  
    //converts seconds into a specific format  
    $newdate =  date ("Y-m-d", $sec); 
   

    ?>
function myFunction2() {
  document.getElementById("return").defaultValue = "<?php echo $newdate; ?>";
}myFunction2();
</script>

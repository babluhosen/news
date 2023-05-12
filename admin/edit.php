<?php

include "../admin/lib/connection.php";
//update data //
if(isset($_POST['C_Update'])){
    $names=$_POST['uName'];
    $icons=$_POST['uIcon'];
    $uID=$_POST['upadeid'];
   $update=" UPDATE tbl_category SET name='$names', icon='$icons' WHERE id=$uID";
   if($conn->query($update)){
   header("location:category.php");
   }else{
    die($conn->error);
   }
}


//select data from edit // this is code//
if(isset($_GET['id'])){
$edit=$_GET['id'];
//select query//
$selectquery="SELECT * FROM tbl_category WHERE id=$edit";
$data=$conn->query($selectquery);
if($data->num_rows>0){
 
 while($varfinal=$data->fetch_assoc()){    //while looping kore arry fetch kore repaing hmtl code breaket close

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>News Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/admin.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="admin.php">Admin Panel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!--<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>-->
            <!-- Navbar-->
            <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Pages</div>
                            <a class="nav-link" href="news.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Category Edit
                            </a>
                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                          
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged Admin </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Category</h1>
                        <ol class="breadcrumb mb-4">
                            <li  class="breadcrumb-item"><a style="color:green;" href="admin.php">Dashboard</a></li>
                            <li style="color: red;" class="breadcrumb-item active">Edit</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">

                             <form  action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
                                <div class="container">                                  
                                 <div class="row ">
                               
                                     <input type="hidden" name="upadeid" id="upadeid" value="<?php echo $varfinal['id']; ?>" >
                                    <div class="col-lg-4">
                                      <label for="n_title" class="form-label">Name</label>
                                       <input value="<?php echo $varfinal['name']; ?>" type="text" name="uName" id="uName" class="form-control" required>
                                    </div>
                                    <div class="col-lg-4">
                                      <label for="n_icon" class="form-label">Icon</label>
                                       <input type="text" value="<?php echo $varfinal['icon']; ?>" name="uIcon" id="uIcon" class="form-control" required>
                                    </div>

                                   </div>
                              
                                          <div class="col-lg-2 mt-3">
                                            <button type="submit" name="C_Update" class="btn-cols form-control" id="liveAlertBtn">Update</button>
                                        </div>

                              </form> 
                                     
       
      

       <a href="category.php" class="btn btn-success bt mt-4 btn-sm" style="border-radius: 20px" title="Category Page"><i class="fas fa-plus"></i></a>
        </div>
 
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a style="text-decoration: none;" href="#">Privacy Policy</a>
                                &middot;
                                <a style="text-decoration: none;" href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

    <!-- Button trigger modal -->


          <script src="js/jquery-3.6.0.min.js"></script>
         <script src="js/angular.min.js"></script>
          <script src="js/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

        <!--form reesubmit script-->
        <script type="text/javascript">
             if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
         }
         // alert message //
          const alertTrigger = document.getElementById('liveAlertBtn')
             if (alertTrigger) {
             alertTrigger.addEventListener('click', () => {
            alert('OK Ready to insert', 'success')
         });
        }

       
        
        </script>
    </body>
</html>
<?php

} //while looping brekated end

} //num_rows condition } repaking if end//
else{
  header("location:category.php");//return to category
}

}else{
header("location:category.php");
}

 ?>

<?php



include "../admin/lib/connection.php";






if(isset($_POST['c_submit'])){
    $names=$_POST['C_name'];
    $icons=$_POST['C_icon'];
   $category_insert="INSERT INTO tbl_category(name, icon) VALUES ('$names','$icons')";
   if($conn->query($category_insert)){
   //alart message and replace //
    //echo "data succuss";
   }else{
    die($conn->error);
   }
}

$selector="SELECT * FROM tbl_category";
$squery=$conn->query($selector);
//echo $squery->num_rows;
//search filter all data from table


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Category Admin</title>
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
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
                            <a class="nav-link" href="category.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Category
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
                            <li style="color: red;" class="breadcrumb-item active">Category</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">

                                  <!--<h4 class="mb-4 text-center">Category Form</h4>-->

                                 <form  action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
                                   <div class="row justify-content-center">
                                    <div class="col-lg-4">
                                      <label for="C_name" class="form-label">Category Name</label>
                                       <input type="text" name="C_name" id="C_name" class="form-control" required>
                                    </div>
                                     <div class="col-lg-4">
                                      <label for="C_icon" class="form-label">Category Icon</label>
                                       <input type="text" name="C_icon" id="C_icon" class="form-control C_icon"  required>
                                        <!-- <button type="submit" name="c_submit" class="btn btn-primary">submit</button>-->
                                    </div>
                                    <!--dropdown category-->
                                   
                                   </div>
                                 <div class="mt-3 row justify-content-center ">
                                    <div class="col-lg-8 ">
                                        <button type="submit" name="c_submit" class="btn-cols form-control" id="liveAlertBtn">Submit</button>
                                    </div>
                                 </div>
                               </form> 
                         </div>
                           
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                            <div class="input-group">
                               <div class="input-group-prepend">
                                <button ng-click="" class="input-group-text text-white" style="background-color: #264653" id="" title="Advance Filter"><i class="fas fa-filter"></i></button>
                                 </div>
                                <input type="text" placeholder="Search Table"  ng-model="" class="form-control form-control-sm">
                               </div>
                            </div>
                            <div class="card-body">
                                <!--<table id="datatablesSimple">-->
                                   
                     <table class="datatable table table-bordered table-white table-striped" style="width: 100% !important; ">
                <thead>

                    <tr>
                        <th class="control-lable text-center align-middle" style="width: 5% !important;">ID</th>
                        <th class="control-lable text-center align-middle" style="width: 5% !important;">Category Name</th>
                        <th class="control-lable text-center align-middle" style="width: 5% !important;">Category Icon</th>
                        <th class="control-lable text-center align-middle" style="width: 5% !important;">Action</th>
                    </tr>
                   
                </thead>
                <tbody>
                   <?php 
                   if($squery->num_rows>0){?>
                     <?php while ($final=$squery->fetch_assoc()){?>
                     
                    <tr >
                        <td class="text-center align-middle p-0"><?php echo $final['id'];?></td>
                        <td class="text-center align-middle p-0"><?php echo $final['name'];?></td>
                        <td class="text-center align-middle p-0"><?php echo $final['icon'];?></td>
                         <td>
                          <a class="editbtn text-info" style="text-decoration: none;" title="Edit"href="edit.php?id=<?php echo $final['id']; ?>"><i class="fas fa-edit"></i>&nbsp;Edit</a>&nbsp;
                             <a class=" text-danger" style="text-decoration: none;" href="c_delete.php?id=<?php echo $final['id']; ?>"  title="Delete"><i class="fas fa-trash"></i> &nbsp;Delete</a>&nbsp;
                              <a target="_blank" class=" text-success" style="text-decoration: none;" href="" title="Update"><i class="fas fa-refresh"></i>&nbsp;Update</a>
                         </td>
             
                    </tr>
                <?php }?>
            <?php }else{?>
                 <tr>
                     <td colspan="4" >
                         Not found data
                     </td>
                 </tr>

                 <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
        <button type="button" class="btn-close btn btn-outline-danger text-black-50 btn-circle btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    <form action="edit.php" method="POST">
      <div class="modal-body">
          <input type="hidden" name="upadeid" id="upadeid">
     
            <div class="">
             <label for="name"  class="form-label">Name</label>
            <input type="text" name="uname" id="uname" class="form-control">
            </div>
              <div class="mt-3">
             <label for="icon" class="form-label">Icon</label>
            <input type="text" name="uicon" id="uicon" class="form-control">
           </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="updatedata" class="btn btn-success btn-sm "> Save </button>
      </div>
   </form>
    </div>
  </div>
  </div>
    </div>
    <!--modal category-->
    <!-- Modal -->
 <!-- Modal -->
 
    <!--modal category-->
</div>

    <!--<a href="edit.php" class="btn btn-success bt mt-4" style="border-radius: 20px" title="news Page"><i class="fas fa-plus"></i></a>-->
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



          <script src="js/jquery-3.6.0.min.js"></script>
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
            alert('Nice, your data  message!', 'success')
         });
        }
        //
        
       
        // modal show data //
       //$(document).ready(function(){
           // $('.editbtn').on('click', function(){
              //$('#editmodal').modal('show');
             // $tr=$(this).closest('tr');
              // var data = $tr.children("td").map(function(){
                  // return $(this).text();
              //  }).get();
               // console.log(data);
              //$('#upadeid').val(data[0]);
                // $('#uname').val(data[1]);
                  // $('#uicon').val(data[2]);
          //  });
      //  });
        
        </script>
    </body>
</html>

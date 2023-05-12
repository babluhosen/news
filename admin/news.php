<?php
include "../admin/lib/connection.php";

if(isset($_POST['n_submit'])){

    $title=$_POST['n_title'];
    $icons=$_POST['n_icon'];
    $dess=$_POST['n_dess'];
    $pass=md5($_POST['n_pass']);
    $cpass=md5($_POST['n_cpass']);
    $cid=$_POST['n_id'];

    if($pass==$cpass){



        $ninsert=" INSERT INTO tble_news( title, icon, descrip, pass, c_id) VALUES ('$title', '$icons', '$dess', '$pass', $cid)";
           if($conn->query($ninsert)){
             echo "password match";
           }else{
           die($conn->error);
           }
         }
         else{
            echo "password does not match";
         }

      }

$selector="SELECT * FROM tble_news ;";
$squery=$conn->query($selector);
//echo $squery->num_rows;
//search filter all data from table
//$dopwnsele="SELECT id from tble_news "
//try{
  //  $dp=$conn->prepare($dopwnsele);
   // $dp->execute();
   // $result=$dp->fetchAll();

//}
//catch(Exception $ex){
///echo ($ex->getMessage());

//}

//dropdown //
$dp_sql="SELECT tbl_category.name FROM tbl_category";
$dc_sql=$conn->query($dp_sql);

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
                                News
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
                        <h1 class="mt-4">News</h1>
                        <ol class="breadcrumb mb-4">
                            <li  class="breadcrumb-item"><a style="color:green;" href="admin.php">Dashboard</a></li>
                            <li style="color: red;" class="breadcrumb-item active">News</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">

                                  <!--<h4 class="mb-4 text-center">Category Form</h4>-->

                             <form  action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
                                <div class="container">                                  
                                 <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                    <div class="col-lg-4">
                                      <label for="n_title" class="form-label">Title</label>
                                       <input type="text" name="n_title" id="n_title" class="form-control" required>
                                    </div>
                                  <div class="col-lg-4">
                                      <label for="n_icon" class="form-label">icon</label>
                                       <input type="text" name="n_icon" id="n_icon" class="form-control" required>
                                    </div>
                                    <!--dropdown category-->
                                
                                        
                                           
                                    <div class=" col-lg-4">
                                        <label for="" class="form-lable mb-2">Cagetory</label>
                                        <div class="input-group">
                                         
                                         <select name="n_id" id="n_id" class="form-control">
                                          <option selected>Select A Category</option>
                                             <?php 
                                             if($dc_sql->num_rows>0)
                                              {?>
                                               <?php while ($c_final=$dc_sql->fetch_assoc())
                                               {?>

                                                <option><?php echo $c_final['name'];?></option>

                                              <?php }?>
                                               <?php }?>
                                           
                                         </select>
                                       
                                         <div class="input-group-append mt-1">
                                          <button type="submit" name="" class="btn btn-sm btn-info  btn-input-group-add editbtn" style="border-radius: 20px" title="Add category"><i class="fas fa-plus"></i></button>
                                      </div>
                                        </div>

                                  </div>
                            

                                     <div class="col-lg-6 mt-3">
                                      <label for="n_pass" class="form-label">Password</label>
                                       <input type="Password" name="n_pass" id="n_pass" class="form-control" required>
                                    </div>
                                     <div class="col-lg-6 mt-3">
                                      <label for="n_cpass" class="form-label">Confirm Password</label>
                                       <input type="password" name="n_cpass" id="n_cpass" class="form-control" required>
                                    </div>
                                     </div>
                            </div>
                                 <div class="col-lg-4">

                                 <div class="col-lg-10 mb-3">
                                     <label for="n_dess" class="form-label">Description</label>
                                       <textarea type="text" name="n_dess" id="n_dess" class="form-control"required rows="5" cols="5" >
                                      </textarea> 
                                     <!-- <button type="submit" name="c_submit" class="btn btn-primary">submit</button>-->
                                     
                                 </div>
                            </div>
                              
                                          <div class="col-lg-2 mb-3">
                                            <button type="submit" name="n_submit" class="btn-cols form-control" id="liveAlertBtn">Submit</button>
                                        </div>
                                         </div>

      
                </form> 

                <!--modal category dropdown-->
                              <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                                    <button type="button" class="btn-close btn btn-outline-danger text-black-50 btn-circle btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>

                                <form action="category.php" method="POST">
                                  <div class="modal-body">
                              
                                        <div class="">
                                         <label for="name"  class="form-label">Name</label>
                                        <input type="text" name="C_name" id="C_name" class="form-control">
                                        </div>
                                          <div class="mt-3">
                                         <label for="icon" class="form-label">Icon</label>
                                        <input type="text" name="C_icon" id="C_icon" class="form-control">
                                       </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="c_submit" class="btn btn-success btn-sm "> Save </button>
                                  </div>
                               </form>
                                </div>
                              </div>
                              </div>
                                </div>
                               
                <!--modal category dropdown-->
                           
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
                                <!--<table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                            <td>2012/08/06</td>
                                            <td>$137,500</td>
                                        </tr>
                                        <tr>
                                            <td>Rhona Davidson</td>
                       
                              
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>-->
                     <table class="datatable table table-bordered table-white table-striped" style="width: 100% !important;">
                <thead>

                    <tr>
                        <th class="control-lable text-center align-middle" style="width: 5% !important;">Title</th>
                        <th class="control-lable text-center align-middle" style="width: 5% !important;">Icon</th>
                        <th class="control-lable text-center align-middle" style="width: 15% !important;">Description</th>
                        <th class="control-lable text-center align-middle  d-none" style="width: 5% !important;">Category Name</th>
                        <th class="control-lable text-center align-middle " style="width: 5% !important;">Action</th>
                    </tr>
                  
                </thead>
                <tbody>
                   <?php 
                   if($squery->num_rows>0){?>
                     <?php while ($final=$squery->fetch_assoc()){?>
                     
                     
                    <tr >

                        <td class="text-center align-middle p-0"><?php echo $final['title'];?></td>
                        <td class="text-center align-middle p-0"><?php echo $final['icon'];?></td>
                        <td class="text-center align-middle p-0"><?php echo $final['descrip'];?></td>
           
                                    <td class="text-center align-middle p-0 d-none" >  </td>
  
                         <td>
                          <a class="editbtn text-info " style="text-decoration: none;" title="Edit" href="n_edit.php?id=<?php echo $final['id']; ?>"><i class="fas fa-edit"></i>&nbsp;Edit</a>&nbsp;
                             <a class=" text-danger" style="text-decoration: none;" href="nDelete.php?id=<?php echo $final['id']; ?>" ng-click="" title="Delete"><i class="fas fa-trash"></i> &nbsp;Delete</a>&nbsp;
                              <a target="_blank" class=" text-success d-none" style="text-decoration: none;" href="" title="Update"><i class="fas fa-refresh"></i>&nbsp;Update</a>
                         </td>
                       <!-- <td class="text-center align-middle p-0">
                            
                            <div class="dropdown">
                                <button class="btn btn-sm w-100 btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton" style="">
                                    <a class="dropdown-item text-info" title="Edit " href="" target="_blank"><i class="fas fa-edit"></i>&nbsp;Edit</a>
                                    <a class="dropdown-item text-danger" href="#" ng-click="" title="Delete"><i class="fas fa-trash"></i>&nbsp;Delete</a>
                                    <a target="_blank" class="dropdown-item text-primary" href="" title="View"><i class="fas fa-eye"></i>&nbsp;View</a>
                                    <a target="_blank" class="dropdown-item text-success" href="" title="Print"><i class="fas fa-print"></i>&nbsp;Print</a>
                                </div>
                            </div>
                        </td>-->
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
       

       <a href="n_edit.php" class="btn btn-success bt mt-4 btn-sm" style="border-radius: 20px" title="News Edit "><i class="fas fa-plus"></i></a>
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
            alert('Nice, your data  message!', 'success')
         });
        }
        //
       //selector dropdown ///
      $(document).ready(function(){
         $('.editbtn').on('click', function(){
            $('#editmodal').modal('show');
              $tr=$(this).closest('tr');
               var data = $tr.children("td").map(function(){
                 return $(this).text();
              }).get();
             console.log(data);
              $('#upadeid').val(data[0]);
                 $('#uName').val(data[1]);
                   $('#uIcon').val(data[2]);
                     

           });
          });

       
        
        </script>
    </body>
</html>

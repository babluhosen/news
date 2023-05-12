<?php
include "../admin/lib/connection.php";
session_start();
//if auttor true hoi tahole r login page thakte dibe na redirect korbe admin e //
if(isset($_SESSION['auth']))
  {
    if($_SESSION['auth']==1)
    {
        header("location:admin.php");
    }
}else
{
  if(isset($_COOKIE['cookiesauth']))
  {
    if($_COOKIE['cookiesauth']==true)
    {
      header("location:admin.php");
    }
  }
}

if(isset($_POST['login_btn'])){

   $usern=$_POST['username'];
    $lpass=md5($_POST['password']);
     $rem_me=isset($_POST['remember-me'])?1:0; //condition if click kore rembemre me tahole data cookies save hobe jodi check dei tahole 1 hbe or na dei tahole 0 hobe //
     //daynamic user and password set//
     $loginuser="SELECT * FROM register WHERE email='$usern' AND password='$lpass' ";
     $userquery=$conn->query($loginuser);
    
     if($userquery->num_rows>0) //user and pass equal hoy tahole that will be login //
      {
         $_SESSION['auth']=1;
         if($rem_me==1)
         {
          setcookie('cookiesauth', true, time()+(60*60*24*10),'/' );
         }
        header("location:admin.php");  //jodi equal hoi tahole redirect to action home page//
      }else{
        echo "<script> alert('Invaild Data'); </script>";

      }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login </title>
         <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/admin.css" rel="stylesheet" />
         <link href="css/login.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed" >

      <div id="login">
       <!-- <h3 class="text-center text-white pt-5">Login form</h3>-->
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="" class="form login-forms " action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group pc">
                             
                                <label for="username" class="text-info mb-0">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control" required>

                            </div>
                            <div class="form-group pass_show pc">
                                <label for="password" class="text-info mb-0">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input  type="submit" name="login_btn" class="btn btn-info btn-md bg-gurdian" value="Sign In">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="register.php" class="text-info ">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </form>

    
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
     <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
          <script src="js/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <!--form reesubmit script-->
        <!--login form validation-->
        <script type="text/javascript">
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
         }

        $(document).ready(function() {
                $("#basic-form").validate({
                  rules: {
                    username : {
                      required: true,
                      minlength: 3
                    },
                     password : {
                      required: true,
                      minlength: 3
                    },
                  },
                  messages : {
                    username: {
                      minlength: "Name should be at least 3 characters"
                    },
                  password: {
                      minlength: "Name should be at least 3 characters"
                    },
                
                  }
                });
              });
      
      //pasword show and hide //      
$(document).ready(function(){
$('.pass_show').append('<span class="ptxt">Show</span>');  
});
  

$(document).on('click','.pass_show .ptxt', function(){ 

$(this).text($(this).text() == "Show" ? "Hide" : "Show"); 

$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 

});  
             
       </script>

    </body>
</html>

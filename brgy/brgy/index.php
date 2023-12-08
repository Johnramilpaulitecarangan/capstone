<?php 

    include_once("connections/connection.php");

    $con = connection();

      if(isset($_POST['login'])){

            $username = $_POST['username'];
            $password = $_POST['password'];
            $username = mysqli_real_escape_string($con,$username);
            $password = mysqli_real_escape_string($con,$password);
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password='$password'";    
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc(); 
    $total = $user->num_rows; 
    $_SESSION['Name'] = $row['name'];
    if($total == 1){
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Password'] = $row['password'];



        echo header("location: admin/dashboard.php");
    }
    else{

        echo '<script>alert("Incorrect Username or Password!")</script>';
        echo'<script>window.location.href = "index.php"</script>';
    }

    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equive="X-UA-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Admin Login form</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 
    <script src="js/showpassword.js"></script>
       
  </head>
  <body>
  

  <style>
  
  
  body{
    background: lightseagreen;
}
.container{

background: transparent;
top: 50%;
left: 50%;
position:absolute;
transform: translate(-50%, -50%);
border-radius: 50px;
color: black;
max-width: 955px;


}
.row{
background:white;
border-radius: 30px;
box-shadow: 8px 8px 50px #000;
}
img{
border-top-left-radius: 30px;
border-bottom-left-radius: 30px;

}
input[type=text], input[type=password]{

border: none;
border-bottom: 2px solid black;

}
input[type=submit]{
font-size: 14px;
text-decoration: none;
color: rgb(248, 248, 246);
opacity: 0.8;
font-weight: bold;
letter-spacing: 1px;
}
.btn1{
border: none;
outline: none;
height: 50px;
width: 100%;
background:blue;
color:white;
border-radius: 4px;
font-weight: bold;
}
.btn1:hover{
background: skyblue;
border: 1px solid;
color: black;
}

a:hover{
color: rgb(0, 0, 0);
opacity: 1;
}
.eye{
position: flex;
}
#hide1{
display: none;
}
.toggleBtn{
position: absolute;
top: 25px;
right:10px;
width: 34px;
height: 34px;
background: none;
border-radius: 50%;
cursor: pointer;
display: flex;
justify-content: center;
align-items: center;
}
.row col{
    padding: 6%;
}

  </style>
    <section class="form">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4">
                    <img src="img/atate.png" class="img-fluid" alt="admin">
                </div>
                <div class="col-lg-7 py-3 ml-5">
                    <h1 class="font-weight-bold">Admin Account</h1>
                    <form action="" method="post">
                        <div class="form-row">
                            <div class="col-lg-7">
                            
                            <input type="text" name="username" placeholder="Enter Username" class="form-control my-3 p-4">
                            </div> 
                        </div>

                        <div class="form-row">
                            <div class="col-lg-7">
                            
                            <input type="Password"  id="password" name="password" placeholder="Enter Password"  class="form-control my-3 p-4" required>
                            <span class="toggleBtn" onclick="myFunction()">
                                <i id="hide1" class="las la-eye"></i>
                                <i id="hide2" class="las la-eye-slash"></i>
                            </span>

                         
                          
                   
                            </div> 
                            
                        </div>

                        <div class="form-row">
                            <div class="col-lg-7">
                           <input type="submit" name="login" class="btn1 mt-3 mb-3" value="Login" required>
                           
                            </div> 
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </section>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
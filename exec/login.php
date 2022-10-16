<?php include("common/header.php");  ?>
<div class="sufee-login d-flex align-content-center flex-wrap">
<?php 
include "common/conn_db.php";
if(isset($_POST['login_submit']))
{
    $user = mysqli_real_escape_string($conn,$_POST['useremail']);
    $password=mysqli_real_escape_string($conn,$_POST['userpwd']); 
    $login_check = mysqli_query($conn,"select * from users where email='".$user."' and password='".$password."' and status=1");
    $count = mysqli_num_rows($login_check);
    $fetch_user = mysqli_fetch_array($login_check); 
    if($count==1){
        $_SESSION['username'] = $fetch_user['name'];
        $_SESSION['mail'] = $fetch_user['email'];
        $_SESSION['role'] = $fetch_user['role']; 
        $_SESSION['userid'] =$fetch_user['user_Id'];  
        $_SESSION['image'] = $fetch_user['image'];    
        echo "<script>window.location.href='./index.php'</script>";
    }
    else{
         echo "<script>window.alert('Login Failed')</script>";
        echo "<script>window.location.href='./login.php'</script>";
    }
}

?>
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/UDAY_CLINIC_LOGO.png" alt="logo" width="20%">
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="useremail" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="userpwd"  class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox m-3">
                            <!-- <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label> -->

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login_submit">Sign in</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("common/footer.php") ?>
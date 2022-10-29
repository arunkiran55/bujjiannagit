
<?php   
      if($_SESSION['mail']=="" || $_SESSION['username']==""|| $_SESSION['role']=="" ||$_SESSION['userid']==""){
         echo "<script>window.alert('Login Failed')</script>";
         echo "<script>window.location.href='login.php'</script>";
    }
   ?>
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li> 
                <li>
                    <a href="roles.php"><i class="menu-icon fa fa-users"></i>Roles </a>
                </li>
                <!-- <li>
                    <a href="modals.php"> <i class="menu-icon ti-email"></i>Modals</a>
                </li>
                <li>
                    <a href="advancedtable.php"> <i class="menu-icon ti-email"></i>Advanced table</a>
                </li>
                <li>
                    <a href="datatables.php"> <i class="menu-icon ti-email"></i>Datatables</a>
                </li>
                <li>
                    <a href="login.php"> <i class="menu-icon ti-email"></i>login</a>
                </li>
                <li>
                    <a href="progressbar.php"> <i class="menu-icon ti-email"></i>progressbar</a>
                </li>
                <li>
                    <a href="tabs.php"> <i class="menu-icon ti-email"></i>Tabs</a>
                </li>
                <li>
                    <a href="themifyicons.php"> <i class="menu-icon ti-email"></i>Icons</a>
                </li> -->
                <li>
                    <a href="feedform.php"> <i class="menu-icon fa fa-list"></i>Posts / Feeds</a>
                </li>
                <li>
                    <a href="usersform.php"> <i class="menu-icon fa fa-user"></i>Users</a>
                </li>
                <li>
                    <a href="contactus.php"> <i class="menu-icon fa fa-user"></i>Contact us</a>
                </li>
                <!-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                        <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">Extras</li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </div> 
    </nav>
</aside>
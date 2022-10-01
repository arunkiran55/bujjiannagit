<?php include("common/header.php");
      include("common/leftnav.php");
      include("common/conn_db.php");   ?>
   <div id="right-panel" class="right-panel">
            <?php include("common/midheader.php") ?>
            <div class="breadcrumbs"> 
                    <div class="">
                        <h3>Edit User</h3>
                    </div> 
            </div>
        <div class="row">
            <?php $query = mysqli_query($conn, "select * from users where user_Id  ='".$_GET['user_Id']."'");
            $feed = mysqli_fetch_assoc($query);   ?>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form role="form" method="POST" enctype="multipart/form-data"
                                    id="userformedit">
                        <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <span class="spanerr"></span>  
                                        <input type="text" class="form-control required" name="name" err=" Name is required" err="Name is required" value="<?php echo $feed['name'] ?>"> 
                                    <small class="form-text text-muted">Give your Post's/feed's Title</small>
                        </div>
                       <div class="form-group">
                                                    <label class="form-control-label">Email</label>
                                                    <span class="spanerr"></span> 
                                                         <input type="mail" class="form-control required" name="email" err=" email is required" err="email is required" value="<?php echo $feed['email'] ?>">  
                                                    <small class="form-text text-muted">Give your Email</small>
                                        </div>
                                        <div class="form-group">
                                                    <label class="form-control-label">Password</label>
                                                    <span class="spanerr"></span> 
                                                         <input type="password" class="form-control required" name="pwd" err=" Password is required" err="Password is required" value="<?php echo $feed['password'] ?>">  
                                                    <small class="form-text text-muted">Give your Password</small>
                                        </div> 
                                        <div class="form-group">
                                                    <label class="form-control-label">Contact</label>
                                                    <span class="spanerr"></span> 
                                                         <input type="number" class="form-control required" name="phone" err=" Contact is required" err="Contact is required" value="<?php echo $feed['contact'] ?>">  
                                                    <small class="form-text text-muted">Give your Contact</small>
                                        </div> 
                                        <div class="form-group">
                                            <label>Role</label>
                                            <span class="spanerr"></span>
                                             <select data-placeholder="    Select the role..." class="form-control" name="role" >
                                                 <option selected disabled hidden>Choose role</option>
                                                    <?php  $roles = mysqli_query($conn,"select * from roles"); 
                                                        if(!empty($roles)){
                                                        while($role = mysqli_fetch_array($roles)){  ?>
                                                            <option value="<?php echo $role['role_Id'] ?>" <?php if($role['role_Id']==$feed['role']){ ?>
                                                                selected
                                                                <?php } ?>><?php echo $role['role_Title'];?> </option>
                                                    <?php } } ?>
                                            </select>
                                        </div>
                        <div class="form-group">
                                    <label class="form-control-label">Upload File 1:</label>
                                    <span class="spanerr"></span> 
                                        <input type="file" class="form-control" name="file" id="file"> 
                                    <small class="form-text text-muted">Give your Post's/feed's File 1 (pdf/doc/jpg/png)</small>
                                    <img src="uploads/users/<?php echo $feed['image'] ?>"  width="100px" height="100px"  class="file1" alt="file1" />
                                    <input type="hidden" class="form-control" name="filehid" value="<?php echo $feed['image'] ?>">
                        </div>
                        <div class="text-center">
                                <input type="hidden" class="form-control" name="post_type" value="2" />
                                <input type="hidden" class="form-control" name="hid"  value="<?php echo $feed['user_Id'] ?>"/>
                                <input type="submit" class="btn btn-success"></input>
                                <button class="btn btn-danger"><a href="./usersform.php" style="color:white">Cancel</a></button>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
</div>
<?php include("common/footer.php") ?>
<script>
$(document).ready(function () {
  $("form").submit(function(e){
    e.preventDefault();
    $flag=true;
    let checking="";
    $(this).find(".required").each(function(){
      if($(this).val()=="" || $(this).val()==null){
        $flag=false;
        $(this).siblings(".spanerr").html($(this).attr('err'));
        checking="err";
      }else{
        $(this).siblings(".spanerr").html("");
        checking="noerr";
      }
    });
    if(checking=="noerr"){
          var data = $("#userformedit")[0];
          $.ajax({
            url: "ajaxcalls/usersajax.php",
            method: "post",
            enctype:"multipart/form-data",
            data: new FormData(data),
            contentType:false,
            processData:false,
           dataType: 'json',
           Cache:false,
            success:function(res){
                    if (res.success) {
                      Swal.fire({
                          icon: "success",
                          title: "Congratulations..",
                          text: res.success,
                      }).then(function() {
                          window.location.href='./usersform.php'
                      });
                  } else if (res.failed) {
                      Swal.fire({
                          icon: "error",
                          title: "Oops...",
                          text: res.failed,
                      }).then(function() {
                          window.location.href='./usersform.php'
                      });
                  } else if (res.exists) {
                      Swal.fire({
                          icon: "warning",
                          title: "Oops...",
                          text: res.exists,
                      }).then(function() {
                          window.location.href='./usersform.php'
                      });
                  }else if (res.format) {
                      Swal.fire({
                          icon: "warning",
                          title: "Oops...",
                          text: res.format,
                      }).then(function() {
                          window.location.href='./usersform.php'
                      });
                  }
            }
         });
        } 
    return $flag;
      })
   });
</script>
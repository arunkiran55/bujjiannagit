<?php include("common/header.php");
      include("common/leftnav.php");
      include("common/conn_db.php");   ?>
   <div id="right-panel" class="right-panel">
            <?php include("common/midheader.php") ?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-10">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Users</h1>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#largeModal">
                          Add User
                      </button>
                    </div>
                </div>
            </div>
        </div>

         <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="largeModalLabel">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="animated fadeIn">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <form method="POST" enctype="multipart/form-data"  id="userformadd">
                                        <div class="form-group">
                                                    <label class="form-control-label">Name</label>
                                                    <span class="spanerr"></span>  
                                                        <input type="text" class="form-control required" name="name" err=" Name is required" err="Name is required"> 
                                                    <small class="form-text text-muted">Give your Name</small>
                                        </div>
                                        <div class="form-group">
                                                    <label class="form-control-label">Email</label>
                                                    <span class="spanerr"></span> 
                                                         <input type="mail" class="form-control required" name="email" err=" email is required" err="email is required">  
                                                    <small class="form-text text-muted">Give your Email</small>
                                        </div>
                                        <div class="form-group">
                                                    <label class="form-control-label">Password</label>
                                                    <span class="spanerr"></span> 
                                                         <input type="password" class="form-control required" name="pwd" err=" Password is required" err="Password is required">  
                                                    <small class="form-text text-muted">Give your Password</small>
                                        </div> 
                                        <div class="form-group">
                                                    <label class="form-control-label">Contact</label>
                                                    <span class="spanerr"></span> 
                                                         <input type="number" class="form-control required" name="phone" err=" Contact is required" err="Contact is required">  
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
                                                            <option value="<?php echo $role['role_Id'] ?>"><?php echo $role['role_Title'];?> </option>
                                                    <?php } } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                                    <label class="form-control-label">Upload File 2:</label>
                                                    <span class="spanerr"></span> 
                                                        <input  type="file" class="form-control" name="file" id="file"> 
                                                    <small class="form-text text-muted">Give your Image (jpg/png)</small>
                                        </div>
                                        <div class="text-center">
                                                <input type="hidden" class="form-control" name="post_type" value="1" />
                                                <input type="submit" class="btn btn-success"></input>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="content">
          <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Your Users</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php  $feeds = mysqli_query($conn,"select a.*,b.role_Title from users as a left join roles as b on b.role_Id =a.role order by a.user_Id  desc"); 
                        if(!empty($feeds)){
                        while($feed = mysqli_fetch_array($feeds))
                        { 
                        ?>
                                    <tr>
                                        <td><?php echo $feed['name'] ?></td>
                                        <td><?php echo $feed['email'] ?></td>
                                        <td>
                                           <td><?php echo $feed['role_Title'] ?></td>
                                        </td>
                                        <td>
                                            <?php if($feed['image']){ ?>  
                                            <img src="uploads/users/<?php echo $feed['image'] ?>" width="100px" height="100px" class="file2" alt="file2" />
                                            <?php } ?>
                                        </td>
                                        <td>
                                            
                                            <a class="btn btn-info btn-sm detailsbutton" title="Edit"
                                    href="editform.php?feeds_Id=<?php echo $feed['user_Id']; ?>"><i
                                        class="menu-icon fa fa-edit"> </i></a>
                                <a class="btn btn-danger btn-sm delete_button"
                                    onclick="del(<?php echo $feed['user_Id']; ?>)" title="Delete"><i
                                        class="menu-icon fa fa-trash"> </i> </a>
                                            
                                        </td> 
                                    </tr>
                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
      </div>

</div>
</div>
  
<?php include("common/footer.php") ?>
    <script>   
    $(document).ready(function() {
    $("form").submit(function(e) { 
        e.preventDefault(); 
        let arr = []; 
        $(this).find(".required").each(function() {
            if ($(this).val() == null || $(this).val() == "") { 
                arr.push("err");
                $(this).siblings(".spanerr").html($(this).attr('err'));
            } else {
                $(this).siblings(".spanerr").html("");
                arr.push("noerr");
            }
        });   
        if (jQuery.inArray("err", arr) == '-1') { //checkingbool == "noerr"
            var formdata = $("#userformadd")[0]; 
            console.log(formdata);
            $.ajax({
                url: "ajaxcalls/usersajax.php",
                method: "post",
                enctype:"multipart/form-data",
                data: new FormData(formdata),
                contentType:false,
                processData:false,
                dataType: 'json',
                Cache:false,
                success: function(res) { 
                    if (res.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Congratulations..",
                            text: res.success,
                        }).then(function() {
                            window.location.href = 'usersform.php'
                        });
                    } else if (res.failed) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: res.failed,
                        }).then(function() {
                            window.location.href = './usersform.php'
                        });
                    } else if (res.exists) {
                        Swal.fire({
                            icon: "warning",
                            title: "Oops...",
                            text: res.exists,
                        }).then(function() {
                            window.location.href = './usersform.php'
                        });
                    } else if (res.mandatory) {
                        Swal.fire({
                            icon: "warning",
                            title: "Oops...",
                            text: res.format,
                        }).then(function() {
                            window.location.href = './usersform.php'
                        });
                    }
                }
            });
        }
    });
});

function del(id) {
    cnfrm = confirm("Are you sure you want to delete this record?");
    if (cnfrm) {
        $.ajax({
            url: "ajaxcalls/usersajax.php",
            method: "post", 
            data: {
                "id": id,
                "post_type": '3'
            },
            dataType: 'json',
            Cache: false,
            success: function(res) {
                if (res.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Congratulations..",
                        text: res.success,
                    }).then(function() {
                        window.location.href = './usersform.php'
                    });
                } else if (res.failed) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: res.failed,
                    }).then(function() {
                        window.location.href = './usersform.php'
                    });
                }
            }
        });

    }
}
 
    </script>

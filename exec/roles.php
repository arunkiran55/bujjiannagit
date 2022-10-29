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
                                <h1>Roles</h1>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#largeModal">
                          Add Role
                      </button>
                    </div>
                </div>
            </div>
        </div>

         <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="largeModalLabel">Add Role</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="animated fadeIn">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <form role="form" method="POST" id="roleformadd">
                                        <div class="form-group">
                                                    <label class="form-control-label">Role Name</label>
                                                    <span class="spanerr"></span>  
                                                        <input type="text" class="form-control required" name="role" err=" Role is required" err="Role is required"> 
                                                    <small class="form-text text-muted">Give your Role Title</small>
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
                            <strong class="card-title">Roles</strong>
                        </div>
                        <div class="card-body">
                            <table id="rolesTable" class="table table-striped table-bordered" style="overflow-x:auto;">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Title</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php  $roles = mysqli_query($conn,"select * from roles"); 
                        if(!empty($roles)){
                        while($role = mysqli_fetch_array($roles))
                        { $i=1;
                        ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $role['role_Title'] ?></td>
                                        <td>
                                            <?php // if(!$role['role_Title']=="Admin"){ ?>
                                            <a class="btn btn-success btn-xs detailsbutton" title="Edit"
                                            href="editrole.php?role_Id=<?php echo $role['role_Id']; ?>"><i
                                            class="menu-icon fa fa-edit"> </i></a>
                                            <a class="btn btn-warning btn-xs delete_button"
                                            onclick="del(<?php echo $role['role_Id']; ?>)" title="Delete"><i
                                            class="menu-icon fa fa-trash"> </i> </a>
                                            <?php // } ?>
                                        </td> 
                                    </tr>
                    <?php $i++ ; } } ?>
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
    $('#rolesTable').DataTable();

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
            var formdata = $("#roleformadd").serialize();; 
            console.log(formdata) 
            $.ajax({
                url: "ajaxcalls/rolesajax.php",
                method: "post", 
                data: formdata,
                dataType: 'json',
                Cache:false,
                success: function(res) { 
                    if (res.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Congratulations..",
                            text: res.success,
                        }).then(function() {
                            window.location.href = 'roles.php'
                        });
                    } else if (res.failed) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: res.failed,
                        }).then(function() {
                            window.location.href = './roles.php'
                        });
                    } else if (res.exists) {
                        Swal.fire({
                            icon: "warning",
                            title: "Oops...",
                            text: res.exists,
                        }).then(function() {
                            window.location.href = './roles.php'
                        });
                    } else if (res.mandatory) {
                        Swal.fire({
                            icon: "warning",
                            title: "Oops...",
                            text: res.format,
                        }).then(function() {
                            window.location.href = './roles.php'
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
            url: "ajaxcalls/rolesajax.php",
            method: "post",
            enctype: "multipart/form-data",
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
                        window.location.href = './roles.php'
                    });
                } else if (res.failed) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: res.failed,
                    }).then(function() {
                        window.location.href = './roles.php'
                    });
                }
            }
        });

    }
}
 
    </script>

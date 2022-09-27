<?php include("common/header.php");
      include("common/leftnav.php");
      include("common/conn_db.php");   ?>
   <div id="right-panel" class="right-panel">
            <?php include("common/midheader.php") ?>
            <div class="breadcrumbs"> 
                    <div class="">
                        <h3>Edit Role</h3>
                    </div> 
            </div>
        <div class="row">
            <?php $query = mysqli_query($conn, "select * from roles where role_Id ='".$_GET['role_Id']."'");
            $role = mysqli_fetch_assoc($query);   ?>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form role="form" method="POST"                                     id="roleformedit">
                        <div class="form-group">
                                    <label class="form-control-label">Role Title</label>
                                    <span class="spanerr"></span>  
                                        <input type="text" class="form-control required" name="title" err=" Title is required" err="Title is required" value="<?php echo $role['role_Title'] ?>"> 
                                    <small class="form-text text-muted">Update your Role Title</small>
                        </div>
                        <div class="text-center">
                                <input type="hidden" class="form-control" name="post_type" value="2" />
                                <input type="hidden" class="form-control" name="hid"  value="<?php echo $feed['role_Id'] ?>"/>
                                <input type="submit" class="btn btn-success"></input>
                                <button class="btn btn-danger"><a href="./roles.php" style="color:white">Cancel</a></button>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-3"></div>
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
            var formdata = $("#roleformedit").serialize();; 
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
</script>
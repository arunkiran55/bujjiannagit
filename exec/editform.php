<?php include("common/header.php");
      include("common/leftnav.php");
      include("common/conn_db.php");   ?>
   <div id="right-panel" class="right-panel">
            <?php include("common/midheader.php") ?>
            <div class="breadcrumbs"> 
                    <div class="">
                        <h3>Edit Posts/Feeds</h3>
                    </div> 
            </div>
        <div class="row">
            <?php $query = mysqli_query($conn, "select * from feeds where feeds_Id ='".$_GET['feeds_Id']."'");
            $feed = mysqli_fetch_assoc($query);   ?>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form role="form" method="POST" enctype="multipart/form-data"
                                    id="feedformedit">
                        <div class="form-group">
                                    <label class="form-control-label">Title</label>
                                    <span class="spanerr"></span>  
                                        <input type="text" class="form-control required" name="title" err=" Title is required" err="Title is required" value="<?php echo $feed['feeds_Title'] ?>"> 
                                    <small class="form-text text-muted">Give your Post's/feed's Title</small>
                        </div>
                        <div class="form-group">
                                    <label class="form-control-label">Description</label>
                                    <span class="spanerr"></span> 
                                        <textarea class="form-control required" name="description" err=" Description is required" err="Description is required"  value="<?php echo $feed['feeds_Description'] ?>" rows="5"><?php echo $feed['feeds_Description'] ?></textarea> 
                                    <small class="form-text text-muted">Give your Post's/feed's Description</small>
                        </div>
                        <div class="form-group">
                                    <label class="form-control-label">Upload File 1:</label>
                                    <span class="spanerr"></span> 
                                        <input type="file" class="form-control" name="file_1" id="file_1"> 
                                    <small class="form-text text-muted">Give your Post's/feed's File 1 (pdf/doc/jpg/png)</small>
                                    <img src="uploads/feedsfiles/<?php echo $feed['feeds_File_one'] ?>"  width="100px" height="100px"  class="file1" alt="file1" />
                                    <input type="hidden" class="form-control" name="file1hid" value="<?php echo $feed['feeds_File_one'] ?>">
                        </div>
                        <div class="form-group">
                                    <label class="form-control-label">Upload File 2:</label>
                                    <span class="spanerr"></span> 
                                        <input  type="file" class="form-control" name="file_2" id="file_2"> 
                                    <small class="form-text text-muted">Give your Post's/feed's File 2 (pdf/doc/jpg/png)</small>
                                    <img src="uploads/feedsfiles/<?php echo $feed['feeds_File_two'] ?>" width="100px" height="100px" class="file2" alt="file2" />
                                    <input type="hidden" class="form-control" name="file2hid" value="<?php echo $feed['feeds_File_two'] ?>">
                        </div>
                        <div class="text-center">
                                <input type="hidden" class="form-control" name="post_type" value="2" />
                                <input type="hidden" class="form-control" name="hid"  value="<?php echo $feed['feeds_Id'] ?>"/>
                                <input type="submit" class="btn btn-success"></input>
                                <button class="btn btn-danger"><a href="./feedform.php" style="color:white">Cancel</a></button>
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
          var data = $("#feedformedit")[0];
          $.ajax({
            url: "ajaxcalls/feedsajax.php",
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
                          window.location.href='./feedform.php'
                      });
                  } else if (res.failed) {
                      Swal.fire({
                          icon: "error",
                          title: "Oops...",
                          text: res.failed,
                      }).then(function() {
                          window.location.href='./feedform.php'
                      });
                  } else if (res.exists) {
                      Swal.fire({
                          icon: "warning",
                          title: "Oops...",
                          text: res.exists,
                      }).then(function() {
                          window.location.href='./feedform.php'
                      });
                  }else if (res.format) {
                      Swal.fire({
                          icon: "warning",
                          title: "Oops...",
                          text: res.format,
                      }).then(function() {
                          window.location.href='./feedform.php'
                      });
                  }
            }
         });
        } 
    return $flag;
      })
   });
</script>
<?php include("common/header.php");
      include("common/leftnav.php");
      include("common/conn_db.php");   ?>
   <div id="right-panel" class="right-panel">
            <?php include("common/midheader.php") ?>
            <div class="breadcrumbs"> 
                    <div class="">
                        <h3>View Contact</h3>
                    </div> 
            </div>
        <div class="row">
            <?php $query = mysqli_query($conn, "select * from contactus where id ='".$_GET['id']."'");
            $contact = mysqli_fetch_assoc($query);   ?>
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form role="form" method="POST">
                        <div class="form-group">
                            <label class="form-control-label">Name</label>
                            <span class="spanerr"></span>  
                                <input type="text" class="form-control required" name="title"  value="<?php echo $contact['name'] ?>"> 
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <span class="spanerr"></span>  
                                <input type="text" class="form-control required" name="title"  value="<?php echo $contact['email'] ?>"> 
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Contact</label>
                            <span class="spanerr"></span>  
                                <input type="text" class="form-control required" name="title"  value="<?php echo $contact['contact'] ?>"> 
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Message</label>
                            <span class="spanerr"></span>  
                                <input type="text" class="form-control required"  style="height:200px" name="title"  value="<?php echo $contact['message'] ?>"> 
                        </div>
                        <div class="text-center">
                                <button class="btn btn-danger"><a href="./contactus.php" style="color:white">Cancel</a></button>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
</div>
<?php include("common/footer.php") ?>

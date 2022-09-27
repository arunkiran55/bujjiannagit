<?php include("common/header.php");
      $conn = mysqli_connect('localhost','root','','medicalcollege');  ?>
<div class="row feeds_section">
    <div class="col-md-3 col-2 doctor_section"></div>
    <div class="col-md-6 col-8">
        <?php $query= mysqli_query($conn,"select * from feeds"); 
                        if(!empty($query)){
                        while($feed = mysqli_fetch_array($query))
                        {  ?>
            <div class="card my-2 p-2" id="feed<?php echo $feed['feeds_Id'] ?>">
                    <h4><?php echo $feed['feeds_Title'] ?></h4>
                <div class="card-body">
                    <p><?php echo $feed['feeds_Description'] ?></p>
                </div>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <?php if($feed['feeds_File_one']!=""){ ?>
                            <p>File 1: <img src="exec/uploads/feedsfiles/<?php echo $feed['feeds_File_one'] ?>"  width="100px" height="100px"  class="file1" alt="file1" /></p>
                        <?php } ?>
                    </div>
                    <div class="col-md-6 col-12">
                        <?php if($feed['feeds_File_two']!=""){ ?>
                            <p>File 2: <img src="exec/uploads/feedsfiles/<?php echo $feed['feeds_File_two'] ?>"  width="100px" height="100px"  class="file2" alt="file2" /></p>
                        <?php } ?>
                    </div>
                </div>  
            </div>        
        <?php } } ?>
    </div>
    <div class="col-md-3 col-2 doctor_section"></div>
</div>
<?php include("common/footer.php"); ?>
<script>
//$(".footer_section .row").css('display', 'none');
</script>
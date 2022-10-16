<?php include('common/header.php');
      include('common/db.php'); 
 ?>
</div>

<section class="client_section layout_padding">
    <div class="container ">
      <div class="heading_container heading_center">
        <h2>
          What Says Customers
        </h2>
        <hr>
      </div>
      <div class="row">
        <?php  $feeds = mysqli_query($conn,"select a.*,b.* from feeds as a inner join users as b on b.user_id=a.feeds_Createdby order by feeds_Id Desc"); 
                        if(!empty($feeds)){
                            $i=1;
                        while($feed = mysqli_fetch_array($feeds))
                        { 
                            if($i%2==0){
                                $col = "col-md-12 ml-auto";
                            }else{
                                $col = "col-md-12";
                            }
        ?>
            <div class="<?php echo $col ?>">
            <div class="client_container ">
                <div class="detail-box ml-5">
                    <span>
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                                <span class="fs-18"><?php echo $feed['feeds_Title'] ?></span>
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                    </span>
                    <p>
                        <?php echo $feed['feeds_Description'] ?>
                    </p>
                    <p><?php if($feed['feeds_File_one']){ ?>
                        <?php echo $feed['feeds_File_one'] ?>
                   <?php } ?></p> 
                   <p><?php if($feed['feeds_File_two']){ ?>
                        <?php echo $feed['feeds_File_two'] ?>
                   <?php } ?></p> 
                </div>
                <div class="client_id">
                <div class="img-box py-3">
                    <img src="exec/uploads/users/<?php echo $feed['image'] ?>" alt="userimg">
                </div>
                <div class="client_name">
                    <h5>
                            <?php echo ucwords($feed['name']) ?>
                    </h5>
                    <!-- <h6>
                    Student
                    </h6> -->
                </div>
                </div>
            </div>
            </div> 
             
        <?php $i++; } } ?>
      </div>
    </div>
  </section>

<?php include('common/footer.php') ?>
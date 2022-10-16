<?php include('common/header.php');
      include('common/db.php'); 
 ?>
</div>

<section class="client_section layout_padding" style="background-color: #44b89d;">
    <div class="container bg-white rounded">
      <div class="heading_container heading_center">
        <h2>
          Stories
        </h2>
        <hr>
      </div> 
        <?php  $feeds = mysqli_query($conn,"select a.*,b.* from feeds as a inner join users as b on b.user_id=a.feeds_Createdby order by feeds_Id Desc"); 
                        if(!empty($feeds)){
                            $i=1;
                        while($feed = mysqli_fetch_array($feeds))
                        { 
                            if($i%2==0){
                                $col = "col-md-6 ml-auto";
                            }else{
                                $col = "col-md-6";
                            }
        ?>
        <div class="row">
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
                     <?php if($feed['feeds_File_one']){ 
                        $modal= explode(".",$feed['feeds_File_one']);   ?>
                        <a href="exec/uploads/feedsfiles/<?php echo $feed['feeds_File_one'] ?>" target="_blank">
                            <?php  if($modal[1]=="jpg" || $modal[1]=="jpeg" || $modal[1]=="png" || $modal[1]=="JPG" ){ ?>
                                <img src="images/imgclipart.svg" width="50px" style="color:white" alt="img"/>
                                <span class="fs-8 clickonicon"><small class="fs-8 clickonicon">Click on icon</small></span>
                            <?php }else{ ?>
                                <img src="images/fileclipart.svg" width="50px" style="color:white" alt="img"/>
                                <span class="fs-8 clickonicon"><small class="fs-8 clickonicon">Click on icon</small></span>
                            <?php } ?>
                        </a>
                   <?php } ?> 
                   <p><?php if($feed['feeds_File_two']){
                       $modal2= explode(".",$feed['feeds_File_two']);  ?> 
                        <a href="exec/uploads/feedsfiles/<?php echo $feed['feeds_File_two'] ?>" target="_blank">
                            <?php  if($modal2[1]=="jpg" || $modal2[1]=="jpeg" || $modal2[1]=="png" || $modal2[1]=="JPG" ){ ?>
                                <img src="images/imgclipart.svg" width="50px" style="color:white" alt="img"/>
                                <span class="fs-8 clickonicon"><small class="fs-8 clickonicon">Click on icon</small></span>
                            <?php }else{ ?>
                                <img src="images/fileclipart.svg" width="50px" style="color:white" alt="img"/>
                                <span class="fs-8 clickonicon"><small class="fs-8 clickonicon">Click on icon</small></span>
                            <?php } ?>
                        </a>
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
        </div>
        
        
        <?php $i++; } } ?>
      
    </div>
  </section>

<?php include('common/footer.php') ?>
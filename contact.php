
<?php include('common/header.php') ?>
</div>

<!-- blog section -->

<section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="heading_container ">
            <h2 class="">
              Contact Us
            </h2>
          </div>
          <form role="form" method="POST" id="contactform">
            <div>
            <span class="spanerr"></span> 
              <input type="text" class="form-control required" name="name" placeholder="Name" err=" Name is required" maxlength="255"/>
            </div>
            <div>
            <span class="spanerr"></span> 
              <input type="email" class="form-control required" name="mail" placeholder="Email" err=" Email is required" maxlength="55"/>
            </div>
            <div>
            <span class="spanerr"></span> 
              <input type="text" class="form-control required" name="phnum" placeholder="Phone Number" err=" Contact is required" maxlength="15"/>
            </div>
            <div>
            <span class="spanerr"></span> 
              <input type="text" name="message" class="form-control message-box required" placeholder="Message" err=" Message is required"/>
            </div>
            <div class="btn-box">
              <button type="submit">
                SEND
              </button>
            </div>
          </form>
          
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/contact-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- end blog section -->
<?php include('common/footer.php') ?>

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
          var data = $("#contactform")[0];
          $.ajax({
            url: "common/ajaxcalls/contactajax.php",
            method: "post",
            enctype:"multipart/form-data",
            data: new FormData(data),
            contentType:false,
            processData:false,
           dataType: 'json',
           Cache:false,
            success:function(res){
                console.log(res)
                    if (res.success) {
                      Swal.fire({
                          icon: "success",
                          title: "Congratulations..",
                          text: res.success,
                      }).then(function() {
                          window.location.href='./contact.php'
                      });
                  } else if (res.failed) {
                      Swal.fire({
                          icon: "error",
                          title: "Oops...",
                          text: res.failed,
                      }).then(function() {
                          window.location.href='./contact.php'
                      });
                  } else if (res.exists) {
                      Swal.fire({
                          icon: "warning",
                          title: "Oops...",
                          text: res.exists,
                      }).then(function() {
                          window.location.href='./contact.php'
                      });
                  }else if (res.format) {
                      Swal.fire({
                          icon: "warning",
                          title: "Oops...",
                          text: res.format,
                      }).then(function() {
                          window.location.href='./contact.php'
                      });
                  }
            }
         });
        } 
    return $flag;
      })
   });
</script>
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
                                <h1>Contact us</h1>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-2">
                        
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
                            <strong class="card-title">Contact Us</strong>
                        </div>
                        <div class="card-body">
                            <table id="contactTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S no</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>File 1</th>
                                        <th>File 2</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php  $contactus = mysqli_query($conn,"select * from contactus"); 
                        if(!empty($contactus)){
                            $i=1;
                        while($contact = mysqli_fetch_array($contactus))
                        { 
                        ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $contact['name'] ?></td>
                                        <td><?php echo $contact['email'] ?></td>
                                        <td class="text-center">
                                        <?php echo $contact['contact'] ?>
                                        </td>
                                        <td class="text-center">
                                        <?php echo $contact['message'] ?>
                                        </td>
                                        <td>
                                        <a class="btn btn-success btn-sm detailsbutton" title="Edit"
                                        href="viewcontact.php?id=<?php echo $contact['id']; ?>"><i
                                        class="menu-icon fa fa-eye"> </i></a>
                                <a class="btn btn-warning btn-sm delete_button"
                                    onclick="del(<?php echo $contact['id']; ?>)" title="Delete"><i
                                        class="menu-icon fa fa-trash"> </i> </a>
                                        </td> 
                                    </tr>
                    <?php  $i++; } } ?>
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
    $(document).ready( function () {
        $('#contactTable').DataTable();
    } );
function del(id) {
    cnfrm = confirm("Are you sure you want to delete this record?");
    if (cnfrm) {

        $.ajax({
            url: "ajaxcalls/contactajax.php",
            method: "post",
            enctype: "multipart/form-data",
            data: {
                "id": id,
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
                        window.location.href = './contactus.php'
                    });
                } else if (res.failed) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: res.failed,
                    }).then(function() {
                        window.location.href = './contactus.php'
                    });
                }
            }
        });

    }
}
 
    </script>


 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?> 
<?php
     $user=new User();
      $ship=new Ship();
    if(!isset($_GET['receiverEditId']) || $_GET['receiverEditId']==NULL){
      //header("Location: catlist.php");
      echo "<script>window.location='index.php'</script>";
    }else{
      $receiverEditId= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['receiverEditId']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $receiverEdit=$ship->receiverEdit($_POST, $receiverEditId);
    }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
        <?php
          $receiverDetails=$ship->receiverInfoForEdit($receiverEditId);
          if($receiverDetails){
            while($result=$receiverDetails->fetch_assoc()){ ?>
            <h3 style="color: #4ecdc4;"><i class="fa fa-user"></i> <?php echo "Receiver- "."<b style='color: #00a99d;'>".$result['name']."</b>";?></h3>
        <style>.alert{margin-bottom: 0px;}</style>
        <?php
           if(isset($receiverEdit)){
            echo $receiverEdit;
           }
         ?>
        <div style="margin-top: 10px;" class="row mt">
          <div class="col-lg-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
               <!-- Form Start-->
               <form action="" method="post" tyle="padding-left: 5px;" role="form" class="form-horizontal style-form">
              <!-- Shipper's Information Start-->
              <h4 style=" padding:10px; color: #4ecdc4;
               background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Receiver Information</h4></br>
              <style>.form-horizontal .form-group{margin-left: -10px;    margin-right: -10px;}
              </style>
              <div class="form-group">
               <label class="col-lg-2 control-label">Name</label>
               <div class="col-lg-6">
                 <input name="name" type="text" placeholder="Name" id="f-name" class="form-control" value="<?php echo $result['name']?>" required>
               </div>
              </div>
              <div class="form-group">
               <label class="col-lg-2 control-label">Email</label>
               <div class="col-lg-6">
                 <input name="email" type="email" placeholder="Email" id="f-name" class="form-control" value="<?php echo $result['email']?>" required>
               </div>
              </div>
               <div class="form-group">
                <label class="col-lg-2 control-label">Phone</label>
                <div class="col-lg-6">
                  <input name="phone" type="text" placeholder="Phone" id="email2" class="form-control" value="<?php echo $result['phone']?>" required>
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <!-- Ends-->

                <div style="border-bottom: 0px;" class="form-group">
                    <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-offset-0 col-lg-10">
                      <button name="update" class="btn btn-theme" type="submit"><i class="fa fa-check"></i> Save</button>
                      <button onclick="window.location.href='service.php';" name="cancel" class="btn btn-theme04" type="button"><i class="fa fa-close"></i> Back</button>
                    </div>
                </div>
              </form>
              <!-- Form Ends-->
            </div>
            <!-- /form-panel -->
          </div>
            <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
        <!--Billing Information Ends-->
        <?php } } ?>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
<?php
    include 'inc/footer.php';
?> 
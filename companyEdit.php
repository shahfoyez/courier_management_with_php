 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?> 
<?php
     $ship=new Ship();
    if(!isset($_GET['companyEditId']) || $_GET['companyEditId']==NULL){
      //header("Location: catlist.php");
      echo "<script>window.location='index.php'</script>";
    }else{
      $companyEditId= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['companyEditId']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $companyEdit=$ship->companyEdit($_POST, $companyEditId);
    }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
        <h3 style="color: #4ecdc4;"><i class="fa fa-ship"></i> Company</h3>
        <style>.alert{margin-bottom: 0px;}</style>
        <?php
           if(isset($companyEdit)){
            echo $companyEdit;
           }
         ?>
        <div style="margin-top: 10px;" class="row mt">
          <div class="col-lg-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
               <!-- Form Start-->
               <form action="" method="post" tyle="padding-left: 5px;" role="form" class="form-horizontal style-form">

              <?php
                $companyDetails=$ship->companyInfoForEdit($companyEditId);
                if($companyDetails){
                  while($result=$companyDetails->fetch_assoc()){ ?>
              
              <!-- Shipper's Information Start-->
              <h4 style=" padding:10px; color: #4ecdc4;
               background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Company Information</h4></br>
              <style>.form-horizontal .form-group{margin-left: -10px;    margin-right: -10px;}
              </style>
              <div class="form-group">
               <label class="col-lg-2 control-label">Key</label>
               <div class="col-lg-6">
                 <input name="keyy" type="text" placeholder="Key" id="f-name" class="form-control" value="<?php echo $result['keyy']?>">
               </div>
              </div>
              
              <div class="form-group">
                <label class="col-lg-2 control-label">Company Name</label>
                <div class="col-lg-6">
                  <input name="name" type="text" placeholder="Company Name" id="email2" class="form-control" value="<?php echo $result['name']?>">
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Company Link</label>
                <div class="col-lg-6">
                  <input name="link" type="text" placeholder="Company Link" id="email2" class="form-control" value="<?php echo $result['link']?>">
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <!-- Company Information Ends-->
                <div style="border-bottom: 0px;" class="form-group">
                    <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-offset-0 col-lg-10">
                      <button name="update" class="btn btn-theme" type="submit"><i class="fa fa-check"></i> Save</button>
                      <button onclick="window.location.href='company.php';" name="cancel" class="btn btn-theme04" type="button"><i class="fa fa-close"></i> Back</button>
                    </div>
                </div>
               <?php } } ?>
              </form>
              <!-- Form Ends-->
            </div>
            <!-- /form-panel -->
          </div>
            <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
        <!--Billing Information Ends-->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
<?php
    include 'inc/footer.php';
?> 
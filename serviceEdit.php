 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?> 
<?php
     $ship=new Ship();
    if(!isset($_GET['serviceEditId']) || $_GET['serviceEditId']==NULL){
      //header("Location: catlist.php");
      echo "<script>window.location='index.php'</script>";
    }else{
      $serviceEditId= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['serviceEditId']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $serviceEdit=$ship->serviceEdit($_POST, $serviceEditId);
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
           if(isset($serviceEdit)){
            echo $serviceEdit;
           }
         ?>
        <div style="margin-top: 10px;" class="row mt">
          <div class="col-lg-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
               <!-- Form Start-->
               <form action="" method="post" tyle="padding-left: 5px;" role="form" class="form-horizontal style-form">

              <?php
                $serviceDetails=$ship->serviceInfoForEdit($serviceEditId);
                if($serviceDetails){
                  while($result=$serviceDetails->fetch_assoc()){ ?>
              
              <!-- Shipper's Information Start-->
              <h4 style=" padding:10px; color: #4ecdc4;
               background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Company Information</h4></br>
              <style>.form-horizontal .form-group{margin-left: -10px;    margin-right: -10px;}
              </style>
              <div class="form-group">
               <label class="col-lg-2 control-label">Service Name</label>
               <div class="col-lg-6">
                 <input name="name" type="text" placeholder="Key" id="f-name" class="form-control" value="<?php echo $result['name']?>">
               </div>
              </div>
              
              <div class="form-group">
                <label class="col-lg-2 control-label">Public Label</label>
                <div class="col-lg-6">
                  <input name="label" type="text" placeholder="Company Name" id="email2" class="form-control" value="<?php echo $result['label']?>">
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div class="form-group">
                  <label class="col-lg-2 control-label">Company</label>
                  <div class="col-lg-6">
                    <select name="company" class="form-control">
                      <option value="">Company</option>
                      <?php
                        $company=$ship->companyDetails();
                        if($company){
                          while($cresult=$company->fetch_assoc()){ ?>
                            <option 
                            <?php
                              if(trim($result['company'])==trim($cresult['name'])){ echo 'selected';}?>
                                value="<?php echo $cresult['name'];?>">
                              <?php echo $cresult['name']?>
                            </option>
                      <?php } } ?>
                    </select>
                  </div>
                </div>
              <!-- Company Information Ends-->
                <div style="border-bottom: 0px;" class="form-group">
                    <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-offset-0 col-lg-10">
                      <button name="update" class="btn btn-theme" type="submit"><i class="fa fa-check"></i> Save</button>
                      <button onclick="window.location.href='service.php';" name="cancel" class="btn btn-theme04" type="button"><i class="fa fa-close"></i> Back</button>
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
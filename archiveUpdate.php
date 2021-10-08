 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?> 
<?php
     $ship=new Ship();
     $user=new User();
    if(!isset($_GET['awb']) || $_GET['awb']==NULL){
      //header("Location: catlist.php");
      echo "<script>window.location='index.php'</script>";
    }else{
      $awb= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['awb']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $archiveUpdate=$ship->archiveUpdate($_POST, $awb);
    }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
        <h3 style="color: #4ecdc4;"><i class="fa fa-ship"></i> Archive Update</h3>
        <style>.alert{margin-bottom: 0px;}</style>
        <?php
           if(isset($archiveUpdate)){
            echo $archiveUpdate;
           }
         ?>
        <!--Update End-->
        <div style="margin-top: 10px;" class="row mt">
          <div class="col-lg-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
          
               <form action="" method="post" tyle="padding-left: 5px;" role="form" class="form-horizontal style-form">

              <!-- Update Information Start-->
              <h4 style=" padding:10px; color: #4ecdc4;
               background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Update Shipping</h4></br>
              <style>.form-horizontal .form-group{margin-left: -10px;    margin-right: -10px;}
              </style>
              <div class="form-group">
                <label class="col-lg-2 control-label">Company</label>
                <div class="col-lg-6">
                  <select name='company' class="form-control">
                    <option value="">Select Company</option>
                    <?php 
                      $companies=$ship->getCompany();
                      if($companies){
                      while($cresult=$companies->fetch_assoc()){ 
                        $companKeyName= $cresult['keyy'].','.$cresult['name'];
                    ?>
                    <option 
                    <?php
                      $shipingCompany=$ship->shipingAWB($awb);
                      if($shipingCompany){
                       while($scresult=$shipingCompany->fetch_assoc()){
                         $sCompany=trim($scresult['company']);
                         $sReference=$scresult['reference'];
                        $sLocation=$scresult['location'];
                        $sActivity=$scresult['activity'];
                       }
                      }
                      if($sCompany== trim($companKeyName)){echo 'selected';}
                    ?>
                    value="<?php echo $companKeyName; ?>">
                      <?php echo $companKeyName;?> 
                    </option>
                     <?php }}?>
                   </select>
                </div>
              </div>
               <div class="form-group">
                <label class="col-lg-2 control-label">Reference</label>
                <div class="col-lg-6">
                  <input name="reference" type="text" placeholder="Reference" id="email2" class="form-control" value="<?php echo $sReference?>" readonly>
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div style="border-bottom: 0px;" class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-md-3 mb-3">
                  <label for="validationServer02">Location</label>
                  <input name='location' type="text" class="form-control" id="validationServer04" placeholder="Location" value="<?php echo $sLocation;?>">
                 <!--<div class="invalid-feedback">
                            Please provide a valid zip.
                          </div>-->
                </div>
                <div class="col-md-3 mb-3">
                  <label for="validationServer02">Activity</label>
                  <input name="activity" type="text" class="form-control" id="validationServer05" placeholder="Activity" value="<?php echo $sActivity;?>">
                  <!--<div class="invalid-feedback">
                            Please provide a valid zip.
                          </div>-->
                </div>
              </div>
              <div style="border-bottom: 0px;" class="form-group">
                    <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-offset-0 col-lg-10">
                      <button name="update" class="btn btn-theme" type="submit"><i class="fa fa-check"></i> Create</button>
                      <button onclick="window.location.href='archiveEdit.php';" name="cancel" class="btn btn-theme04" type="button"><i class="fa fa-close"></i> Back</button>
                    </div>
                </div>
                
              </form>
                
              <!-- Form Ends-->
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>


        <!-- Update End-->
        <div style="margin-top: 10px;" class="row mt">
          <div class="col-lg-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
              <form action="" method="post" enctype="multipart/form-data" tyle="padding-left: 5px;" role="form" class="form-horizontal style-form">
              <h4 style=" padding:10px; color: #4ecdc4;
               background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i>  History</h4></br>
              <style>.form-horizontal .form-group{margin-left: -10px;    margin-right: -10px;}
              </style>
               <table class="table table-striped table-advance table-hover">
                 <thead>
                   <tr>
                     <th><i class="fa fa-key"></i> SL</th>
                     <th><i class="fa fa-user"></i> Date</th>
                     <th><i class=" fa fa-cogs"></i> Location</th>
                     <th><i class="fa fa-plane"></i> Activity</th>
                     <th><i class=" fa fa-pencil-square-o"></i>Option</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php
                      $shippingUpdate=$ship->shippingUpdateHistory($awb);
                      if($shippingUpdate){
                        $i=0;
                        while($suresult=$shippingUpdate->fetch_assoc()){
                          $i++;
                  ?>
                   <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $suresult['datee'];?></td>
                     <td><?php echo $suresult['location'];?></td>
                     <td><?php echo $suresult['activity'];?></td>
                      
                     <td>
                        <label style='margin-right:15px;'></label>
                        <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" href="?loginDataDeleteId=<?php echo $lresult['id'];?>&adminUsername=<?php echo $adminUsername;?>"><i class="fa fa-trash-o"></i></a>
                     </td>
                   </tr>
                 <?php } }?>
                 </tbody>
               </table>
             </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
<?php
    include 'inc/footer.php';
?> 
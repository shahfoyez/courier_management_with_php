 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?> 
<?php
    $user=new User();
     $ship=new Ship();
    if(!isset($_GET['adminUsername']) || $_GET['adminUsername']==NULL){
      //header("Location: catlist.php");
      echo "<script>window.location='index.php'</script>";
    }else{
      $adminid= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['adminUsername']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $adminEdit=$user->adminEdit($_POST, $adminUsername);
    }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
        <style>.alert{margin-bottom: 0px;}</style>
        <?php
           if(isset($shippingEdit)){
            echo $shippingEdit;
           }
         ?>
        <div style="margin-top: 10px;" class="row mt">
          <div class="col-lg-12">
          <?php
            $username=Session::get('adminUsername');
            $getUser=$user->getUser($username);
            if($getUser){
              while($result=$getUser->fetch_assoc()){?>
            <div style="margin: 10px; border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="panel panel-default">
                  <div class="panel-body text-center">
                   <img style='border-radius: 65px;'src="<?php echo $result['img']?>" alt="User avatar">
                  </div>
              </div>
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
               <!-- Form Start-->
               <form action="" method="post" tyle="padding-left: 5px;" role="form" class="form-horizontal style-form">

              <!-- User Information Start-->
               
              <h4 style=" padding:10px; color: #4ecdc4;
               background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> User Information</h4></br>
              <style>.form-horizontal .form-group{margin-left: -10px;    margin-right: -10px;}
              </style>
              <div class="form-group">
               <label class="col-lg-2 control-label">Admin Name</label>
               <div class="col-lg-6">
                 <input name="name" type="text" placeholder="Name" class="form-control" value="<?php echo $result['name']?>" required>
               </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Username</label>
                <div class="col-lg-6">
                  <input name="username"type="text" placeholder="Username" class="form-control" value="<?php echo $result['username']?>" required readonly>
                <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div style="border-bottom: 0px solid #eff2f7;" class="form-group">
                <label class="col-lg-2 control-label">Status</label>
                <div class="col-lg-6">
                  <input name="role" type="text" placeholder="Status" class="form-control" value="<?php echo $result['role']?>" readonly>
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <!-- User's Information Ends-->

              <!-- User's Contact Info Information Start-->
                <h4 style=" padding:10px; color: #4ecdc4;
                background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Contact info</h4></br>
                <div class="form-group "><!--has-success-->
                  <label class="col-lg-2 control-label">Email</label>
                  <div class="col-lg-6">
                    <input name="email" type="email" placeholder="Email" id="f-name" class="form-control" value="<?php echo $result['email']?>">
                    <!--<p class="help-block">Successfully done</p>-->
                  </div>
                </div>
                <div style="border-bottom: 0px;" class="form-group">
                  <label class="col-lg-2 control-label">Phone</label>
                  <div class="col-lg-5">
                    <input name="phone" type="text" placeholder="Phone" class="form-control" value="<?php echo $result['phone']?>">
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <!-- Contact Information Ends-->

                 <!-- User's Contact Info Information Start-->
                <h4 style=" padding:10px; color: #4ecdc4;
                background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Security</h4></br>
                <div class="form-group "><!--has-success-->
                  <label class="col-lg-2 control-label">New Password</label>
                  <div class="col-lg-6">
                    <input name="npassword" type="email" placeholder="New Password" class="form-control">
                    <!--<p class="help-block">Successfully done</p>-->
                  </div>
                </div>
                <div style="border-bottom: 0px;" class="form-group">
                  <label class="col-lg-2 control-label">Confirm Password</label>
                  <div class="col-lg-5">
                    <input name="cmpassword" type="text" placeholder="Confirm Password" class="form-control">
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <!-- Contact Information Ends-->

                <!-- Other Information Start-->
                <h4 style=" padding:10px; color: #4ecdc4;
                background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Other Information</h4></br>
                <div style="border-bottom: 0px;" class="form-group ">
                   
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Agent</label>
                 <div class="col-lg-6">
                   <select name="agent" class="form-control">
                     <option value="">Select Agent</option>
                     <?php 
                      $agents=$ship->getAgents();
                      if($agents){
                      while($cresult=$agents->fetch_assoc()){ 
                        $agentCompany= $cresult['name'].','.$cresult['company'];
                        ?>
                    <option 
                     <?php 
                      if(trim($result['agent'])==trim($agentCompany)){
                        echo "selected";
                      }
                     ?>
                    value="<?php echo $agentCompany;?>">
                      <?php echo $agentCompany;?> 
                    </option>
                     
                 <?php }}?>
                   </select>
                 </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Created By</label>
                  <div class="col-lg-6">
                    <input name="phone" type="text" placeholder="Phone" class="form-control" value="<?php echo $result['createdBy']?>" readonly>
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Created At</label>
                  <div class="col-lg-6">
                    <input name="phone" type="text" placeholder="Phone" class="form-control" value="<?php echo $result['createdAt']?>" readonly>
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <div style="border-bottom: 0px;" class="form-group">
                  <label class="col-lg-2 control-label">Last Updated</label>
                  <div class="col-lg-6">
                    <input name="lupdate" type="text" placeholder="Last Updated" class="form-control" value="<?php echo $result['lastUpdate']?>" readonly>
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <div style="border-bottom: 0px;" class="form-group">
                    <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-offset-0 col-lg-10">
                      <button name="update" class="btn btn-theme" type="submit"><i class="fa fa-check"></i> Save</button>
                      <button onclick="window.location.href='archive.php';" name="cancel" class="btn btn-theme04" type="button"><i class="fa fa-close"></i> Back</button>
                    </div>
                </div>
              <!-- Billing Information Ends--> 
              </form>
              <!-- Form Ends-->
            </div>
            <!-- /form-panel -->
             <?php } } ?>
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
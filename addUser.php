 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
    
?> 
<?php
  $role=Session::get('adminRole');
  $role=trim($role);
  $user=new User();
  $ship=new Ship();
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $addUser=$user->addUser($_POST, $_FILES);
  }if($role=='Agent'){
    echo "<script>window.location='user.php'</script>";
  }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3 style="color: #4ecdc4;"><i class="fa fa-user"></i> Add User</h3>
        <style>.alert{margin-bottom: 0px;}</style>
        <?php
           if(isset($addUser)){
            echo $addUser;
           }
         ?>
        <!-- BASIC FORM VALIDATION -->
        <div style="margin-top: 10px;" class="row mt">
          <div class="col-lg-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
               <!-- Form Start-->
               <form action="" method="post" tyle="padding-left: 5px;" role="form" class="form-horizontal style-form" enctype="multipart/form-data">
                <!-- Add User Start-->
                <h4 style=" padding:10px; color: #4ecdc4;
                background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Add New User</h4></br>
                <style>.form-horizontal .form-group{margin-left: -10px;    margin-right: -10px;}
                </style>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Name</label>
                  <div class="col-lg-6">
                    <input name="name" type="text" placeholder="Name" id="f-name" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Username</label>
                  <div class="col-lg-6">
                    <input name="username" type="text" placeholder="Username" id="l-name" class="form-control" required>
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Email</label>
                  <div class="col-lg-6">
                    <input name="email" type="email" placeholder="Email" id="f-name" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Phone</label>
                  <div class="col-lg-6">
                    <input name="phone"type="text" placeholder="Phone" id="l-name" class="form-control" required>
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
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
                    <option value="<?php echo $agentCompany;?>">
                      <?php echo $agentCompany;?> 
                    </option>
                     
                 <?php }}?>
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Image</label>
                  <div class="controls col-md-5">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <span style="margin:0px; padding:0px; font-size: 15px;"class="btn btn-theme02 btn-file">
                        <input type="file" name="image" class="default" />
                      </span>
                      <span class="fileupload-preview" style="margin-left:5px;"></span>
                      <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label"></label>
                  <div class="col-md-2 mb-3">
                    <label for="validationServer02">Password</label>
                    <input name="password" type="passsword" class="form-control" id="validationServer03" placeholder="Password" required>
                    <!--<div class="invalid-feedback">
                              Please provide a valid zip.
                            </div>-->
                  </div>
                  <div class="col-md-2 mb-3">
                    <label for="validationServer02">Repeat Password</label>
                    <input name="rpassword" type="text" class="form-control" id="validationServer04" placeholder="Repeat Password" required>
                   <!--<div class="invalid-feedback">
                              Please provide a valid zip.
                            </div>-->
                  </div>
                  <div class="col-md-2 mb-3">
                    <label for="validationServer02">Pin</label>
                    <input name="pin" type="text" class="form-control" id="validationServer05" placeholder="Pin" required>
                    <!--<div class="invalid-feedback">
                              Please provide a valid zip.
                            </div>-->
                  </div>
                </div>
                <div style="border-bottom: 0px;" class="form-group">
                  <label class="col-lg-2 control-label">Role</label> 
                  <div class="col-lg-5">
                    <select name="role" class="form-control">
                      <option value="">Role</option>
                      <?php 
                      $role=Session::get('adminRole');
                      $role=trim($role);
                      if($role=='Super Admin'){?><option value="Super Admin">Super Admin</option><?php }?>
                      <option value="Admin">Admin</option>
                      <option value="Agent">Agent</option>
                    </select>
                  </div>
                </div>
                <!-- Add User Ends-->
                <div style="border-bottom: 0px;" class="form-group">
                  <label class="col-lg-2 control-label"></label> 
                  <div class="col-lg-offset-0 col-lg-10">
                    <button name="submit" class="btn btn-theme" type="submit"><i class="fa fa-check"></i> Submit</button>
                    <button onclick="window.location.href='user.php';" name="cancel" class="btn btn-theme04" type="button"><i class="fa fa-close"></i> Cancel</button>
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
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
<?php
    include 'inc/footer.php';
?> 
 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?> 
<?php
     $user=new User();
      $ship=new Ship();
    if(!isset($_GET['superAdminId']) || $_GET['superAdminId']==NULL){
      //header("Location: catlist.php");
      echo "<script>window.location='user.php'</script>";
    }else{
      $userEditId= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['superAdminId']);
    }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
        <?php
          $userDetails=$user->userInfoForEdit($superAdminId);
          if($userDetails){
            while($result=$userDetails->fetch_assoc()){ ?>
            <h3 style="color: #4ecdc4;"><i class="fa fa-user"></i> <?php echo "User- "."<b style='color: #00a99d;;'>".$result['username']."</b>";?></h3>
        <style>.alert{margin-bottom: 0px;}</style>
        <div style="margin-top: 10px;" class="row mt">
          <div class="col-lg-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
               <!-- Form Start-->
               <form action="" method="post" enctype="multipart/form-data" tyle="padding-left: 5px;" role="form" class="form-horizontal style-form">
              <!-- Shipper's Information Start-->
              <h4 style=" padding:10px; color: #4ecdc4;
               background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> User Information</h4></br>
              <style>.form-horizontal .form-group{margin-left: -10px;    margin-right: -10px;}
              </style>
              <div class="form-group">
               <label class="col-lg-2 control-label">Name</label>
               <div class="col-lg-6">
                 <input name="name" type="text" placeholder="Name" id="f-name" class="form-control" value="<?php echo $result['name']?>" required>
               </div>
              </div>
              
              <div class="form-group">
                <label class="col-lg-2 control-label">Username</label>
                <div class="col-lg-6">
                  <input name="username" type="text" placeholder="Username" id="email2" class="form-control" value="<?php echo $result['username'];?>" readonly>
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Email</label>
                <div class="col-lg-6">
                  <input name="email" type="email" placeholder="Email" id="email2" class="form-control" value="<?php echo $result['email'];?>" required>
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
                   <option 
                     <?php
                       $agent=$user->userAgent($userEditId);
                       if($agent){
                        while($uaresult=$agent->fetch_assoc()){
                          $userAgent=trim($uaresult['agent']);
                        }
                       }
                       if($userAgent== trim($agentCompany)){echo 'selected';}
                     ?>
                   value="<?php echo $agentCompany;?>">
                     <?php echo $agentCompany;?> 
                   </option>
                    
                <?php }}?>
                  </select>
                </div>
              </div>
              </td>
              <div style="border-bottom: 0px;" class="form-group">
                <label class="col-lg-2 control-label">Password</label>
                <div class="col-lg-6">
                  <input name="password" readonly type="text" placeholder="Password" id="email2" class="form-control" value="<?php echo md5($result['password']);?>" required>
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
               <div class="form-group">
                  <label class="col-lg-2 control-label"></label>
                  <div class="col-md-3 mb-3">
                    <label for="validationServer02">New Password</label>
                    <input name="npassword" type="text" class="form-control" id="validationServer03" placeholder="New Password">
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="validationServer02">Confirm Password</label>
                    <input name="cnpassword" type="text" class="form-control" id="validationServer04" placeholder="Confirm Password">
                  </div>
                </div>
                <div class="form-group">
                <label class="col-lg-2 control-label">Created By</label>
                <div class="col-lg-6">
                  <input name="createdBy" readonly type="text" id="email2" class="form-control" value="<?php echo $result['createdBy']?>" required>
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Created At</label>
                <div class="col-lg-6">
                  <input name="createdAt" readonly type="text" id="email2" class="form-control" value="<?php echo $result['createdAt']?>" required>
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Last Updated</label>
                <div class="col-lg-6">
                  <input readonly name="lastUpdate" type="text" id="email2" class="form-control" value="<?php echo $result['lastUpdate']?>" required>
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>

              <div class="form-group last">
                  <label class="col-lg-2 control-label">Image Upload</label>
                  <div class="col-md-9">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 131px; height: 110px;">
                         <img style="width: 130px; height: 100px;"src="<?php echo $result['img']?>"/>
                      </div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                           <input type="file" name="image" class="default" />
                        </span>
                      </div>
                    </div>
                  </div>
                </div>  


              <div class="form-group">
                <label class="col-lg-2 control-label">Phone</label>
                <div class="col-lg-6">
                  <input name="phone" type="text" placeholder="Phone" id="email2" class="form-control" value="<?php echo $result['phone']?>" required>
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
               
               
              <div class="form-group">
                  <label class="col-lg-2 control-label">Role</label>
                  <div class="col-lg-6">
                    <select name="role" class="form-control">
                      <option value="">Role</option>
                      <option 
                      <?php
                         if(trim($result['role'])=='Super Admin'){ echo 'selected';}
                      ?>
                      value="Super Admin">Super Admin</option>
                      <option 
                      <?php
                         if(trim($result['role'])=='Admin'){ echo 'selected';}
                      ?>
                      value="Admin">Admin</option>
                      <option 
                      <?php
                         if(trim($result['role'])=='Agent'){ echo 'selected';}
                      ?>
                      value="Agent">Agent</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Pin</label>
                  <div class="col-lg-6">
                    <input name="pin" type="text" placeholder="Pin" id="email2" class="form-control" value="<?php echo $result['pin']?>" required>
                    <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <!--
                <div style="border-bottom: 0px;" class="form-group">
                  <label class="col-lg-2 control-label">Account Status</label>
                  <div class="col-lg-6">
                    <select name="disable" class="form-control">
                      <option 
                      <?php
                         if(trim($result['disable'])==0){ echo 'selected';}
                      ?>
                      value="0">Active</option>
                      <option 
                      <?php
                         if(trim($result['disable'])==1){ echo 'selected';}
                      ?>
                      value="1">Disable</option>
                    </select>
                  </div>
                </div>
              -->
              <!-- Company Information Ends-->
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

        <div style="margin-top: 10px;" class="row mt">
          <div class="col-lg-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
              <h4 style=" padding:10px; color: #4ecdc4;
               background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Login History</h4></br>
              <style>.form-horizontal .form-group{margin-left: -10px;    margin-right: -10px;}
              </style>
               <table class="table table-striped table-advance table-hover">
                 <thead>
                   <tr>
                     <th><i class="fa fa-key"></i> SL</th>
                     <th><i class="fa fa-user"></i> Username</th>
                     <th><i class=" fa fa-cogs"></i> IP</th>
                     <th><i class="fa fa-plane"></i> Date</th>
                     <th><i class="fa fa-plane"></i> Browser</th>
                     <th><i class=" fa fa-pencil-square-o"></i>Option</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php
                      $username=$result['username'];
                      $loginHistory=$user->loginHistory($username);
                      if($loginHistory){
                        $i=0;
                        while($result=$loginHistory->fetch_assoc()){
                          $i++;
                  ?>
                   <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $result['username'];?></td>
                     <td><?php echo $result['ip'];?></td>
                     <td><?php echo $result['datee'];?></td>
                      <td><?php echo $fm->textShorten($result['browser'], $limit = 44);?></td>
                     <td>
                        <?php 
                          if($result['status']==1){ ?> 
                            <a class="btn btn-success  btn-sm" href="javascript:;">Active</a>
                         <?php }else{ ?>
                        <label style='margin-right:15px;'></label>
                        <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" href="?loginDeleteId=<?php echo $result['id'];?>"><i class="fa fa-trash-o"></i></a><?php }?>
                       <!--<button onclick="window.location.href='archiveView.php?archiveId=<?php echo $result['reference'];?>';" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>
                       <button onclick="window.location.href='addAgent.php';" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                       <button onclick="window.location.href='addAgent.php';" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>-->
                     </td>
                   </tr>
                 <?php } }?>
                 </tbody>
               </table>
            </div>
            <!-- /form-panel -->
          </div>
            <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
        <?php } } ?>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
<?php
    include 'inc/footer.php';
?> 
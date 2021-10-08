 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?> 
<?php
    $user=new User();
    $ship=new Ship();
    $role=Session::get('adminRole');
    $role=trim($role);
    if(!isset($_GET['userEditId']) || $_GET['userEditId']==NULL){
      //header("Location: catlist.php");
      echo "<script>window.location='user.php'</script>";
    }else{
      $userEditId= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['userEditId']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $userEdit=$user->userEdit($_POST,$_FILES, $userEditId);
    }
?>
<?php
    if(isset($_GET['loginDataDeleteId']) && $_GET['loginDataDeleteId']!=NULL ){
    //filtering
    $loginDataDeleteId=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['loginDataDeleteId']); 
    $deleteloginData=$user->delLoginData($loginDataDeleteId);

  }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
        <?php
          $userDetails=$user->userInfoForEdit($userEditId);
          if($userDetails){
            while($result=$userDetails->fetch_assoc()){ ?>
            <h3 style="color: #4ecdc4;"><i class="fa fa-user"></i> <?php echo "User- "."<b style='color: #00a99d;;'>".$result['username']."</b>";?></h3>
        <style>.alert{margin-bottom: 0px;}</style>
        <?php
           if(isset($userEdit)){
            echo $userEdit;
           } if(isset($deleteloginData)){
            echo $deleteloginData;
           }

         ?>
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
                 <input name="name" type="text" placeholder="Name" id="f-name" class="form-control" value="<?php echo $result['name']?>" required <?php if(trim($result['role'])=="Super Admin"){echo 'readonly';}?>>
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
                  <input name="email" type="email" placeholder="Email" id="email2" class="form-control" value="<?php echo $result['email'];?>" required <?php if(trim($result['role'])=="Super Admin"){echo 'readonly';}?>>
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <?php if(trim($result['role'])!="Super Admin"){?>
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
              <?php }?>
              <div class="form-group">
                <label class="col-lg-2 control-label">Created By</label>
                <div class="col-lg-6">
                  <input name="createdBy" readonly type="text" id="email2" class="form-control" value="<?php echo $result['createdBy']?>" required>
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <?php if(trim($result['role'])!="Super Admin"){?>
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
                      <div class="fileupload-new thumbnail" style="width: 110px; height: 110px;">
                         <img src="<?php echo $result['img']?>"/>
                      </div>
                      <div>
                        <span class="btn btn-theme02 btn-file">
                           <input type="file" name="image" class="default" />
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <?php }?>  


              <div class="form-group">
                <label class="col-lg-2 control-label">Phone</label>
                <div class="col-lg-6">
                  <input name="phone" type="text" placeholder="Phone" id="email2" class="form-control" value="<?php echo $result['phone']?>" required <?php if(trim($result['role'])=="Super Admin"){echo 'readonly';}?> >
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
               
              <?php if(trim($result['role'])!="Super Admin"){?>
              <div class="form-group">
                  <label class="col-lg-2 control-label">Role</label>
                  <div class="col-lg-6">
                    <select name="role" class="form-control">
                      <option value="">Role</option>
                      <?php 
                      $role=Session::get('adminRole');
                      $role=trim($role);
                      if($role=='Super Admin'){?><option 
                      <?php
                         if(trim($result['role'])=='Super Admin'){ echo 'selected';}
                      ?>
                      value="Super Admin">Super Admin</option><?php }?>
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
                <div style="border-bottom: 0px;" class="form-group">
                  <label class="col-lg-2 control-label">Pin</label>
                  <div class="col-lg-6">
                    <input name="pin" type="text" placeholder="Pin" id="email2" class="form-control" value="<?php echo $result['pin']?>" required>
                    <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <?php }?> 
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
                       <?php if(trim($result['role'])!="Super Admin"){?>
                      <button name="update" class="btn btn-theme" type="submit"><i class="fa fa-check"></i> Save</button>
                    <?php }?>
                      <button onclick="window.location.href='user.php';" name="cancel" class="btn btn-theme04" type="button"><i class="fa fa-close"></i> Back</button>
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
              <form action="" method="post" enctype="multipart/form-data" tyle="padding-left: 5px;" role="form" class="form-horizontal style-form">
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
                        while($lresult=$loginHistory->fetch_assoc()){
                          $i++;
                  ?>
                   <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $lresult['username'];?></td>
                     <td><?php echo $lresult['ip'];?></td>
                     <td><?php echo $lresult['datee'];?></td>
                      <td><?php echo $fm->textShorten($result['browser'], $limit = 44);?></td>
                     <td>
                        <?php 
                          if($lresult['status']==1){ ?> 
                            <a class="btn btn-success  btn-sm" href="javascript:;">Active</a>
                         <?php }else{ ?>
                        <label style='margin-right:15px;'></label>
                        <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" href="?loginDataDeleteId=<?php echo $lresult['id'];?>&userEditId=<?php echo $userEditId;?>"><i class="fa fa-trash-o"></i></a><?php }?>
                       <!--<button onclick="window.location.href='archiveView.php?archiveId=<?php echo $result['reference'];?>';" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>
                       <button onclick="window.location.href='addAgent.php';" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                       <button onclick="window.location.href='addAgent.php';" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>-->
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
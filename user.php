 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>
<?php
  $user=new User();
?>
<?php
    if(isset($_GET['userDeleteId']) && $_GET['userDeleteId']!=NULL ){
    //filtering
    $userDeleteId=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['userDeleteId']); 
    $deleteUser=$user->delUser($userDeleteId); 
  }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
         <h3 style="color: #4ecdc4;"><i class="fa fa-user"></i> Users</h3>
         <?php
           if(isset($deleteUser)){
            echo $deleteUser;
           }
         ?>
         <?php 
          $role=Session::get('adminRole');
          $role=trim($role);
          if($role=='Super Admin' || $role=='Admin'){?>
          <button onclick="window.location.href='addUser.php';" type="button" class="btn btn-theme"><i class="fa fa-pencil"></i> Add User</button>
        <?php } ?>
         <div style="margin-top: 10px; margin-bottom:268px;" class="row mt">
           <div class="col-md-12">
             <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="content-panel">
               <table class="table table-striped table-advance table-hover">
                 <thead>
                   <tr>
                     <th><i class="fa fa-key"></i> SL</th>
                     <th><i class="fa fa-envelope-open"></i> Username</th>
                     <th><i class="fa fa-user "></i> Name</th>
                     <th><i class="fa fa-user"></i> Email</th>
                     <th><i class="fa fa-user"></i> Agent</th>
                     <th><i class=" fa fa-cogs"></i> Phone</th>
                     <th><i class="fa fa-plane"></i> Role</th>
                     <th><i class=" fa fa-pencil-square-o"></i>Option</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php
                      $userDetails=$user->userDetails();
                      if($userDetails){
                        $i=0;
                        while($result=$userDetails->fetch_assoc()){
                          $i++;
                    ?>
                   <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $result['username'];?></td>
                     <td><?php echo $result['name'];?></td>
                     <td><?php echo $result['email'];?></td>
                     <td><?php echo $result['agent'];?></td>
                     <td><?php echo $result['phone'];?></td>
                     <td><?php echo $result['role'];?></td>
                      <td>
                      <?php 
                      $username=Session::get('username');
                      if(trim($result['role'])=='Super Admin'){?>
                        <a class="btn btn-primary btn-xs" href="userEdit.php?userEditId=<?php echo $result['adminid'];?>">View</a>
                          <?php }else{ ?>
                        <a class="btn btn-primary btn-xs" href="userEdit.php?userEditId=<?php echo $result['adminid'];?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" href="?userDeleteId=<?php echo $result['adminid'];?>"><i class="fa fa-trash-o"></i></a>
                      <?php } ?>
                       <!--<button onclick="window.location.href='archiveView.php?archiveId=<?php echo $result['reference'];?>';" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>
                       <button onclick="window.location.href='addAgent.php';" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                       <button onclick="window.location.href='addAgent.php';" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>-->
                     </td>
                   </tr>
                 <?php } }?>
                 </tbody>
               </table>
             </div>
             <!-- /content-panel -->
           </div>
           <!-- /col-md-12 -->
         </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <?php
      include 'inc/footer.php';
    ?> 
 
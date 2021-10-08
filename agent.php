 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>
<?php
  $user=new User();
?>
<?php
    if(isset($_GET['agentDeleteId']) && $_GET['agentDeleteId']!=NULL ){
    //filtering
    $agentDeleteId=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['agentDeleteId']); 
    $deleteAgent=$user->delAgent($agentDeleteId); 
  }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
         <h3 style="color: #4ecdc4;"><i class="fa fa-user"></i> Agent</h3>
          <button onclick="window.location.href='addAgent.php';" type="button" class="btn btn-theme"><i class="fa fa-pencil"></i> Add Agent</button>
          <?php
          if(isset($deleteAgent)){
            echo "</br></br>".$deleteAgent;
          }
          ?>
         <div  style="margin-top: 10px; " class="row mt">
           <div class="col-md-12">
             <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="content-panel">
               <table class="table table-striped table-advance table-hover">
                 <thead>
                   <tr>
                     <th width="5%"><i class="fa fa-key"></i> SL</th>
                     <th width=""><i class="fa fa-envelope-open"></i> Name</th>
                     <th width=""><i class="fa fa-user "></i> Company</th>
                     <th width=""><i class="fa fa-user"></i> Phone</th>
                     <th width=""><i class="fa fa-user"></i> Email</th>
                     <th width=""><i class=" fa fa-cogs"></i> Address</th>
                     <th width=" "><i class="fa fa-plane"></i> Created At</th>
                     <th width=" "><i class="fa fa-plane"></i> Created By</th>
                     <th width=" "><i class="fa fa-plane"></i> Edited By</th>
                     <th width=" "><i class=" fa fa-pencil-square-o"></i>Option</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php
                      $agentDetails=$user->agentDetails();
                      if($agentDetails){
                        $i=0;
                        while($result=$agentDetails->fetch_assoc()){
                          $i++;
                    ?>
                   <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $result['name'];?></td>
                     <td><?php echo $result['company'];?></td>
                     <td><?php echo $result['phone'];?></td>
                     <td><?php echo $result['email'];?></td>
                      <td><?php echo $result['address'];?></td>
                     <td><span class="label label-info"><?php echo $result['createdAt'];?></span></td>
                     <td><span class="label label-primary"><?php echo $result['createdBy'];?></span></td>
                     <td>
                       <?php
                        if($result['editedBy']==""){
                          echo "<span class='label label-success'>No One</span>";
                        }else{ ?>
                       <span class="label label-warning"><?php echo $result['editedBy'];?></span>
                     <?php } ?>
                     </td>
                     <td>
                        <a class="btn btn-primary btn-xs" href="agentEdit.php?agentEditId=<?php echo $result['sl'];?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" href="?agentDeleteId=<?php echo $result['sl'];?>"><i class="fa fa-trash-o"></i></a>
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
 
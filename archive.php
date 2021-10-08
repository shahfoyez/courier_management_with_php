 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>
<?php
    $ship=new Ship();
    if(isset($_GET['archiveDeleteId']) && $_GET['archiveDeleteId']!=NULL ){
    //filtering
    $archiveDeleteId=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['archiveDeleteId']); 
    $deleteArchive=$ship->delArchiveData($archiveDeleteId); 
  }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
         <h3 style="color: #4ecdc4;"><i class="fa fa-archive"></i> Archive</h3>
         <?php
          if(isset($deleteArchive)){
            echo $deleteArchive;
          }
        ?>
         <div class="row mt">
           <div class="col-md-12">
             <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;"class="content-panel">
               <table class="table table-striped table-advance table-hover">
                 <thead>
                   <tr>
                     <th><i class="fa fa-key"></i> sl</th>
                     <th><i class="fa fa-envelope-open"></i> AWB</th>
                     <th><i class="fa fa-envelope-open"></i> Reference</th>
                     <th class="hidden-phone"><i class="fa fa-user "></i> Shipper</th>
                     <th><i class="fa fa-user"></i> Consignee</th>
                     <th><i class=" fa fa-cogs"></i> Service</th>
                     <th><i class="fa fa-plane"></i> Dest</th>
                     <th class="hidden-phone"><i class="fa fa-calendar"></i> Date</th>
                     <th><i class="fa fa-user-circle "></i> Admin</th>
                     <th><i class=" fa fa-question-circle"></i> Status</th>
                     <th><i class=" fa fa-pencil-square-o"></i>Option</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php
                      $shipingDetails=$ship->shipingDetails();
                      if($shipingDetails){
                        $i=0;
                        while($result=$shipingDetails->fetch_assoc()){
                          $i++;
                    ?>
                   <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $result['awb'];?></td>
                     <td><?php echo $result['reference'];?></td>
                     <td><?php echo $result['sname'];?></td>
                     <td><?php echo $result['cname'];?></td>
                     <td><?php echo $result['service'];?></td>
                     <td><?php echo $result['ccountry'];?></td>
                     <td><?php echo $result['datee'];?></td>
                     <td><?php echo $result['userAdmin'];?></td>
                     <td>
                       
                      <?php 
                        $status= $result['status'];
                        if($status=="Due"){?>
                          <span class="label label-warning label-mini">Due</span></td>
                        <?php }else if($status=="Paid"){?>
                          <span class="label label-success label-mini">Paid</span></td>
                       <?php }else{ ?>
                        <span class="label label-info label-mini">Paid</span>
                      <?php }?>
                      </td>
                      <td>
                        <a class="btn btn-success btn-xs" href="archiveView.php?archiveViewId=<?php echo $result['reference'];?>"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-primary btn-xs" href="archiveEdit.php?archiveEditId=<?php echo $result['reference'];?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" href="?archiveDeleteId=<?php echo $result['reference'];?>"><i class="fa fa-trash-o"></i></a>
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
 
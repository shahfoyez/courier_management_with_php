 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>
<?php
  $ship=new Ship();
  if($_SERVER['REQUEST_METHOD']=='POST'){
     $addReceiver=$ship->addReceiver($_POST);
  }
?>
<?php
    if(isset($_GET['receiverDeleteId']) && $_GET['receiverDeleteId']!=NULL ){
    //filtering
    $receiverDeleteId=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['receiverDeleteId']); 
    $deleteReceiver=$ship->delReceiver($receiverDeleteId); 
  }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
         <h3 style="color: #4ecdc4;"><i class="fa fa-male"></i> Receiver</h3>
         <style>.alert{margin-bottom: 0px;}</style>
         <?php
        if(isset($addReceiver)){
           if($addReceiver==1){ ?>
            <div class="alert alert-success"><b>Successfull!</b> Receiver Added Successfully.</div>
           <?php }elseif($addReceiver==0){ ?>
            <div class="alert alert-danger"><b>Oh snap! </b> Have some Error.</div>
           <?php }elseif($addReceiver==2){?>
           <div class="alert alert-danger"><b>ID Exist! </b> Please select a different ID.</div>
       <?php } }if(isset($deleteReceiver)){
        echo $deleteReceiver;
       }?>
         <div style="margin-top: 10px;" class="row mt">
           <div class="col-md-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
              <form class="form-inline" role="form" action="" method="post">
                <div class="form-group">
                  <label style='color: #fff; background-color: #4ecdc4;padding: 3px; border-radius: 4px;' for="exampleInputEmail2">ID </label>
                  <input type="text" class="form-control" name="id" placeholder="Enter ID">
                </div>
                <div class="form-group">
                  <label style='color: #fff; background-color: #4ecdc4;padding: 3px; border-radius: 4px;' for="exampleInputEmail2">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label style='color: #fff; background-color: #4ecdc4;padding: 3px; border-radius: 4px;' for="exampleInputEmail2">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label style='color: #fff; background-color: #4ecdc4;padding: 3px; border-radius: 4px;' for="exampleInputPassword2">Phone</label>
                  <input type="text" class="form-control" name="phone" placeholder="Phone">
                </div>
                <button type="submit" name="receiver" class="btn btn-theme">Add Receiver</button>
              </form>
            </div>
              <!--content-panel -->
               <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;"class="content-panel">
               <table class="table table-striped table-advance table-hover">
                 <thead>
                   <tr>
                     <th><i class="fa fa-key"></i> SL</th>
                     <th><i class="fa fa-envelope-open"></i> RID</th>
                     <th><i class="fa fa-user"></i> Name</th>
                     <th><i class=" fa fa-cogs"></i> Email</th>
                     <th><i class="fa fa-plane"></i> Phone</th>
                     <th><i class=" fa fa-pencil-square-o"></i>Option</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php
                      $receiverDetails=$ship->receiverDetails();
                      if($receiverDetails){
                        $i=0;
                        while($result=$receiverDetails->fetch_assoc()){
                          $i++;
                    ?>
                   <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $result['receiverid'];?></td>
                     <td><?php echo $result['name'];?></td>
                     <td><?php echo $result['email'];?></td>
                     <td><?php echo $result['phone'];?></td>
                     <td>
                        <a class="btn btn-primary btn-xs" href="receiverEdit.php?receiverEditId=<?php echo $result['receiverid'];?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" href="?receiverDeleteId=<?php echo $result['receiverid'];?>"><i class="fa fa-trash-o"></i></a>
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
          <!-- /row mt -->





      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <?php
      include 'inc/footer.php';
    ?> 
 
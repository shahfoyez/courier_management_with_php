 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>
<?php
  $ship=new Ship();
  if($_SERVER['REQUEST_METHOD']=='POST'){
     $addService=$ship->addService($_POST);
  }
?>
<?php
    if(isset($_GET['serviceDeleteId']) && $_GET['serviceDeleteId']!=NULL ){
    //filtering
    $serviceDeleteId=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['serviceDeleteId']); 
     
     $deleteService=$ship->delService($serviceDeleteId); 
  }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
        <style>.alert{margin-bottom: 0px;}</style>
         <h3 style="color: #4ecdc4;"><i class="fa fa-male"></i> Service</h3>
         <?php
          if(isset($addService)){
            echo $addService;
          }elseif(isset($deleteService)){
            echo $deleteService;
        }?>
         <div style="margin-top: 10px;" class="row mt">
           <div class="col-md-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
              <form class="form-inline" role="form" action="" method="post">
                <div class="form-group">
                  <label style='color: #fff; background-color: #4ecdc4;
                  padding: 3px;
                  border-radius: 4px;' for="exampleInputEmail2">Service Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Service Name" required>
                </div>
                <div class="form-group">
                  <label style='color: #fff; background-color: #4ecdc4;
                  padding: 3px;
                  border-radius: 4px;'for="exampleInputEmail2">Public Label</label>
                  <input type="text" class="form-control" name="label" placeholder="Public Label" required>
                </div>
                <div class="form-group">
                  <label style='color: #fff; background-color: #4ecdc4;
                  padding: 3px; border-radius: 4px;'for="exampleInputEmail2">Company</label>
                  <select name="company" class="form-control">
                  <option value="">Company</option>
                <?php 
                  $companies=$ship->getCompany();
                  if($companies){
                    while($cresult=$companies->fetch_assoc()){ ?>
                    <option value="<?php echo $cresult['name'];?>"><?php echo $cresult['name']?>
                    </option> 
                <?php } }?>
                  </select>
                </div>
                <button type="submit" name="receiver" class="btn btn-theme">Create Service</button>
              </form>
            </div>
              <!--content-panel -->
               <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;"class="content-panel">
               <table class="table table-striped table-advance table-hover">
                 <thead>
                   <tr>
                     <th><i class="fa fa-key"></i> SL</th>
                     <th><i class="fa fa-user"></i> Name</th>
                     <th><i class=" fa fa-cogs"></i> Label</th>
                     <th><i class="fa fa-plane"></i> Company</th>
                     <th><i class=" fa fa-pencil-square-o"></i>Option</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php
                      $serviceDetails=$ship->serviceDetails();
                      if($serviceDetails){
                        $i=0;
                        while($result=$serviceDetails->fetch_assoc()){
                          $i++;
                  ?>
                   <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $result['name'];?></td>
                     <td><?php echo $result['label'];?></td>
                     <td><?php echo $result['company'];?></td>
                     <td>
                        <a class="btn btn-primary btn-xs" href="serviceEdit.php?serviceEditId=<?php echo $result['sl'];?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" href="?serviceDeleteId=<?php echo $result['sl'];?>"><i class="fa fa-trash-o"></i></a>
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
 
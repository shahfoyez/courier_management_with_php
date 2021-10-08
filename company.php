
 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>
<?php
  $ship=new Ship();
  if($_SERVER['REQUEST_METHOD']=='POST'){
     $addCompany=$ship->addCompany($_POST);
  }
?>
<?php
    if(isset($_GET['companyDeleteId']) && $_GET['companyDeleteId']!=NULL ){
    //filtering
    $companyDeleteId=preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['companyDeleteId']); 
     
     $deleteCompany=$ship->delCompany($companyDeleteId); 
  }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
         <h3 style="color: #4ecdc4;"><i class="fa fa-industry"></i> Company</h3>
         <style>.alert{margin-bottom: 0px;}</style>
        <?php
          if(isset($addCompany)){
            echo $addCompany;
          }elseif(isset($deleteCompany)){
            echo $deleteCompany;
        }?>
         <div style="margin-top: 10px;" class="row mt">
           <div class="col-md-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
              <form class="form-inline" role="form" action="" method="post">
                <div class="form-group">
                  <label style='color: #fff; background-color: #4ecdc4;
                  padding: 3px;
                  border-radius: 4px;' for="exampleInputEmail2"> Company Key</label>
                  <input type="text" class="form-control" name="keyy" placeholder="Company Key">
                </div>
                <div class="form-group">
                  <label style='color: #fff; background-color: #4ecdc4;
                  padding: 3px;
                  border-radius: 4px;'for="exampleInputEmail2"> Company Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Company Name">
                </div>
                <div class="form-group">
                  <label style='color: #fff; background-color: #4ecdc4;padding: 3px; border-radius: 4px;' for="exampleInputEmail2"> Company Link</label>
                  <input type="text" class="form-control" name="link" placeholder="Company Link">
                </div>
                <button type="submit" name="receiver" class="btn btn-theme">Add Company</button>
              </form>
            </div>
              <!--content-panel -->
               <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;"class="content-panel">
               <table class="table table-striped table-advance table-hover">
                 <thead>
                   <tr>
                     <th><i class="fa fa-key"></i> SL</th>
                     <th><i class="fa fa-user"></i> Key</th>
                     <th><i class=" fa fa-cogs"></i> Name</th>
                     <th><i class="fa fa-plane"></i> Link</th>
                     <th><i class=" fa fa-pencil-square-o"></i>Option</th>
                   </tr>
                 </thead>
                 <tbody>
                  <?php
                      $companyDetails=$ship->companyDetails();
                      if($companyDetails){
                        $i=0;
                        while($result=$companyDetails->fetch_assoc()){
                          $i++;
                  ?>
                   <tr>
                     <td><?php echo $i;?></td>
                     <td><?php echo $result['keyy'];?></td>
                     <td><?php echo $result['name'];?></td>
                     <td>
                      <button onclick="window.location.href='<?php echo $result['link']?>';" type="button" class="btn btn-theme">Link</button>
                     </td>
                     <td>
                        <a class="btn btn-primary btn-xs" href="companyEdit.php?companyEditId=<?php echo $result['sl'];?>"><i class="fa fa-pencil"></i></a>
                        <a onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" href="?companyDeleteId=<?php echo $result['sl'];?>"><i class="fa fa-trash-o"></i></a>
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
 
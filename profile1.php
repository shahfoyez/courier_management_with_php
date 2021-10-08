  <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
           <div class="col-lg-12">
          <?php
            $username=Session::get('adminUsername');
            $getUser=$user->getUser($username);
            if($getUser){
              while($uresult=$getUser->fetch_assoc()){?>
               <form class="form-horizontal">
                <div style="margin: 10px; border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="panel panel-default">
                  <div class="panel-body text-center">
                   <img style='border-radius: 65px;'src="<?php echo $uresult['img']?>" alt="User avatar">
                  </div>
                </div>
                <div style="margin: 10px; border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="panel panel-default">
                   <div class="panel-heading">
                      <h4 style=" padding:10px; color: #4ecdc4;
                        background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Shipper's Information</h4></br>
                       <style>.form-horizontal .form-group{margin-left: -10px;    margin-right: -10px;}
                       </style>
                   </div>
                   <div class="panel-body">
                     <div class="form-group">
                       <label class="col-sm-2 control-label">Location</label>
                       <div class="col-sm-6">
                         <select class="form-control">
                           <option selected="">Select country</option>
                           <option>Belgium</option>
                           <option>Canada</option>
                           <option>Denmark</option>
                           <option>Estonia</option>
                           <option>France</option>
                         </select>
                       </div>
                     </div>
                     <div class="form-group">
                       <label class="col-sm-2 control-label">Company name</label>
                       <div class="col-sm-6">
                         <input type="text" class="form-control">
                       </div>
                     </div>
                     <div class="form-group">
                       <label class="col-sm-2 control-label">Position</label>
                       <div class="col-sm-6">
                         <input type="text" class="form-control">
                       </div>
                     </div>
                   </div>
                 </div>

                 <div style="margin: 10px; border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="panel panel-default">
                   <div class="panel-heading">
                   <h4 class="panel-title">Contact info</h4>
                   </div>
                   <div class="panel-body">
                     <div class="form-group">
                       <label class="col-sm-2 control-label">Work number</label>
                       <div class="col-sm-6">
                         <input type="tel" class="form-control">
                       </div>
                     </div>
                     <div class="form-group">
                       <label class="col-sm-2 control-label">Mobile number</label>
                       <div class="col-sm-6">
                         <input type="tel" class="form-control">
                       </div>
                     </div>
                     <div class="form-group">
                       <label class="col-sm-2 control-label">E-mail address</label>
                       <div class="col-sm-10">
                         <input type="email" class="form-control">
                       </div>
                     </div>
                     <div class="form-group">
                       <label class="col-sm-2 control-label">Work address</label>
                       <div class="col-sm-10">
                         <textarea rows="3" class="form-control"></textarea>
                       </div>
                     </div>
                   </div>
                 </div>

                 <div style="margin: 10px; border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="panel panel-default">
                   <div class="panel-heading">
                   <h4 class="panel-title">Security</h4>
                   </div>
                   <div class="panel-body">
                     <div class="form-group">
                       <label class="col-sm-2 control-label">Current password</label>
                       <div class="col-sm-10">
                         <input type="password" class="form-control">
                       </div>
                     </div>
                     <div class="form-group">
                       <label class="col-sm-2 control-label">New password</label>
                       <div class="col-sm-10">
                         <input type="password" class="form-control">
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="col-sm-10 col-sm-offset-2">
                         <div class="checkbox">
                           <input type="checkbox" id="checkbox_1">
                           <label for="checkbox_1">Make this account public</label>
                         </div>
                       </div>
                     </div>
                     <div class="form-group">
                       <div class="col-sm-10 col-sm-offset-2">
                         <button type="submit" class="btn btn-primary">Submit</button>
                         <button type="reset" class="btn btn-default">Cancel</button>
                       </div>
                     </div>
                   </div>
                 </div>
               </form>
             <?php }}?>
             </div>
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    <!--main content end-->
     <?php
        include 'inc/footer.php';
    ?>
     
     
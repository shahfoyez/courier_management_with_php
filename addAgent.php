 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
    
?> 
<?php
  $user=new User();
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $addAgent=$user->addAgent($_POST);
  }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;"class="wrapper">
        <h3 style="color: #4ecdc4;"><i class="fa fa-user"></i> Add Agent</h3>
        <style>.alert{margin-bottom: 0px;}</style>
        <?php
           if(isset($addAgent)){
            echo $addAgent;
           }
         ?>
        <!-- BASIC FORM VALIDATION -->
        <div style="margin-top: 10px;" class="row mt">
          <div class="col-lg-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
               <!-- Form Start-->
               <form action="" method="post" tyle="padding-left: 5px;" role="form" class="form-horizontal style-form" enctype="multipart/form-data">

                <!-- Add Agent Start-->
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
                  <label class="col-lg-2 control-label">Company</label>
                  <div class="col-lg-6">
                    <input name="company"type="text" placeholder="Company" id="l-name" class="form-control" required>
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
                <div  style="border-bottom: 0px;" class="form-group ">
                  <label class="col-lg-2 control-label">Address</label>
                  <div class="col-md-6">
                    <textarea name="address" class="form-control" name="message" id="contact-message" placeholder="Address" rows="5" data-rule="required" data-msg="Please write something for us" required></textarea>
                  </div>
                </div>
                <!-- Add Agent Ends-->

                <div style="border-bottom: 0px;" class="form-group">
                  <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-offset-0 col-lg-10">
                      <button name="submit" class="btn btn-theme" type="submit"><i class="fa fa-check"></i> Submit</button>
                      <button onclick="window.location.href='agent.php';" name="cancel" class="btn btn-theme04" type="button"><i class="fa fa-close"></i> Cancel</button>
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
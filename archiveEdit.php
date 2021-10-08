 <?php
    include 'inc/header.php';
    include 'inc/sidebar.php';
?> 
<?php
     $ship=new Ship();
    if(!isset($_GET['archiveEditId']) || $_GET['archiveEditId']==NULL){
      //header("Location: catlist.php");
      echo "<script>window.location='index.php'</script>";
    }else{
      $archiveEditId= preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['archiveEditId']);
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $shippingEdit=$ship->shipingEdit($_POST, $archiveEditId);
    }
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section style="min-height:550px;" class="wrapper">
        <h3 style="color: #4ecdc4;"><i class="fa fa-ship"></i> Archive Edit</h3>
        <style>.alert{margin-bottom: 0px;}</style>
        <?php
           if(isset($shippingEdit)){
            echo $shippingEdit;
           }
         ?>
        <div style="margin-top: 10px;" class="row mt">
          <div class="col-lg-12">
            <div style="border-radius: 3px; box-shadow: 0px 0px 8px 3px #aab2bc;" class="form-panel">
               <!-- Form Start-->
               <form action="" method="post" tyle="padding-left: 5px;" role="form" class="form-horizontal style-form">

              <?php
                $shipmentDetails=$ship->shipingInfoForEdit($archiveEditId);
                if($shipmentDetails){
                  while($result=$shipmentDetails->fetch_assoc()){ ?>

               <!-- Table start-->               
               <table class="table text-center">
                 <thead style="background-color: #4ecdc4; border-right: 1px solid white;" class="text-uppercase bg-primary">
                     <tr class="text-white">
                         <th style="border-radius: 5px;border-right: 1px solid white;border-bottom: 0px;"><i class="fa fa-check-circle"></i> Reference</th>
                         <th style="border-bottom: 0px; border-radius: 5px; border-right: 1px solid white;"><i class="fa fa-puzzle-piece"></i> Piece</th>
                         <th style="border-bottom: 0px; border-radius: 5px; border-right: 1px solid white;"><i class="fa fa-plane"></i> Service</th>
                         <th style="border-bottom: 0px; border-radius: 5px; border-right: 1px solid white;"><i class="fa fa-user"></i>  Agent</th>
                         <th style="border-bottom: 0px; border-radius: 5px; border-right: 1px solid white;"><i class="fa fa-suitcase"></i> Weight</th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr>
                         <th>
                           <div class="col-lg-13">
                             <input name="reference" type="text" placeholder="Reference" id="f-name" class="form-control" value="<?php echo $result['reference']?>">
                             <!--<p class="help-block">Successfully done</p>-->
                           </div>
                         </th>
                         <td>    
                           <div class="col-lg-13">
                             <input name="pieces" type="text" placeholder="Pieces" id="f-name" class="form-control" value="<?php echo $result['pieces']?>">
                             <!--<p class="help-block">Successfully done</p>-->
                           </div>
                         </td>
                        <td>                            
                           <div class="col-lg-13">
                             <select name="service" class="form-control">
                              <option value="">Select Service</option>
                              <?php 
                                $services=$ship->getServices();
                                if($services){
                                while($sresult=$services->fetch_assoc()){ 
                                  $serviceCompany= $sresult['name'].','.$sresult['company'];
                              ?>
                              <option 
                              <?php
                                $shipingService=$ship->shipingService($archiveEditId);
                                if($shipingService){
                                 while($ssresult=$shipingService->fetch_assoc()){
                                   $sService=trim($ssresult['service']);
                                 }
                                }
                                if($sService== trim($serviceCompany)){echo 'selected';}
                              ?>
                              value="<?php echo $serviceCompany; ?>">
                                <?php echo $serviceCompany;?> 
                              </option>
                               
                           <?php }}?>
                             </select>
                           </div>
                         </td>
                         <td>                            
                           <div class="col-lg-13">
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
                                $shipingAgent=$ship->shipingAgent($archiveEditId);
                                if($shipingAgent){
                                 while($saresult=$shipingAgent->fetch_assoc()){
                                   $aService=trim($saresult['agent']);
                                 }
                                }
                                if($aService== trim($agentCompany)){echo 'selected';}
                              ?>
                              value="<?php echo $agentCompany;?>">
                                <?php echo $agentCompany;?> 
                              </option>
                               
                           <?php }}?>
                             </select>
                           </div>
                         </td>
                           
                        
                         <td>                            
                           <div class="col-lg-13">
                             <input name="weight" type="text" placeholder="Weight" id="f-name" class="form-control" value="<?php echo $result['weight']?>">
                             <!--<p class="help-block">Successfully done</p>-->
                          </div>
                        </td>
                    </tr>
                </tbody>
              </table> 
              <!-- Table End-->
              <!-- Shipper's Information Start-->
              <h4 style=" padding:10px; color: #4ecdc4;
               background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Shipper's Information</h4></br>
              <style>.form-horizontal .form-group{margin-left: -10px;    margin-right: -10px;}
              </style>
              <div class="form-group">
               <label class="col-lg-2 control-label">Shipper's Name</label>
               <div class="col-lg-6">
                 <input name="sname" type="text" placeholder="Shipper's Name" id="f-name" class="form-control" value="<?php echo $result['sname']?>">
               </div>
              </div>
              <div style="border-bottom: 0px solid #eff2f7;" class="form-group">
                <label class="col-lg-2 control-label">Address</label>
                <div class="col-lg-5">
                  <input name="saddr1"type="text" placeholder="House/Road No" id="l-name" class="form-control" value="<?php echo $result['sAddr1']?>">
                <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div style="border-bottom: 0px solid #eff2f7;" class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-lg-5">
                  <input name="saddr2"type="text" placeholder="Village" id="l-name" class="form-control" value="<?php echo $result['sAddr2']?>">
                <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div style="border-bottom: 0px;" class="form-group ">
                <label class="col-lg-2 control-label"></label>
                <div class="col-lg-5">
                  <input name="saddr3" type="text" placeholder="Thana" id="l-name" class="form-control" value="<?php echo $result['sAddr3']?>">
                <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-lg-5">
                  <input name="saddr4" type="text" placeholder="Country" id="l-name" class="form-control" value="<?php echo $result['sAddr4']?>">
                <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Phone</label>
                <div class="col-lg-6">
                  <input name="sphone" type="text" placeholder="Phone" id="email2" class="form-control" value="<?php echo $result['sphone']?>">
                  <!--<p class="help-block">Something went wrong</p>-->
                </div>
              </div>
              <div style="border-bottom: 0px;" class="form-group">
                <label class="col-lg-2 control-label"></label>
                <div class="col-md-2 mb-3">
                  <label for="validationServer02">City</label>
                  <input name="scity" type="text" class="form-control" id="validationServer03" placeholder="City" value="<?php echo $result['scity']?>">
                  <!--<div class="invalid-feedback">
                            Please provide a valid zip.
                          </div>-->
                </div>
                <div class="col-md-2 mb-3">
                  <label for="validationServer02">Country</label>
                  <input name="scountry" type="text" class="form-control" id="validationServer04" placeholder="State" value="<?php echo $result['scountry']?>">
                 <!--<div class="invalid-feedback">
                            Please provide a valid zip.
                          </div>-->
                </div>
                <div class="col-md-2 mb-3">
                  <label for="validationServer02">Zip</label>
                  <input name="szip" type="text" class="form-control" id="validationServer05" placeholder="Zip" value="<?php echo $result['szip']?>">
                  <!--<div class="invalid-feedback">
                            Please provide a valid zip.
                          </div>-->
                </div>
              </div>
              <!-- Shipper's Information Ends-->

              <!-- Consignee Information Start-->
                <h4 style=" padding:10px; color: #4ecdc4;
                background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Consignee Information</h4></br>
                <div class="form-group "><!--has-success-->
                  <label class="col-lg-2 control-label">Consignee's Name</label>
                  <div class="col-lg-6">
                    <input name="cname" type="text" placeholder="Consignee's Name" id="f-name" class="form-control" value="<?php echo $result['cname']?>">
                    <!--<p class="help-block">Successfully done</p>-->
                  </div>
                </div>
                <div style="border-bottom: 0px;" class="form-group">
                  <label class="col-lg-2 control-label">Address</label>
                  <div class="col-lg-5">
                    <input name="caddr1" type="text" placeholder="Address1" id="l-name" class="form-control" value="<?php echo $result['cAddr1']?>">
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <div style="border-bottom: 0px;"class="form-group">
                  <label class="col-lg-2 control-label"></label>
                  <div class="col-lg-5">
                    <input  name="caddr2"type="text" placeholder="Address2" id="l-name" class="form-control" value="<?php echo $result['cAddr2']?>">
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <div style="border-bottom: 0px;" class="form-group ">
                  <label class="col-lg-2 control-label"></label>
                  <div class="col-lg-5">
                    <input name="caddr3" type="text" placeholder="Address3" id="l-name" class="form-control" value="<?php echo $result['cAddr3']?>">
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <div style="border-bottom: 0px; "class="form-group">
                  <label class="col-lg-2 control-label"></label>
                  <div class="col-lg-5">
                    <input name="caddr4" type="text" placeholder="Address4" id="l-name" class="form-control" value="<?php echo $result['cAddr4']?>">
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <div class="form-group"> 
                  <label class="col-lg-2 control-label">Phone</label>
                  <div class="col-lg-6">
                    <input name="cphone"type="text" placeholder="Phone" id="email2" class="form-control" value="<?php echo $result['cphone']?>">
                    <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <div style="border-bottom: 0px;" class="form-group">
                  <label class="col-lg-2 control-label"></label>
                  <div class="col-md-2 mb-3">
                    <label for="validationServer02">City</label>
                    <input name="ccity" type="text" class="form-control" id="validationServer03" placeholder="City" value="<?php echo $result['ccity']?>">
                    <!--<div class="invalid-feedback">
                              Please provide a valid zip.
                            </div>-->
                  </div>
                  <div class="col-md-2 mb-3">
                    <label for="validationServer02">Country</label>
                    <input name="ccountry" type="text" class="form-control" id="validationServer04" placeholder="State" value="<?php echo $result['ccountry']?>">
                   <!--<div class="invalid-feedback">
                              Please provide a valid zip.
                            </div>-->
                  </div>
                  <div class="col-md-2 mb-3">
                    <label for="validationServer02">Zip</label>
                    <input name="czip" type="text" class="form-control" id="validationServer05" placeholder="Zip" value="<?php echo $result['czip']?>">
                    <!--<div class="invalid-feedback">
                              Please provide a valid zip.
                            </div>-->
                  </div>
                </div>
                <!-- Consignee's Information Ends-->

                <!-- Additinal Information Start-->
                <h4 style=" padding:10px; color: #4ecdc4;
                background-color: #2f323a; border-radius: 5px;"><i class="fa fa-pencil"></i> Additional Information</h4></br>
                <div style="border-bottom: 0px;" class="form-group ">
                  <div class="col-md-6 mb-3">
                    <label for="validationServer02">GOODS</label>
                    <textarea name="goods" class="form-control" id="contact-message" rows="5" data-msg="Please write something for us" value="<?php echo $result['reference']?>"><?php echo $result['goods']?></textarea>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label for="validationServer02">COMMENTS</label>
                     <textarea name="comment" class="form-control" id="contact-message" rows="5" data-msg="Please write something for us"><?php echo $result['comment']?></textarea>
                  </div>
                </div>
              <!-- Additinal Information Ends-->
              <!-- Billing Information Start-->
                <h4 style=" padding:10px; color: #4ecdc4;
                background-color: #2f323a; border-radius: 5px;"><i class="fa fa-usd"></i>  Billing Information</h4></br>
                <div class="form-group  "><!--has-success-->
                  <label class="col-lg-2 control-label">Total Bill</label>
                  <div class="col-lg-5">
                    <input name="totalbill" type="text" placeholder="Total Amounts" id="f-name" class="form-control" value="<?php echo $result['tamount']?>">
                    <!--<p class="help-block">Successfully done</p>-->
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Due Amount</label>
                  <div class="col-lg-5">
                    <input name="dueamount" type="text" placeholder="Due Amount" id="l-name" class="form-control" value="<?php echo $result['damount']?>">
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-lg-2 control-label">Status</label>
                  <div class="col-lg-5">
                    <select name="status" class="form-control">
                      <option value="">Status</option>
                      <option 
                      <?php
                         if(trim($result['status'])=='Paid'){ echo 'selected';}
                      ?>
                      value="Paid">Paid</option>
                      <option 
                      <?php
                         if(trim($result['status'])=='Due'){ echo 'selected';}
                      ?>
                      value="Due">Due</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">Receiver</label>
                  <div class="col-lg-5">
                    <select name="receiver" class="form-control">
                      <option value="">Receiver</option>
                      <?php
                        $receiver=$ship->receiverDetails();
                        if($receiver){
                          while($rresult=$receiver->fetch_assoc()){ ?>
                            <option 
                            <?php
                              if(trim($result['receiver'])==trim($rresult['name'])){ echo 'selected';}?>
                                value="<?php echo $rresult['name'];?>">
                              <?php echo $rresult['name']?>
                            </option>
                      <?php } } ?>
                    </select>
                  </div>
                </div>
                <div style="border-bottom: 0px;" class="form-group">
                  <label class="col-lg-2 control-label">Date</label>
                  <div class="col-lg-5">
                    <input name="datee" type="date" placeholder="Address4" id="l-name" class="form-control">
                  <!--<p class="help-block">Something went wrong</p>-->
                  </div>
                </div>
                <div style="border-bottom: 0px;" class="form-group">
                    <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-offset-0 col-lg-10">
                      <button name="update" class="btn btn-theme" type="submit"><i class="fa fa-check"></i> Save</button>
                      <button onclick="window.location.href='archive.php';" name="cancel" class="btn btn-theme04" type="button"><i class="fa fa-close"></i> Back</button>
                    </div>
                </div>
              <!-- Billing Information Ends--> 
               <?php } } ?>
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
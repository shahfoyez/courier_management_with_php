 <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <?php
            $username=Session::get('adminUsername');
            $getUser=$user->getUser($username);
            if($getUser){
              while($uresult=$getUser->fetch_assoc()){?>
          <p class="centered"><a href="profile.php?adminUsername=<?php echo $uresult['username']?>"><img src="<?php echo $uresult['img']?>" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $uresult['name']?></h5>
        <?php }}?>
          <li class="mt">
            <a 
            <?php 
              $path=$_SERVER['SCRIPT_FILENAME'];//fulll path name
              $page=basename($path, '.php');
              if($page=='index'){
                echo 'class=active';
              }
            ?> href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
         <li class="sub-menu">
            <a 
            <?php 
              $path=$_SERVER['SCRIPT_FILENAME'];//fulll path name
              $page=basename($path, '.php');
              if($page=='ship'){
                echo 'class=active';
              }
            ?> href="ship.php">
              <i class="fa fa-plus"></i>
              <span>New</span>
            </a>
          </li>
           <li class="sub-menu">
            <a 
            <?php 
              $path=$_SERVER['SCRIPT_FILENAME'];//fulll path name
              $page=basename($path, '.php');
              if($page=='archive' || $page=='archiveView' || $page=='archiveEdit'){
                echo 'class=active';
              }
            ?> href="archive.php">
              <i class="fa fa-desktop"></i>
              <span>Archive</span>
            </a>
          </li>
          <li class="sub-menu">
            <a
            <?php 
              $path=$_SERVER['SCRIPT_FILENAME'];//fulll path name
              $page=basename($path, '.php');
              if($page=='user' || $page=='company'|| $page=='general'|| $page=='service'|| $page=='agent'||$page=='receiver'||$page=='addUser' || $page=='addAgent' || $page=='userEdit'|| $page=='serviceEdit' || $page=='agentEdit' || $page=='receiverEdit' || $page=='companyEdit' || $page=='account' ||$page=='accountEdit' || $page=='addAccount' ){
                echo 'class=active';
            } ?>
            href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Settings</span>
              </a>
            <ul class="sub">
              <li><a <?php if($page=='general'){ ?>style="color:#4ecdc4;"<?php }?> href="general.php">General</a></li>
              <li><a <?php if($page=='company' || $page=='companyEdit'){ ?>style="color:#4ecdc4;"<?php }?> href="company.php">Company</a></li>
              <li><a <?php if($page=='service' || $page=='serviceEdit'){ ?>style="color:#4ecdc4;"<?php }?> href="service.php">Service</a></li>
              <li><a <?php if($page=='user' || $page=='addUser' || $page=='userEdit'){ ?>style="color:#4ecdc4;"<?php }?> href="user.php">User</a></li>
              <li><a <?php if($page=='agent' || $page=='addAgent' || $page=='agentEdit'){ ?>style="color:#4ecdc4;"<?php }?> href="agent.php">Agent</a></li>
              <li><a <?php if($page=='receiver' || $page=='receiverEdit'){ ?>style="color:#4ecdc4;"<?php }?> href="receiver.php">Receiver</a></li>
              <li><a <?php if($page=='account' || $page=='accountEdit' || $page=='addAccount' ){ ?>style="color:#4ecdc4;"<?php }?> href="account.php">Account</a></li>

            </ul>

          </li>
          <?php
          if(isset($_GET['action']) && isset($_GET['action'])=='logout'){
            $loginStatus=$user->LoginStatus();
            Session::destroy();
          }
          ?>
           
          <li>
            <a class="logout" href="?action=logout"><i class="fa fa-sign-out"></i>Logout</a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
 <?php
 	$filepath= realpath(dirname(__FILE__));
	include_once ($filepath.'/../database/Session.php');
	Session::checkLogin();
	include_once ($filepath.'/../database/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class adminLogin{
		private $db;
		private $fm;
		public function __construct(){  //object in constructor can be used within the whole class
			$this->db=new Database();
			$this->fm=new Format();
		}
		public function AdminLogin($username, $password){

			$username =$this->fm->validation($username);
			$password =$this->fm->validation($password);
			$username= mysqli_real_escape_string($this->db->link, $username);
			$password= mysqli_real_escape_string($this->db->link, $password);

			if(empty($username) || empty($password)){
				$loginmsg="Fields must not be empty";
				return $loginmsg;
			}else{
				$password=md5($password);
				$query="select * from tbl_admin WHERE username='$username' AND password='$password'";
				$result=$this->db->select($query);
				if($result !=false){

					$query="UPDATE tbl_loginhistory SET status = '0' WHERE id = (SELECT MAX(id) FROM tbl_loginhistory)"; 
		            $update=$this->db->update($query);

					$value=$result->fetch_assoc();
					Session::set("adminLogin", true);
					Session::set("adminId", $value['adminid']);
					Session::set("adminName", $value['name']);
					Session::set("adminUsername", $value['username']);
					Session::set("adminRole", $value['role']);
					//Login History Entry
					$adminUsername=Session::get('adminUsername');
					date_default_timezone_set("Asia/Dhaka");
					$datee= date("Y-m-d H:i:s");
					$ip=$_SERVER['REMOTE_ADDR'];
					$browser = $_SERVER['HTTP_USER_AGENT'];
					$loginHistory="INSERT into tbl_loginhistory(username,ip, datee, browser, status) 
                                   values('$adminUsername','$ip','$datee', '$browser','1')";
                    $loginHistoryInsert=$this->db->insert($loginHistory);
                    header('Location: index.php');
				}else{
					$loginmsg="Username or Password is incorrect.";
					return $loginmsg;
				}
			}
		}
	}
?>
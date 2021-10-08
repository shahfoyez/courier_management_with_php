<?php
	$filepath= realpath(dirname(__FILE__));
	include_once ($filepath.'/../database/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class User{
		private $db;
		private $fm;
		public function __construct(){  //object in constructor can be used within the whole class
			$this->db=new Database();
			$this->fm=new Format();
		}
		public function addUser($data, $file){
			date_default_timezone_set("Asia/Dhaka");
            $createdAt= date("Y-m-d H:i:s");
			$name =$this->fm->validation($data['name']);
			$name = mysqli_real_escape_string($this->db->link, $name);
			$username =$this->fm->validation($data['username']);
			$username = mysqli_real_escape_string($this->db->link, $username);
			$email =$this->fm->validation($data['email']);
			$email = mysqli_real_escape_string($this->db->link, $email);
			$phone =$this->fm->validation($data['phone']);
			$phone = mysqli_real_escape_string($this->db->link, $phone);
			$agent =$this->fm->validation($data['agent']);
			$agent = mysqli_real_escape_string($this->db->link, $agent);

			$password =$this->fm->validation($data['password']);
			$password = mysqli_real_escape_string($this->db->link, $password);
			$rpassword =$this->fm->validation($data['rpassword']);
			$rpassword = mysqli_real_escape_string($this->db->link, $rpassword);
			$pin =$this->fm->validation($data['pin']);
			$pin = mysqli_real_escape_string($this->db->link, $pin);
			$role =$this->fm->validation($data['role']);
			$role = mysqli_real_escape_string($this->db->link, $role);
			 
			$permitted=array("jpg","png","gif","jpeg");
			$file_name=$file['image']['name']; //foyez.JPG
			$file_size=$file['image']['size'];
			$file_tmp= $file['image']['tmp_name'];
			$div=explode(".", $file_name);
			$file_ext=strtolower(end($div)); //jpg
			$unique_name=substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image="img/admin/".$unique_name; //uploads/unique_name
			//Checking Repeted Data Entry
			$select="SELECT * from tbl_admin WHERE username='$username'";
			$getAdmin=$this->db->select($select);
			if($getAdmin){
				return "<div class='alert alert-danger'><b>Sorry! </b> User already Added.</div>";
			}elseif($password!=$rpassword){
				return "<div class='alert alert-danger'><b>OOPS! </b> Repeated password not matched.</div>";
			}elseif($file_size>1048567){
				return "<div class='alert alert-danger'><b>File Size! </b> File size sshould be smaller</div>";
			}elseif(in_array($file_ext, $permitted)==false){
				return "<div class='alert alert-danger'><b>Invalid File! </b> Upload image only.</div>";
			}
			else{
				$adminUserame=Session::get('adminUsername');
				move_uploaded_file($file_tmp, $upload_image);
				$password=md5($password);
				$query="INSERT into tbl_admin(name, username,email, agent, phone, img,createdBy,createdAt,role,password, pin) 
				values('$name', '$username','$email','$agent','$phone','$upload_image','$adminUserame','$createdAt','$role','$password','$pin')";
				$addUser=$this->db->insert($query);
				if($addUser){
					return "<div class='alert alert-success'><b>Successfull! </b> User added successfully.</div>";
				}
				else {
					return "<div class='alert alert-danger'><b>OOPS! </b> User Can't be added.</div>";
				}
			}		 
		}
		public function userDetails(){
			$query="select * from tbl_admin ORDER BY adminid ASC";
			$details=$this->db->select($query);
			return $details;
	    }
	    public function agentDetails(){
			$query="select * from tbl_agent ORDER BY sl ASC";
			$details=$this->db->select($query);
			return $details;
	    }
	    public function accountDetails(){
			$query="select * from tbl_account ORDER BY id ASC";
			$details=$this->db->select($query);
			return $details;
	    }
	    public function addAgent($data){
	    	date_default_timezone_set("Asia/Dhaka");
            $createdAt= date("Y-m-d H:i:s");
			$name =$this->fm->validation($data['name']);
			$name = mysqli_real_escape_string($this->db->link, $name);
			$company =$this->fm->validation($data['company']);
			$company = mysqli_real_escape_string($this->db->link, $company);
			$email =$this->fm->validation($data['email']);
			$email = mysqli_real_escape_string($this->db->link, $email);
			$phone =$this->fm->validation($data['phone']);
			$phone = mysqli_real_escape_string($this->db->link, $phone);
			$address =$this->fm->validation($data['address']);
			$address = mysqli_real_escape_string($this->db->link, $address);
			//Checking Repeted Data Entry
			$select="SELECT * from tbl_agent WHERE name='$name' AND company='$company'";
			$getAgent=$this->db->select($select);
			if($getAgent){
				return "<div class='alert alert-danger'><b>Sorry! </b> Agent already Added.</div>";
			}else{
				$adminUsername=Session::get('adminUsername');
				$query="INSERT into tbl_agent(name, company, phone, email, address,createdAt,createdBy) 
				values('$name', '$company','$phone','$email','$address','$createdAt','$adminUsername')";
				$addAgent=$this->db->insert($query);
				if($addAgent){
					return "<div class='alert alert-success'><b>Successfull! </b> Agent added successfully.</div>";
				}
				else {
					return "<div class='alert alert-danger'><b>OOPS! </b> Agent Can't be added.</div>";
				}
			}		 
		}
		public function addAccount($data){
	    	date_default_timezone_set("Asia/Dhaka");
            $createdAt= date("Y-m-d H:i:s");
			$name =$this->fm->validation($data['name']);
			$name = mysqli_real_escape_string($this->db->link, $name);
			$company =$this->fm->validation($data['company']);
			$company = mysqli_real_escape_string($this->db->link, $company);
			$email =$this->fm->validation($data['email']);
			$email = mysqli_real_escape_string($this->db->link, $email);
			$phone =$this->fm->validation($data['phone']);
			$phone = mysqli_real_escape_string($this->db->link, $phone);
			$address =$this->fm->validation($data['address']);
			$address = mysqli_real_escape_string($this->db->link, $address);
			//Checking Repeted Data Entry
			$select="SELECT * from tbl_account WHERE name='$name' AND company='$company'";
			$getAgent=$this->db->select($select);
			if($getAgent){
				return "<div class='alert alert-danger'><b>Sorry! </b> Account already Added.</div>";
			}else{
				$adminUsername=Session::get('adminUsername');
				$query="INSERT into tbl_account(name, company, address,email,phone,createdAt,createdBy) 
				values('$name', '$company','$address','$email','$phone','$createdAt','$adminUsername')";
				$addAccount=$this->db->insert($query);
				if($addAccount){
					return "<div class='alert alert-success'><b>Successfull! </b> Account added successfully.</div>";
				}
				else {
					return "<div class='alert alert-danger'><b>OOPS! </b> Account Can't be added.</div>";
				}
			}		 
		}
		public function userInfoForEdit($userEditId){
		  $query="SELECT * from tbl_admin Where adminid='$userEditId'";
		  $details=$this->db->select($query);
		  return $details; 
		}
		public function userEdit($data, $file, $userEditId){
			$adminName=Session::get('adminName');
			date_default_timezone_set("Asia/Dhaka");
			$updatedAt= date("Y-m-d H:i:s");
			//Table and Billing Data
			$name =$this->fm->validation($data['name']);
			$name = mysqli_real_escape_string($this->db->link, $name);
			$username =$this->fm->validation($data['username']);
			$username = mysqli_real_escape_string($this->db->link, $username);
			$email =$this->fm->validation($data['email']);
			$email = mysqli_real_escape_string($this->db->link, $email); 
			$agent =$this->fm->validation($data['agent']);
			$agent = mysqli_real_escape_string($this->db->link, $agent);
			$npassword =$this->fm->validation($data['npassword']);
			$npassword = mysqli_real_escape_string($this->db->link, $npassword);
			$cnpassword =$this->fm->validation($data['cnpassword']);
			$cnpassword = mysqli_real_escape_string($this->db->link, $cnpassword);   
			$phone =$this->fm->validation($data['phone']);
			$phone = mysqli_real_escape_string($this->db->link, $phone);
			$role =$this->fm->validation($data['role']);
			$role = mysqli_real_escape_string($this->db->link, $role);
			$pin =$this->fm->validation($data['pin']);
			$pin = mysqli_real_escape_string($this->db->link, $pin);
			$permitted=array("jpg","png","gif","jpeg");
			$file_name=$file['image']['name']; //foyez.JPG
			$file_size=$file['image']['size'];
			$file_tmp= $file['image']['tmp_name'];
			$div=explode(".", $file_name);
			$file_ext=strtolower(end($div)); //jpg
			$unique_name=substr(md5(time()), 0, 10).'.'.$file_ext;
			$upload_image="img/admin/".$unique_name; //uploads/unique_name

			if($npassword!="" && $cnpassword!=""){
				if($npassword!=$cnpassword){
					return "<div class='alert alert-danger'><b>OOPS! </b> Repeated password not matched.</div>";
				}else{
					if(!empty($file_name)){
						if($file_size>1048567){
							return "<div class='alert alert-danger'><b>OOPS! </b> File's size should be less than 1 MB.</div>";
						}elseif(in_array($file_ext, $permitted)==false){
							return "<div class='alert alert-danger'><b>Invalid File! </b> 'Upload '.implode(', ',$permitted).'Only'</div>";
						}
						else{
							$select="SELECT * from tbl_admin where adminid='$userEditId'";
			 				$getData=$this->db->select($select);
			 				if($getData){
			 					while($delImg =$getData->fetch_assoc()){
						 			$img=$delImg['img'];
						 			unlink($img);
					 			}
						 	}
							move_uploaded_file($file_tmp, $upload_image);
							$password=md5($cnpassword);
							$query="UPDATE tbl_admin 
						          SET 
						          name='$name',
						          username='$username ',
						          email='$email',
						          agent='$agent ',
						          password='$password',
						          phone='$phone',
						          img='$upload_image',
						          lastUpdate='$updatedAt',
						          role='$role ',
						          pin='$pin'
						          Where adminid='$userEditId'";
							$updateUserInfo =$this->db->update($query);
							if($updateUserInfo){
						    	return "<div class='alert alert-success'><b>Successfull! </b> Data Updated successfully.</div>";
						    }
						    else {
						      return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
						    }
						}
					} //file not empty
					else{
						$password=md5($cnpassword);
						$query="UPDATE tbl_admin 
					          SET 
					          name='$name',
					          username='$username ',
					          email='$email',
					          agent='$agent ',
					          password='$password',
					          phone='$phone',
					          lastUpdate='$updatedAt',
					          role='$role ',
					          pin='$pin'
					          Where adminid='$userEditId'";
					    $updateUserInfo =$this->db->update($query);
					    if($updateUserInfo){
					    	return "<div class='alert alert-success'><b>Successfull! </b> Data Updated successfully.</div>";
					    }
					    else {
					      return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
					    }
					}
				}
			} //password not empty
			elseif($npassword=="" && $cnpassword==""){
				if(!empty($file_name)){
					if($file_size>1048567){
						return "<div class='alert alert-danger'><b>OOPS! </b> File's size should be less than 1 MB.</div>";
					}elseif(in_array($file_ext, $permitted)==false){
						return "<div class='alert alert-danger'><b>Invalid File! </b> 'Upload '.implode(', ',$permitted).'Only'</div>";
					}
					else{
						$select="SELECT * from tbl_admin where adminid='$userEditId'";
		 				$getData=$this->db->select($select);
		 				if($getData){
		 					while($delImg =$getData->fetch_assoc()){
					 			$img=$delImg['img'];
					 			unlink($img);
				 			}
					 	}
						move_uploaded_file($file_tmp, $upload_image);
						$password=md5($cnpassword);
						$query="UPDATE tbl_admin 
					          SET 
					          name='$name',
					          username='$username ',
					          email='$email',
					          agent='$agent ',
					          phone='$phone',
					          img='$upload_image',
					          lastUpdate='$updatedAt',
					          role='$role ',
					          pin='$pin'
					          Where adminid='$userEditId'";
						$updateUserInfo =$this->db->update($query);
						if($updateUserInfo){
					    	return "<div class='alert alert-success'><b>Successfull! </b> Data Updated successfully.</div>";
					    }
					    else {
					      return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
					    }
					}
				} //file not empty
				else{	
					$query="UPDATE tbl_admin 
				          SET 
				          name='$name',
				          username='$username ',
				          email='$email',
				          agent='$agent ',
				          phone='$phone',
				          lastUpdate='$updatedAt',
				          role='$role ',
				          pin='$pin'
				          Where adminid='$userEditId'";
				    $updateUserInfo =$this->db->update($query);
				    if($updateUserInfo){
				    	return "<div class='alert alert-success'><b>Successfull! </b> Data Updated successfully.</div>";
				    }
				    else {
				      return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
				    }
				}
			}
		}


	    public function userAgent($userEditId){
		  $query="SELECT * from tbl_admin WHERE adminid='$userEditId'";
		  $details=$this->db->select($query);
		  return $details; 
		}
		public function loginHistory($username){
		  $query="SELECT * from tbl_loginhistory WHERE username='$username' ORDER BY datee DESC";
		  $details=$this->db->select($query);
		  return $details; 
		}
		public function LoginStatus(){

		 $query="UPDATE tbl_loginhistory SET status = '0' WHERE id = (SELECT MAX(id) FROM tbl_loginhistory)"; 
		 $update=$this->db->update($query);
		}
		public function agentInfoForEdit($agentEditId){
	      $query="SELECT * from tbl_agent Where sl='$agentEditId'";
	      $details=$this->db->select($query);
	      return $details; 
	    }
	    public function accountInfoForEdit($accountEditId){
	      $query="SELECT * from tbl_account Where id='$accountEditId'";
	      $details=$this->db->select($query);
	      return $details; 
	    }
		public function agentEdit($data){
		  $adminUserame=Session::get('adminUsername');
	      date_default_timezone_set("Asia/Dhaka");
	      $updatedAt= date("Y-m-d H:i:s");
	      //Table and Billing Data
	      $name =$this->fm->validation($data['name']);
	      $name = mysqli_real_escape_string($this->db->link, $name);
	      $company =$this->fm->validation($data['company']);
	      $company = mysqli_real_escape_string($this->db->link, $company);
	      $phone =$this->fm->validation($data['phone']);
	      $phone = mysqli_real_escape_string($this->db->link, $phone);
	      $email =$this->fm->validation($data['email']);
	      $email = mysqli_real_escape_string($this->db->link, $email);
	      $address =$this->fm->validation($data['address']);
	      $address = mysqli_real_escape_string($this->db->link, $address);
	      //Shipper's Info Update
	      $query="UPDATE tbl_agent 
	              SET 
	              name='$name',
	              company='$company',
	              phone='$phone ',
	              email='$email',
	              address='$address'
	              Where sl='$agentEditId'";
	      $updateAgentInfo =$this->db->update($query);
	      if($updateAgentInfo){
	        return "<div class='alert alert-success'><b>Successfull! </b> Data Updated successfully.</div>";
	        }
	        else {
	          return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
	        }
	         
	    }
	    public function accountEdit($data, $accountEditId){
		  $adminUserame=Session::get('adminUsername');
	      date_default_timezone_set("Asia/Dhaka");
	      $updatedAt= date("Y-m-d H:i:s");
	      //Table and Billing Data
	      $name =$this->fm->validation($data['name']);
	      $name = mysqli_real_escape_string($this->db->link, $name);
	      $company =$this->fm->validation($data['company']);
	      $company = mysqli_real_escape_string($this->db->link, $company);
	      $phone =$this->fm->validation($data['phone']);
	      $phone = mysqli_real_escape_string($this->db->link, $phone);
	      $email =$this->fm->validation($data['email']);
	      $email = mysqli_real_escape_string($this->db->link, $email);
	      $address =$this->fm->validation($data['address']);
	      $address = mysqli_real_escape_string($this->db->link, $address);
	      //Shipper's Info Update
	      $query="UPDATE tbl_account 
	              SET 
	              name='$name',
	              company='$company',
	              address='$address',
	              email='$email',
	              phone='$phone',
	              editedAt='$updatedAt',
	              editedBy='$adminUserame'
	              Where id='$accountEditId'";
	      $updateAccountInfo =$this->db->update($query);
	      if($updateAccountInfo){
	        return "<div class='alert alert-success'><b>Successfull! </b> Data Updated successfully.</div>";
	        }
	        else {
	          return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
	        }
	         
	    }
	    public function delUser($userDeleteId){
			$userDeleteId=$this->fm->validation($userDeleteId);
			$serviceDeleteId= mysqli_real_escape_string($this->db->link, $userDeleteId); 
			$getAdmin="SELECT * from tbl_admin WHERE adminid='$userDeleteId'";
			$getAdmin=$this->db->select($getAdmin);
			if($getAdmin){
				while($result=$getAdmin->fetch_assoc()){
					$username=$result['username'];
					$role=trim($result['role']);
				}
			}
			if($role=="Super Admin"){
				return "<div class='alert alert-danger'><b>Sorry! </b> Super Admin can't be deleted.</div>";
			}else{
				$query="DELETE from tbl_admin WHERE adminid='$userDeleteId'";
				$deleteService=$this->db->delete($query);
				if($deleteService){
				return "<div class='alert alert-success'><b>Successfull! </b> User Deleted successfully.</div>";
				}
				else {
				 return "<div class='alert alert-danger'><b>OOPS! </b> User Can't be Deleted.</div>";
				}
			}
			 
	    }
        public function delAgent($agentDeleteId){
		  $agentDeleteId=$this->fm->validation($agentDeleteId);
		  $agentDeleteId= mysqli_real_escape_string($this->db->link, $agentDeleteId); 
		  $query="DELETE from tbl_agent WHERE sl='$agentDeleteId'";
		  $deleteAgent=$this->db->delete($query);
		  if($deleteAgent){
		   return "<div class='alert alert-success'><b>Successfull! </b> Agent Deleted successfully.</div>";
		  }
		  else {
		     return "<div class='alert alert-danger'><b>OOPS! </b> Agent Can't be Deleted.</div>";
		  }
		}
		public function delAccount($accountDeleteId){
		  $accountDeleteId=$this->fm->validation($accountDeleteId);
		  $accountDeleteId= mysqli_real_escape_string($this->db->link, $accountDeleteId); 
		  $query="DELETE from tbl_account WHERE id='$accountDeleteId'";
		  $deleteAgent=$this->db->delete($query);
		  if($deleteAgent){
		   return "<div class='alert alert-success'><b>Successfull! </b> Account Deleted successfully.</div>";
		  }
		  else {
		     return "<div class='alert alert-danger'><b>OOPS! </b> Account Can't be Deleted.</div>";
		  }
		}
		
	}
	 
?>s
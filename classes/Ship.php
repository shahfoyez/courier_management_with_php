<?php
  $filepath= realpath(dirname(__FILE__));
  include_once ($filepath.'/../database/Database.php');
  include_once ($filepath.'/../helpers/Format.php');
?>
<?php
  class Ship{
    private $db;
    private $fm;
    public function __construct(){  //object in constructor can be used within the whole class
      $this->db=new Database();
      $this->fm=new Format();
    }
    public function shipInsert($data){
      $adminUsername=Session::get('adminName');
      //Table and Billing Data
      $reference =$this->fm->validation($data['reference']);
      $reference = mysqli_real_escape_string($this->db->link, $reference);
      $pieces =$this->fm->validation($data['pieces']);
      $pieces = mysqli_real_escape_string($this->db->link, $pieces);
      $service =$this->fm->validation($data['service']);
      $service = mysqli_real_escape_string($this->db->link, $service);
      $agent =$this->fm->validation($data['agent']);
      $agent = mysqli_real_escape_string($this->db->link, $agent);
      $weight =$this->fm->validation($data['weight']);
      $weight = mysqli_real_escape_string($this->db->link, $weight);
      $goods =$this->fm->validation($data['goods']);
      $goods = mysqli_real_escape_string($this->db->link, $goods);
      $comment =$this->fm->validation($data['comment']);
      $comment = mysqli_real_escape_string($this->db->link, $comment);
      $totalBill =$this->fm->validation($data['totalbill']);
      $totalBill = mysqli_real_escape_string($this->db->link, $totalBill);
      $dueAmount =$this->fm->validation($data['dueamount']);
      $dueAmount = mysqli_real_escape_string($this->db->link, $dueAmount);
      $status =$this->fm->validation($data['status']);
      $status = mysqli_real_escape_string($this->db->link, $status);
      $datee =$this->fm->validation($data['datee']);
      $datee = mysqli_real_escape_string($this->db->link, $datee);
      $receiver =$this->fm->validation($data['receiver']);
      $receiver = mysqli_real_escape_string($this->db->link, $receiver);


      //Shippers Data
      $shipperName =$this->fm->validation($data['sname']);
      $shipperName = mysqli_real_escape_string($this->db->link, $shipperName);
      $shipperAdd1 =$this->fm->validation($data['saddr1']);
      $shipperAdd1 = mysqli_real_escape_string($this->db->link, $shipperAdd1); 
      $shipperAdd2 =$this->fm->validation($data['saddr2']);
      $shipperAdd2       = mysqli_real_escape_string($this->db->link, $shipperAdd2); 
      $shipperAdd3 =$this->fm->validation($data['saddr3']);
      $shipperAdd3       = mysqli_real_escape_string($this->db->link, $shipperAdd3);
      $shipperAdd4 =$this->fm->validation($data['saddr4']);
      $shipperAdd4       = mysqli_real_escape_string($this->db->link, $shipperAdd4); 
      $shipperPhone =$this->fm->validation($data['sphone']);
      $shipperPhone       = mysqli_real_escape_string($this->db->link, $shipperPhone); 
      $shipperCity =$this->fm->validation($data['scity']);
      $shipperCity       = mysqli_real_escape_string($this->db->link, $shipperCity); 
      $shipperCountry =$this->fm->validation($data['scountry']);
      $shipperCountry       = mysqli_real_escape_string($this->db->link, $shipperCountry); 
      $shipperZip =$this->fm->validation($data['szip']);
      $shipperZip    = mysqli_real_escape_string($this->db->link, $shipperZip);

      //Consignee Data
      $consigneeName =$this->fm->validation($data['cname']);
      $consigneeName = mysqli_real_escape_string($this->db->link, $consigneeName);
      $consigneeAdd1 =$this->fm->validation($data['caddr1']);
      $consigneeAdd1       = mysqli_real_escape_string($this->db->link, $consigneeAdd1); 
      $consigneeAdd2 =$this->fm->validation($data['caddr2']);
      $consigneeAdd2       = mysqli_real_escape_string($this->db->link, $consigneeAdd2); 
      $consigneeAdd3 =$this->fm->validation($data['caddr3']);
      $consigneeAdd3       = mysqli_real_escape_string($this->db->link, $consigneeAdd3);
      $consigneeAdd4 =$this->fm->validation($data['caddr4']);
      $consigneeAdd4       = mysqli_real_escape_string($this->db->link, $consigneeAdd4); 
      $consigneePhone =$this->fm->validation($data['cphone']);
      $consigneePhone       = mysqli_real_escape_string($this->db->link, $consigneePhone); 
      $consigneeCity =$this->fm->validation($data['ccity']);
      $consigneeCity       = mysqli_real_escape_string($this->db->link, $consigneeCity); 
      $consigneeCountry =$this->fm->validation($data['ccountry']);
      $consigneeCountry       = mysqli_real_escape_string($this->db->link, $consigneeCountry); 
      $consigneeZip =$this->fm->validation($data['czip']);
      $consigneeZip       = mysqli_real_escape_string($this->db->link, $consigneeZip);
          
      $getData="SELECT * from tbl_billinginfo where reference=$reference";
      $shipperInfo=$this->db->select($getData);
      if($shipperInfo){
        return "<div class='alert alert-danger'><b>OOPS! </b> Please Select a different reference number.</div>";
      }else{
           //Shipper's Info Insert
          $shipperInsert="INSERT into tbl_shipperinfo(reference,sname, sAddr1,sAddr2, sAddr3, sAddr4, sphone, scity, scountry, szip) 
            values('$reference','$shipperName', '$shipperAdd1','$shipperAdd2','$shipperAdd3','$shipperAdd4','$shipperPhone','$shipperCity','$shipperCountry','$shipperZip')";
          $shipperInfoInsert=$this->db->insert($shipperInsert);

          //Cosignee's Info Insert
          $Cosigneeinsert="INSERT into tbl_consigneeinfo(reference,cname, cAddr1,cAddr2, cAddr3, cAddr4, cphone, ccity, ccountry, czip) 
            values('$reference','$consigneeName', '$consigneeAdd1','$consigneeAdd2','$consigneeAdd3','$consigneeAdd4','$consigneePhone','$consigneeCity','$consigneeCountry','$consigneeZip')";
          $consigneeInfoInsert=$this->db->insert($Cosigneeinsert);

          //Billing Info Insert
          $billingInsert="INSERT into tbl_billinginfo(reference,pieces, service,agent, receiver, weight, goods, comment, tamount, damount, userAdmin, status, datee) 
            values('$reference','$pieces', '$service','$agent','$receiver','$weight','$goods','$comment','$totalBill','$dueAmount','$adminUsername','$status','$datee')";
          $billingInfoInsert=$this->db->insert($billingInsert);


          if($shipperInfoInsert && $consigneeInfoInsert && $billingInfoInsert){
            return "<div class='alert alert-success'><b>Successfull! </b> Data Inserted successfully.</div>";
          }
          else {
            return "<div class='alert alert-danger'><b>OOPS! </b> Data Can not be inserted.</div>";
          }

      }
        
         
    }
     
    public function shipingDetails(){
      $query="SELECT  s.*, c.*, b.*
      From tbl_shipperinfo as s, tbl_consigneeinfo as c, tbl_billinginfo as b Where s.awb=c.awb AND c.awb=b.awb
          order by s.awb ASC";
      $details=$this->db->select($query);
      return $details;
       
    }
    public function receiverDetails(){
      $query="select * from tbl_receiver ORDER BY receiverid ASC";
      $details=$this->db->select($query);
      return $details; 
    }
    public function addReceiver($data){
      $id =$this->fm->validation($data['id']);
      $id = mysqli_real_escape_string($this->db->link, $id);
      $name =$this->fm->validation($data['name']);
      $name = mysqli_real_escape_string($this->db->link, $name);
      $email =$this->fm->validation($data['email']);
      $email = mysqli_real_escape_string($this->db->link, $email);
      $phone =$this->fm->validation($data['phone']);
      $phone = mysqli_real_escape_string($this->db->link, $phone);
      $select="SELECT * from tbl_receiver WHERE receiverid='$id'";
      $getReceiver=$this->db->select($select);
      if($getReceiver){
        return 2;
      }else{
        $addReceiver="INSERT into tbl_receiver(receiverid, name, email, phone) 
          values('$id','$name', '$email','$phone')";
        $receiverInsert=$this->db->insert($addReceiver);
        if($receiverInsert){
          return 1;
        }
        else {
          return 0;
        }
      }
    }
    public function addService($data){
      $name =$this->fm->validation($data['name']);
      $name = mysqli_real_escape_string($this->db->link, $name);
      $label =$this->fm->validation($data['label']);
      $label = mysqli_real_escape_string($this->db->link, $label);
      $company =$this->fm->validation($data['company']);
      $company = mysqli_real_escape_string($this->db->link, $company);
      $select="SELECT * from tbl_service WHERE name='$name' AND label='$label' AND company='$company'";
      $getService=$this->db->select($select);
      if($getService){
         return "<div class='alert alert-danger'><b>Sorry! </b> Service already added.</div>";
      }else{
        $addService="INSERT into tbl_service(name, label, company) 
          values('$name', '$label','$company')";
        $serviceAdd=$this->db->insert($addService);
        if($serviceAdd){
            return "<div class='alert alert-success'><b>Successfull! </b> Data Updated successfully.</div>";
        }
        else {
          return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
        }
      }
    }
    public function serviceDetails(){
      $query="select * from tbl_service ORDER BY sl ASC";
      $details=$this->db->select($query);
      return $details;
       
    }
    public function addCompany($data){
      $name =$this->fm->validation($data['name']);
      $name = mysqli_real_escape_string($this->db->link, $name);
      $keyy =$this->fm->validation($data['keyy']);
      $keyy = mysqli_real_escape_string($this->db->link, $keyy);
      $link =$this->fm->validation($data['link']);
      $link = mysqli_real_escape_string($this->db->link, $link);

      $select="SELECT * from tbl_company WHERE keyy='$keyy' AND name='$name'";
      $getCompany=$this->db->select($select);
      if($getCompany){
       return "<div class='alert alert-danger'><b>Sorry! </b> Company already added.</div>";
      }else{
        $addCompany="INSERT into tbl_company(keyy,name,link) 
          values('$keyy', '$name','$link')";
        $companyAdd=$this->db->insert($addCompany);
        if($companyAdd){
            return "<div class='alert alert-success'><b>Successfull! </b> Company added successfully.</div>";
        }
        else {
          return "<div class='alert alert-danger'><b>Sorry! </b> Company can not be added.</div>";
        }
      }
    }
    public function companyDetails(){
      $query="select * from tbl_company ORDER BY sl ASC";
      $details=$this->db->select($query);
      return $details; 
    }
    public function shipingInfoForEdit($archiveEditId){
      $query="SELECT  s.*, c.*, b.*
      FROM tbl_shipperinfo as s, tbl_consigneeinfo as c, tbl_billinginfo as b Where s.reference='$archiveEditId' AND c.reference='$archiveEditId' AND b.reference='$archiveEditId' ORDER BY s.reference ASC";
      $details=$this->db->select($query);
      return $details; 
    }
    public function companyInfoForEdit($companyEditId){
      $query="SELECT * from tbl_company Where sl='$companyEditId'";
      $details=$this->db->select($query);
      return $details; 
    }
    public function serviceInfoForEdit($serviceEditId){
      $query="SELECT * from tbl_service Where sl='$serviceEditId'";
      $details=$this->db->select($query);
      return $details; 
    }
    public function receiverInfoForEdit($receiverEditId){
      $query="SELECT * from tbl_receiver Where receiverid='$receiverEditId'";
      $details=$this->db->select($query);
      return $details; 
    }
    public function getServices(){
      $query="SELECT * from tbl_service ORDER BY sl ASC";
      $details=$this->db->select($query);
      return $details; 
    }
    public function getCompany(){
      $query="SELECT * from tbl_company ORDER BY sl ASC";
      $details=$this->db->select($query);
      return $details; 
    }
    public function getAgents(){
      $query="SELECT * from tbl_agent ORDER BY sl ASC";
      $details=$this->db->select($query);
      return $details; 
    }
    public function shipingService($archiveEditId){
      $query="SELECT * from tbl_billinginfo WHERE reference='$archiveEditId'";
      $details=$this->db->select($query);
      return $details; 
    }
     public function shipingCompany($archiveViewId){
      $query="SELECT * from tbl_billinginfo WHERE reference='$archiveViewId'";
      $details=$this->db->select($query);
      return $details; 
    }
    public function shipingAWB($awb){
      $query="SELECT * from tbl_billinginfo WHERE awb='$awb'";
      $details=$this->db->select($query);
      return $details; 
    }
    public function shipingAgent($archiveEditId){
      $query="SELECT * from tbl_billinginfo WHERE reference='$archiveEditId'";
      $details=$this->db->select($query);
      return $details; 
    }
     public function reciverInShipping($archiveEditId){

      $query="SELECT * from tbl_billinginfo WHERE reference='$archiveEditId'";
      $details=$this->db->select($query);
      return $details; 
    }
    public function shippingUpdateHistory($awb){
      $query="SELECT * from tbl_shippingupdatehistory WHERE awb='$awb'";
      $details=$this->db->select($query);
      return $details; 
    }

    public function shipingEdit($data, $archiveEditId){
      $adminName=Session::get('adminName');
      date_default_timezone_set("Asia/Dhaka");
      $updatedAt= date("Y-m-d H:i:s");
      //Table and Billing Data
      $reference =$this->fm->validation($data['reference']);
      $reference = mysqli_real_escape_string($this->db->link, $reference);
      $pieces =$this->fm->validation($data['pieces']);
      $pieces = mysqli_real_escape_string($this->db->link, $pieces);
      $service =$this->fm->validation($data['service']);
      $service = mysqli_real_escape_string($this->db->link, $service);
      $agent =$this->fm->validation($data['agent']);
      $agent = mysqli_real_escape_string($this->db->link, $agent);
      $weight =$this->fm->validation($data['weight']);
      $weight = mysqli_real_escape_string($this->db->link, $weight);
      $goods =$this->fm->validation($data['goods']);
      $goods = mysqli_real_escape_string($this->db->link, $goods);
      $comment =$this->fm->validation($data['comment']);
      $comment = mysqli_real_escape_string($this->db->link, $comment);


      //Billing Data
      $totalBill =$this->fm->validation($data['totalbill']);
      $totalBill = mysqli_real_escape_string($this->db->link, $totalBill);
      $dueAmount =$this->fm->validation($data['dueamount']);
      $dueAmount = mysqli_real_escape_string($this->db->link, $dueAmount);
      $status =$this->fm->validation($data['status']);
      $status = mysqli_real_escape_string($this->db->link, $status);
      $datee =$this->fm->validation($data['datee']);
      $datee = mysqli_real_escape_string($this->db->link, $datee);
      $receiver =$this->fm->validation($data['receiver']);
      $receiver = mysqli_real_escape_string($this->db->link, $receiver);


      //Shippers Data
      $shipperName =$this->fm->validation($data['sname']);
      $shipperName = mysqli_real_escape_string($this->db->link, $shipperName);
      $shipperAdd1 =$this->fm->validation($data['saddr1']);
      $shipperAdd1 = mysqli_real_escape_string($this->db->link, $shipperAdd1); 
      $shipperAdd2 =$this->fm->validation($data['saddr2']);
      $shipperAdd2       = mysqli_real_escape_string($this->db->link, $shipperAdd2); 
      $shipperAdd3 =$this->fm->validation($data['saddr3']);
      $shipperAdd3       = mysqli_real_escape_string($this->db->link, $shipperAdd3);
      $shipperAdd4 =$this->fm->validation($data['saddr4']);
      $shipperAdd4       = mysqli_real_escape_string($this->db->link, $shipperAdd4); 
      $shipperPhone =$this->fm->validation($data['sphone']);
      $shipperPhone       = mysqli_real_escape_string($this->db->link, $shipperPhone); 
      $shipperCity =$this->fm->validation($data['scity']);
      $shipperCity       = mysqli_real_escape_string($this->db->link, $shipperCity); 
      $shipperCountry =$this->fm->validation($data['scountry']);
      $shipperCountry       = mysqli_real_escape_string($this->db->link, $shipperCountry); 
      $shipperZip =$this->fm->validation($data['szip']);
      $shipperZip    = mysqli_real_escape_string($this->db->link, $shipperZip);

      //Consignee Data
      $consigneeName =$this->fm->validation($data['cname']);
      $consigneeName = mysqli_real_escape_string($this->db->link, $consigneeName);
      $consigneeAdd1 =$this->fm->validation($data['caddr1']);
      $consigneeAdd1       = mysqli_real_escape_string($this->db->link, $consigneeAdd1); 
      $consigneeAdd2 =$this->fm->validation($data['caddr2']);
      $consigneeAdd2       = mysqli_real_escape_string($this->db->link, $consigneeAdd2); 
      $consigneeAdd3 =$this->fm->validation($data['caddr3']);
      $consigneeAdd3       = mysqli_real_escape_string($this->db->link, $consigneeAdd3);
      $consigneeAdd4 =$this->fm->validation($data['caddr4']);
      $consigneeAdd4       = mysqli_real_escape_string($this->db->link, $consigneeAdd4); 
      $consigneePhone =$this->fm->validation($data['cphone']);
      $consigneePhone       = mysqli_real_escape_string($this->db->link, $consigneePhone); 
      $consigneeCity =$this->fm->validation($data['ccity']);
      $consigneeCity       = mysqli_real_escape_string($this->db->link, $consigneeCity); 
      $consigneeCountry =$this->fm->validation($data['ccountry']);
      $consigneeCountry       = mysqli_real_escape_string($this->db->link, $consigneeCountry); 
      $consigneeZip =$this->fm->validation($data['czip']);
      $consigneeZip       = mysqli_real_escape_string($this->db->link, $consigneeZip);
          
      //Shipper's Info Update
      $query="UPDATE tbl_shipperinfo 
              SET 
              reference='$reference',
              sname='$shipperName',
              sAddr1='$shipperAdd1 ',
              sAddr2='$shipperAdd2',
              sAddr3='$shipperAdd3',
              sAddr4='$shipperAdd4',
              sphone='$shipperPhone',
              scity='$shipperCity',
              scountry='$shipperCountry',
              szip='$shipperZip'
              Where reference='$archiveEditId'";
      $updateShipperInfo =$this->db->update($query);


      //Cosignee's Info Update
      $query="UPDATE tbl_consigneeinfo
              SET 
              reference='$reference',
              cname='$consigneeName',
              cAddr1='$consigneeAdd1 ',
              cAddr2='$consigneeAdd2',
              cAddr3='$consigneeAdd3',
              cAddr4='$consigneeAdd4',
              cphone='$consigneePhone',
              ccity='$consigneeCity',
              ccountry='$consigneeCountry',
              czip='$consigneeZip'
              Where reference='$archiveEditId'";
      $consigneeInfoUpdate =$this->db->update($query);


      //Billing Info Update
       $query="UPDATE tbl_billinginfo 
              SET 
              reference='$reference',
              pieces='$pieces',
              service='$service ',
              agent='$agent',
              receiver='$receiver',
              weight='$weight',
              goods='$goods',
              comment='$comment',
              tamount='$totalBill',
              damount='$dueAmount',
              userAdmin='$adminName',
              status='$status',
              datee='$datee'
              Where reference='$archiveEditId'";
      $billingInfoUpdate =$this->db->update($query);

      //For History Insert
      $awbQuery="SELECT * from tbl_shipperinfo where reference='$archiveEditId'";
      $awbData=$this->db->select($awbQuery);
      if($awbData){
        while($awbResult=$awbData->fetch_assoc()){
          $awb=$awbResult['awb'];
        }
      }
      $historyInsert="INSERT into tbl_shipingedithistory(awb,reference,editedAt, editedBy) 
        values('$awb','$reference','$updatedAt','$adminName')";
      $historyInfoInsert=$this->db->insert($historyInsert);


      if($updateShipperInfo && $consigneeInfoUpdate && $billingInfoUpdate){
        return "<div class='alert alert-success'><b>Successfull! </b> Data successfully.</div>";
        }
        else {
          return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
        }
         
    }
    public function companyEdit($data, $companyEditId){
      //Table and Billing Data
      $keyy =$this->fm->validation($data['keyy']);
      $keyy = mysqli_real_escape_string($this->db->link, $keyy);
      $name =$this->fm->validation($data['name']);
      $name = mysqli_real_escape_string($this->db->link, $name);
      $link =$this->fm->validation($data['link']);
      $link = mysqli_real_escape_string($this->db->link, $link);     
      //Shipper's Info Update
      $query="UPDATE tbl_company 
              SET 
              keyy='$keyy',
              name='$name ',
              link='$link'
              Where sl='$companyEditId'";
      $updateCompanyInfo =$this->db->update($query);
      if($updateCompanyInfo){
        return "<div class='alert alert-success'><b>Successfull! </b> Data Updated successfully.</div>";
        }
        else {
          return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
        }
         
    }
    public function serviceEdit($data, $serviceEditId){
      //Table and Billing Data
      $name =$this->fm->validation($data['name']);
      $name = mysqli_real_escape_string($this->db->link, $name);
      $label =$this->fm->validation($data['label']);
      $label = mysqli_real_escape_string($this->db->link, $label);
      $company =$this->fm->validation($data['company']);
      $company = mysqli_real_escape_string($this->db->link, $company);     
      //Shipper's Info Update
      $query="UPDATE tbl_service 
              SET 
              name='$name',
              label='$label ',
              company='$company'
              Where sl='$serviceEditId'";
      $updateServiceInfo =$this->db->update($query);
      if($updateServiceInfo){
        return "<div class='alert alert-success'><b>Successfull! </b> Data Updated successfully.</div>";
        }
        else {
          return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
        }
         
    }
    ////////Archive Update
    public function archiveUpdate($data, $awb){
      $adminName=Session::get('adminName');
      date_default_timezone_set("Asia/Dhaka");
      $updatedAt= date("Y-m-d H:i:s");

      $reference =$this->fm->validation($data['reference']);
      $reference = mysqli_real_escape_string($this->db->link, $reference);
      $company =$this->fm->validation($data['company']);
      $company = mysqli_real_escape_string($this->db->link, $company);
      $location =$this->fm->validation($data['location']);
      $location = mysqli_real_escape_string($this->db->link, $location);
      $activity =$this->fm->validation($data['activity']);
      $activity = mysqli_real_escape_string($this->db->link, $activity); 

      $bquery="UPDATE tbl_billinginfo 
              SET 
              company='$company',
              location='$location',
              activity='$activity'
              Where awb='$awb'";
      $updateBillingInfo =$this->db->update($bquery);

      $shippingHistoryInsert="INSERT into tbl_shippingupdatehistory(awb,reference,company, location,activity, datee) 
            values('$awb', '$reference','$company','$location','$activity','$updatedAt')";
      $shipperInfoInsert=$this->db->insert($shippingHistoryInsert);

      if($shipperInfoInsert AND $updateBillingInfo){
        return "<div class='alert alert-success'><b>Successfull! </b> Data Updated successfully.</div>";
      }
      else {
        return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
      } 
    }
    public function receiverEdit($data, $receiverEditId){
      //Table and Billing Data
      $name =$this->fm->validation($data['name']);
      $name = mysqli_real_escape_string($this->db->link, $name);
      $email =$this->fm->validation($data['email']);
      $email = mysqli_real_escape_string($this->db->link, $email);
      $phone =$this->fm->validation($data['phone']);
      $phone = mysqli_real_escape_string($this->db->link, $phone);     
      //Shipper's Info Update
      $query="UPDATE tbl_receiver 
              SET 
              name='$name',
              email='$email ',
              phone='$phone'
              Where receiverid='$receiverEditId'";
      $updateReceiverInfo =$this->db->update($query);
      if($updateReceiverInfo){
        return "<div class='alert alert-success'><b>Successfull! </b> Data Updated successfully.</div>";
        }
        else {
          return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Updated.</div>";
        }
         
    }
    //DELETE
  public function delCompany($companyDeleteId){
      $companyDeleteId=$this->fm->validation($companyDeleteId);
      $companyDeleteId= mysqli_real_escape_string($this->db->link, $companyDeleteId); 
      $query="DELETE from tbl_company WHERE sl='$companyDeleteId'";
      $deleteCompany=$this->db->delete($query);
      if($deleteCompany){
       return "<div class='alert alert-success'><b>Successfull! </b> Company Deleted successfully.</div>";
      }
      else {
         return "<div class='alert alert-danger'><b>OOPS! </b> Company Can't be Deleted.</div>";
      }
    }
     public function delArchiveData($archiveDeleteId){
      $archiveDeleteId=$this->fm->validation($archiveDeleteId);
      $archiveDeleteId= mysqli_real_escape_string($this->db->link, $archiveDeleteId); 
      $squery="DELETE from tbl_shipperinfo WHERE reference='$archiveDeleteId'";
      $deleteShipper=$this->db->delete($squery);
      $cquery="DELETE from tbl_consigneeinfo WHERE reference='$archiveDeleteId'";
      $deleteConsignee=$this->db->delete($cquery);
      $bquery="DELETE from tbl_billinginfo WHERE reference='$archiveDeleteId'";
      $deleteBilling=$this->db->delete($bquery);

      if($deleteShipper && $deleteConsignee &&  $deleteBilling){
       return "<div class='alert alert-success'><b>Successfull! </b> Archive Data Deleted successfully.</div>";
      }
      else {
         return "<div class='alert alert-danger'><b>OOPS! </b> Data Can't be Deleted.</div>";
      }
    }
    public function delService($serviceDeleteId){
      $serviceDeleteId=$this->fm->validation($serviceDeleteId);
      $serviceDeleteId= mysqli_real_escape_string($this->db->link, $serviceDeleteId); 
      $query="DELETE from tbl_service WHERE sl='$serviceDeleteId'";
      $deleteService=$this->db->delete($query);
      if($deleteService){
       return "<div class='alert alert-success'><b>Successfull! </b> Service Deleted successfully.</div>";
      }
      else {
         return "<div class='alert alert-danger'><b>OOPS! </b> Service Can't be Deleted.</div>";
      }
    }
     public function delReceiver($receiverDeleteId){
      $receiverDeleteId=$this->fm->validation($receiverDeleteId);
      $receiverDeleteId= mysqli_real_escape_string($this->db->link, $receiverDeleteId); 
      $query="DELETE from tbl_receiver WHERE receiverid='$receiverDeleteId'";
      $deleteReceiver=$this->db->delete($query);
      if($deleteReceiver){
       return "<div class='alert alert-success'><b>Successfull! </b> Receiver Deleted successfully.</div>";
      }
      else {
         return "<div class='alert alert-danger'><b>OOPS! </b> Receiver Can't be Deleted.</div>";
      }
    }
  }
?>
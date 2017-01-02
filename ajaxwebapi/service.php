<?php
error_reporting(E_ERROR | E_PARSE);
include('db.php');
include('JsonMessage.php');
$jsonmsg=new JsonMessage();
$jsonmsg->msgtype="error";
$jsonmsg->desc="Error Occoured!Unknown Reason";
function httpPost($url,$params)
{
    $postData = '';
    //create name value pairs seperated by &
    foreach($params as $k => $v)
    {
        $postData .= $k . '='.$v.'&';
    }
    rtrim($postData, '&');

    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, count($postData));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    $output=curl_exec($ch);

    curl_close($ch);
  //  return $output;

}
function sendMessage($text,$mobile){
    $url = 'http://trans.smsfresh.co/api/sendmsg.php';
    $fields = array(
        'user' => 'magarsham',
        'pass' => 'festivito5555',
        'sender' => 'HOMPLN' ,
        'phone' => $mobile,
        'text' => $text,
        'priority' => 'ndnd',
        'stype' => 'normal'
    );
    echo httpPost($url,$fields);
}


if($_SERVER['REQUEST_METHOD']=="POST") {
    $act = $_POST['act'];

    if ($act == "addpost") {
        $property_name = $_POST['property_name'];
        $city = $_POST['city'];
        $locality = $_POST['locality'];
        $address = $_POST['address'];
        $landmark = $_POST['landmark'];
        $transaction_type = $_POST['transaction_type'];
        $property_type = $_POST['property_type'];
        $bedroom = $_POST['bedroom'];
        $possession_date = $_POST['possession_date'];
        $possession_date = date('Y-m-d', strtotime($possession_date));
        $price = $_POST['price'];
        $area = $_POST['area'];
        $rate_sqft = $_POST['rate_sqft'];
        $floor_no = $_POST['floor_no'];
        $amenities = $_POST['amenities'];
        $airport = $_POST['airport'];
        $train = $_POST['train'];
        $bustop = $_POST['bustop'];
        $school = $_POST['school'];
        $hospital = $_POST['hospital'];
        $resto = $_POST['resto'];
        $bank = $_POST['bank'];
        $property_details = $_POST['property_details'];
        $builder_name = $_POST['builder_name'];
        $type = $_POST['type'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $landline = $_POST['landline'];
        $about_builder = $_POST['about_builder'];
        $availability = $_POST['availability'];
        $property_list=$_POST['hfprotable'];
        $file = $_POST['file'];
        $file1 = $_POST['file1'];
        $user_id = $_POST['user_id'];
        try {
            $db = getDB();
            $name=$_FILES['file']['name'];
            $tmp_name=$_FILES['file']['tmp_name'];
            if(isset($name))
            {
                if(!empty($name))
                {
                    $location="../image/";
                    $path=$location.$name;
                    move_uploaded_file($tmp_name,$location.$name);
                }
            }
            $name=$_FILES['file1']['name'];
            $tmp_name=$_FILES['file1']['tmp_name'];
            if(isset($name))
            {
                if(!empty($name))
                {
                    $location="../image/";
                    $path1=$location.$name;
                    move_uploaded_file($tmp_name,$location.$name);
                }
            }
            $Rawjson=rawurldecode($_POST['hfprotable']);

            $Protable = json_decode($Rawjson, true);
            $property_type='';$ptypearr=array();
            $bedroom='';$bdarr=array();
            $transaction_type='';$trtypearr=array();
            $price='';$prarr=array();
            $possession='';$poarr=array();
            $area='';$arearr=array();
            $rate_sqft='';$rsarr=array();
            $floor_no='';$floorarr=array();
  //          print_r($Protable);
            foreach($Protable as $key => $value)
            {
                array_push($ptypearr,$value[property_type]);
                array_push($bdarr,$value[bedroom]);
                array_push($trtypearr,$value[transaction_type]);
                array_push($prarr,$value[price]);
                array_push($poarr,$value[possession]);
                array_push($arearr,$value[area]);
                array_push($rsarr,$value[rate_sqft]);
                array_push($floorarr,$value[floor_no]);
            }
//            print_r($ptypearr);
            $property_type = implode (" ,", $ptypearr);
            $bedroom = implode (" ,", $bdarr);
            $transaction_type = implode (" ,", $trtypearr);
            $price = implode (" ,", $prarr);
            $possession = implode (" ,", $poarr);
            $area = implode (" ,", $arearr);
            $rate_sqft = implode (" ,", $rsarr);
            $floor_no = implode (" ,", $floorarr);

            $confirm_code=md5(uniqid(rand()));
            $sql = "INSERT INTO temp_members_db (confirm_code,property_name,city,locality,address,landmark,property_type,transaction_type,bedroom,possession,price,area_sqft,rate_sqft,floor_no,amenities,airport,train,bustop,school,hospital,resto,bank,property_details,name,owner_type,email,mob,landline,about_builder,date,photos,logo,user_id,availability,property_list)
VALUES ('$confirm_code','$property_name','$city','$locality','$address','$landmark','$property_type','$transaction_type','$bedroom','$possesion','$price','$area','$rate_sqft','$floor_no','$amenities','$airport','$train','$bustop','$school','$hospital','$resto','$bank','$property_details','$builder_name','$type','$email','$mobile','$landline','$about_builder',now(),'$path','$path1','$user_id','$availability','$property_list')";
         //  echo $sql;
            $stmt = $db->query($sql);

            $to=$_POST['email'];
            // Your subject
            $subject="Your confirmation link here";
            // From
            $header="from: Homeplanetary";
            // Your message
            $message="Your Comfirmation link \r\n";
            $message.="Click on this link to activate your Property \r\n";
            $message.="http://homeplanetary.com/confirmation.php?passkey=$confirm_code \r\n";
            // send email
            $sentmail = mail($to,$subject,$message,$header);
            $db = null;
            $jsonmsg->msgtype = "success";
            $jsonmsg->desc = "Inserted Successfully";
        } catch (PDOException $e) {
            throw $e;
        }
    }


    if ($act == "advertisewithus")
    {
       $nm=$_POST['nm'];
       $email=$_POST['email'];
       $mob=$_POST['mob'];
       $message=$_POST['message'];
       $file=$_POST['file'];
        try{
           $db=getDB();
            if(isset($file)){
                $errors =array();
                $file_name = $_FILES['file']['name'];
                $path="admin/ad_images/".$file_name;
                $file_size = $_FILES['file']['size'];
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_type = $_FILES['file']['type'];
                if(empty($errors) == true)
                {
                    move_uploaded_file($file_tmp,$path);
                    echo "Success";
                }
                else
                {
                    print_r($errors);
                }
            }
            $sql="INSERT INTO advertise_req (nm,email,mob,msg,photo,date) VALUES ('$nm','$email','$mob','$message','$path',now())";
            $stmt = $db->query($sql);
            $db = null;
            $jsonmsg->msgtype = "success";
            $jsonmsg->desc = "Inserted Successfully";
        }
        catch (PDOException $e)
        {
            throw  $e;
        }
    }

    if($act == "contactus")
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];

        try{
            $db = getDB();
            $sql="INSERT INTO contact (name,email,mobile,address,date) VALUES ('$name','$email','$mobile','$address',now())";
            $stmt = $db->query($sql);
            $db = null;
            $jsonmsg->msgtype = "success";
            $jsonmsg->desc ="Inserted Successfully";
        }
        catch (PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="loadsingleAd")
    {
        $property_id=$_POST['property_id'];

        try{
            $db = getDB();
            $sql="SELECT property_name,city,locality,address,landmark,property_type,transaction_type,bedroom,possession,price,area_sqft as area,rate_sqft,floor_no,amenities,airport,train,bustop,school,hospital,resto,bank,property_details,name,owner_type,email,mob,landline,about_builder,availability FROM add_posting WHERE property_id=$property_id";
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="";
            $jsonmsg->result=$result;
        }
        catch (PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="updateAd")
    {
        $property_id=$_POST['property_id'];
        $user_id=$_POST['user_id'];
        $property_name=$_POST['property_name'];
        $city=$_POST['city'];
        $locality=$_POST['locality'];
        $address=$_POST['address'];
        $landmark=$_POST['landmark'];
        $property_type=$_POST['property_type'];
        $transaction_type=$_POST['transaction_type'];
        $bedroom=$_POST['bedroom'];
        $possession=$_POST['possession'];
        $price=$_POST['price'];
        $area_sqft=$_POST['area_sqft'];
        $rate_sqft=$_POST['rate_sqft'];
        $floor_no=$_POST['floor_no'];
        $amenities=$_POST['amenities'];
        $airport=$_POST['airport'];
        $train=$_POST['train'];
        $bustop=$_POST['bustop'];
        $school=$_POST['school'];
        $hospital=$_POST['hospital'];
        $resto=$_POST['resto'];
        $bank=$_POST['bank'];
        $property_details=$_POST['property_details'];
        $name=$_POST['name'];
        $owner_type=$_POST['owner_type'];
        $email=$_POST['email'];
        $mob=$_POST['mob'];
        $landline=$_POST['landline'];
        $about_builder=$_POST['about_builder'];
        $availability=$_POST['availability'];

        try{
            $db = getDB();
            $sql = "UPDATE add_posting SET property_name='$property_name',city='$city',locality='$locality',address='$address',landmark='$landmark',property_type='$property_type',transaction_type='$transaction_type',bedroom='$bedroom',possession='$possession',price='$price',area_sqft='$area_sqft',rate_sqft='$rate_sqft',floor_no='$floor_no',amenities='$amenities',airport='$airport',train='$train',bustop='$bustop',school='$school',hospital='$hospital',resto='$resto',bank='$bank',property_details='$property_details',name='$name',owner_type='$owner_type',email='$email',mob='$mob',landline='$landline',about_builder='$about_builder',user_id='$user_id',availability='$availability'  WHERE property_id=$property_id";
            $stmt = $db->query($sql);
            $db = null;
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="Updated Successfully";
        }
        catch(PDOException $e)
        {
            throw  $e;
        }
    }

    if($act=="loadenquiry")
    {
        $enquiry_id=$_POST['enquiry_id'];

        try{
            $db = getDB();
            $sql = "SELECT property_name,name,email,mob,comments,username as mobile1,property_id FROM enquiry WHERE enq_id=$enquiry_id";
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            $jsonmsg->msgtype = "success";
            $jsonmsg->desc = "";
            $jsonmsg->result = $result;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="updateenquiry")
    {
        $enquiry_id=$_POST['enquiry_id'];
        $property_id=$_POST['property_id'];
        $property_name=$_POST['property_name'];
        $username=$_POST['username'];
        $user_id=$_POST['user_id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $comments=$_POST['comments'];

        try{
            $db = getDB();
            $sql = "UPDATE enquiry SET property_name='$property_name',property_id='$property_id',username='$username',user_id='$user_id',
             name='$name',email='$email',mobile='$mobile',comments='$comments' WHERE enq_id=$enquiry_id";
            $stmt = $db->query($sql);
            $db = null;
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="Updated Successfully";
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="loadenquirylist")
    {
         $property_id=$_POST['property_id'];
         try
         {
             $db = getDB();
             $sql = "SELECT DATE_FORMAT(date,'%d/%m/%Y %h:%i %p') AS date,name,email,mob,comments FROM enquiry WHERE property_id=$property_id";
             $stmt = $db->query($sql);
             $result = $stmt->fetchAll(PDO::FETCH_OBJ);
             $db = null;
             $jsonmsg->msgtype="success";
             $jsonmsg->desc="";
             $jsonmsg->result=$result;
         }
         catch(PDOException $e)
         {
             throw $e;
         }
    }

    if($act=="refreshviews")
    {
        $property_id=$_POST['property_id'];
        try
        {
            $db = getDB();
            $result = $mysqli->query("SELECT total_visits FROM add_posting WHERE property_id=$property_id");
            while ($row = $result->fetch_array()) {
                $count = $row[0];
            }
            $count = $count+1;
            $sql = "UPDATE add_posting SET total_visits='$count' WHERE property_id=$property_id";
            $stmt = $db->query($sql);
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="Updated Successfully";
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="visitsdetails")
    {
       $property_id=$_POST['property_id'];

        try{
            $db = getDB();
            $result = $mysqli->query("SELECT * FROM property_views WHERE property_id=$property_id");
            $customercount = $result->num_rows;
            $users_id = array();
            $users_list = array();
            $result = $mysqli->query("SELECT user_id FROM property_views WHERE property_id=$property_id");
            while ($row = $result->fetch_array()) {
                $uid = $row[0];
                array_push($users_id,$uid);
            }
            $count=count($users_id);
            if($count>=0)
            {
                for($i=0;$i<$count;$i++)
                {
                    $result = $mysqli->query("SELECT name,mob,email,areu as user_type,city FROM signup WHERE user_id=$users_id[$i]");
                    $row = $result->fetch_assoc();
                    array_push($users_list,$row);
                }
            }

            $db = null;
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="";
            $jsonmsg->customerscount=$customercount;
            $jsonmsg->customerlist=$users_list;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="registeruser")
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $user_type = $_POST['user_type'];
        $city = $_POST['city'];
        $mob = $_POST['mob'];
        $password = $_POST['password'];
        $cnfpsd = $_POST['cnfpsd'];
        try
        {
            $db = getDB();
            $sel = "select * from `signup` where mob = '$mob'";
            $res = $mysqli->query($sel);
            $check = mysqli_num_rows($res);
            if($check == 0)
            {
                $code = rand(100000, 999999);
                $text = "Please Verify Your OTP Code is ".$code;
                sendMessage($text,$mob);
                $sql = "INSERT INTO signup(name,email,gender,areu,city,mob,pass,cnfpsd,date,verification_code,verification_status)  VALUES ('$name','$email','$gender','$user_type','$city','$mob','$password','$cnfpsd',now(),$code,'False')";
                $stmt = $db->query($sql);
                $stmt = $db->query("SELECT last_insert_id() AS lid");
                while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                    $data = $row[0];
                }
                $jsonmsg->msgtype="success";
                $jsonmsg->desc="Sign up Successful , Please Verify Your Accout.";
                $jsonmsg->lastid=$data;
                $jsonmsg->verify='Yes';
            }
            else
            {
                $result = $mysqli->query($sel);
                while( $row = $result->fetch_array())
                {
                    $verification_status = $row['verification_status'];
                    $verification_code = $row['verification_code'];
                    $user_id = $row['user_id'];
                    $mob = $row['mob'];
                }
                if($verification_status == 'False')
                {
                    $text = "Please Verify Your OTP Code is ".$verification_code;
                    sendMessage($text,$mob);
                    $jsonmsg->msgtype="success";
                    $jsonmsg->desc="Your verification is Pending , Please Verify Your Account.";
                    $jsonmsg->lastid=$user_id;
                    $jsonmsg->verify='Yes';
                    $jsonmsg->warning='Yes';
                }
                else
                {
                    $jsonmsg->msgtype="success";
                    $jsonmsg->desc=$mob." This mobile number is already Exist.. Please Signup with another number....!!!!";
                }
            }
            $db = null;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="getuserInfo")
    {
        $user_id=$_POST['user_id'];

        try
        {
            $db = getDB();
            $sql = "SELECT name,email,gender,areu,city,mob,pass FROM signup WHERE user_id=$user_id";
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="";
            $jsonmsg->result=$result;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="updateuserInfo")
    {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $areu = $_POST['areu'];
        $city = $_POST['city'];
        $mob = $_POST['mob'];
        $password = $_POST['password'];

        try
        {
            $db = getDB();
            $sql = "UPDATE signup SET name='$name',email='$email',gender='$gender',areu='$areu',city='$city',mob='$mob',pass='$password' WHERE user_id=$user_id";
            $stmt = $db->query($sql);
            $db = null;
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="Updated Successfully";
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="search_city")
    {
       $city = $_POST['city'];

        try
        {
            $db = getDB();
            $sql = "SELECT DISTINCT city FROM add_posting WHERE city LIKE '%".$city."%'";
            $stmt = $db->query($sql);
            $str="<ul id='city-list'>";
            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                $str=$str."<li onClick=\"selectCity('".$row[0]."')\">&nbsp;&nbsp;&nbsp;".$row[0]."</li><br/>";
            }
            $str=$str."</ul>";
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="";
            $jsonmsg->result=$str;
            $jsonmsg->result1=$result;
        }
        catch (PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="search_keyword")
    {
        $keyword = $_POST['keyword'];
        try
        {
            $db = getDB();
            $sql = "SELECT DISTINCT locality as search FROM add_posting WHERE locality LIKE '%".$keyword."%'
                    UNION SELECT DISTINCT name as search FROM add_posting WHERE name LIKE '%".$keyword."%'
                    UNION SELECT DISTINCT property_name as search FROM add_posting WHERE property_name LIKE '%".$keyword."%'  LIMIT 100";
            $stmt = $db->query($sql);
            $str="<ul id='category-list'>";
            while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
                $str=$str."<li onClick=\"selectCategory('".$row[0]."')\">".$row[0]."</li><br/>";
            }
            $str=$str."</ul>";
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="";
            $jsonmsg->result=$str;
            $jsonmsg->result1=$result;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="myAds")
    {
        $user_id = $_POST['user_id'];
        $mobile = $_POST['mobile'];
        try
        {
            $db = getDB();
            $sql = "SELECT property_id,property_name,locality,city,bedroom,price,property_type,owner_type,name,DATE_FORMAT(date,'%d/%m/%Y %h:%i %p') AS date FROM add_posting WHERE user_id='$user_id' AND mob='$mobile'";
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $str = '';
            $stmt = $db->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_NUM))
            {
                $str=$str."<div class='ManageRowArea' id='div-236077733'><div class='AdTitleAreacheck'><input class='check' name='defaultAds[]' id='checkbox_236077733' type='checkbox' value='".$row[0]."' onClick='' style='margin-top:0px;'></div><div class='AdTitlecheckDetails'><p class='Managetxt1'>".$row[1]." - ".$row[2]." , ".$row[3]."</p><p class='Managetxt1'><span>Apartment:".$row[4]."</span><span>Price:".$row[5]."</span><span>Category :".$row[6]."</span></p></div><div class='AdTitleArea2'><p class='Managetxt1'><span>Posted By: ".$row[7]." - ".$row[8]." on ".$row[9]."</span></p></div><div class='AdTitleArea3'><div class='ManageBTN-Area'><div class='EditOptionBTN'><a href='image_upload.php?id=".$row[0]."'><span	class='OptionIcon_text'>Upload Property Images</span></a></div><div class='EditOptionBTN'><a href=\"javascript:setmainlistparameters(".$row[0].",'".$row[1]."','".$row[3]."','".$row[2]."','".$row[6]."','".$row[4]."')\"><span class='OptionIcon_text'>View</span></a></div><div class='EditOptionBTN'><a href='EditMyAds/".$row[0]."'><span class='OptionIcon_text'>Edit</span></a></div></div></div></div>";
            }
            $db = null;
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="";
            $jsonmsg->result=$str;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="myEnquiries")
    {
        $user_type = $_POST['user_type'];
        $user_id = $_POST['user_id'];
        $user_name = $_POST['user_name'];

        try{
            $db =  getDB();
            if($user_type=="Customer")
            {
                $sql = "SELECT enq_id,property_name,name,email,mob,comments,date  FROM enquiry WHERE user_id='$user_id' ORDER BY date DESC";
            }
            else
            {
                $sql = "SELECT enq_id,property_name,name,email,mob,comments,date FROM enquiry WHERE username='$user_name' ORDER BY date DESC";
            }
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            $str='';
            $str1='';
            $stmt =$db->query($sql);
            while($row = $stmt->fetch(PDO::FETCH_NUM))
            {
                if($user_type=="Customer")
                {
                    $str1="<div class='AdTitleArea2'><p class='Managetxt1'><span><a href='EditMyEnquiry/".$row[0]."'><span class='OptionIcon_text'>Edit</span></a></span></p></div>";
                }
                else
                {
                    $str1="";
                }
                $str=$str."<div class='ManageRowArea' id='div-236077733'><div class='AdTitleAreacheck'><input class='check' name='defaultAds[]' id='checkbox_236077733' type='checkbox' value='".$row[0]."' onClick='' style='margin-top:0px;'></div><div class='AdTitlecheckDetails'><p class='Managetxt1'>".$row[1]."</p><p class='Managetxt1'><span>Ad ID: 228850710</span></p></div><div class='AdTitleArea2'><p class='Managetxt1'><span>".$row[2]."</span><span>".$row[3]."</span><span>".$row[4]."</span></span></span></p></div><div class='AdTitleArea3'><div class='ManageBTN-Area'><div class='EditOptionBTN'><a href='' title='Urgent requirement for experienced php developer!!!!'><span class='Option-Icon View-Option'></span><span class='OptionIcon_text'><small id='full_164747697'>".$row[5]."</small></span></a></div></div></div><div class='AdTitleArea2'><p class='Managetxt1'><span>".$row[6]."</span></span></span></p></div>".$str1."</div>";
            }
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="";
            $jsonmsg->result=$str;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }

    if($act=="resendotp")
    {
      $user_id = $_POST['user_id'];

      try{
        $db = getDB();
        $stmt =$db->query("SELECT user_id,verification_code,verification_status,mob FROM signup WHERE user_id=$user_id");
          while($row = $stmt->fetch(PDO::FETCH_NUM)) {
              $user_id = $row[0];
              $verification_code = $row[1];
              $verification_status = $row[2];
              $mob = $row[3];
          }
          if($verification_status == 'False')
          {
              $text = "Please Verify Your OTP Code is ".$verification_code;
              sendMessage($text,$mob);
          }
          $jsonmsg->msgtype="success";
          $jsonmsg->desc="OTP Sent Successfully...";
      }
      catch (PDOException $e)
      {
          throw $e;
      }
    }

    if($act=="addenquiry")
    {
        $property_name=$_POST['property_name'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $comments=$_POST['comments'];
        $username=$_POST['username'];
        $user_id=$_POST['user_id'];
        $property_id=$_POST['property_id'];
        $code = rand(100000, 999999);
        $text = "Please Verify Your OTP Code is ".$code;
        sendMessage($text,$mob);

        try{
            $db = getDB();
            $sql = "INSERT INTO enquiry (property_name,name,email,mob,comments,date,username,user_id,property_id,verification_code,verification_status) VALUES ('$property_name','$name','$email','$mobile','$comments',now(),'$username','$user_id','$property_id',$code,'False')";
            $stmt = $db->query($sql);
            $stmt =$db->query("SELECT last_insert_id() AS lid");
            while($row = $stmt->fetch(PDO::FETCH_NUM)) {
                $lastid = $row[0];
            }
            $db = null;
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="Inserted Successfully";
            $jsonmsg->lid=$lastid;
        }
        catch (PDOException $e)
        {
            throw  $e;
        }
    }

    if($act=="uploadfloorplan")
    {
        $file=$_POST['file'];
        try{
            $newfilename = $name1 = uniqid().".jpg";
            $name=$_FILES['file']['name'];
            $tmp_name=$_FILES['file']['tmp_name'];
            if(isset($name))
            {
                if(!empty($name))
                {
                    rename($name, $newfilename);
                    $location="../property_images/floor_plan/";
                    $file_path=$newfilename.".jpg";
                    move_uploaded_file($tmp_name,$location.$newfilename.".jpg");
                }
            }
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="File Uploaded Successfully";
            $jsonmsg->path=$newfilename;
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }
    if($act=="removefloorplan")
    {
        $path="../".$_POST['path'];
        //$path = str_replace("\\","/",$path);
        try{
           echo $path;
            if (file_exists($path)){
                if (unlink($path)) {
                    echo "success";
                } else {
                    echo "fail";
                }
            } else {
                echo "file does not exist";
            }
          //  unlink($path);
            $jsonmsg->msgtype="success";
            $jsonmsg->desc="File Deleted Successfully";
        }
        catch(PDOException $e)
        {
            throw $e;
        }
    }
}
else
{
    $jsonmsg->msgtype="error";
    $jsonmsg->desc="Error Occoured! Invalid Reuest Method GET";
}
echo json_encode($jsonmsg);
header('content-type application/json');
?>
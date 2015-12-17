<?php
  include("../../../model/connectDB.php");
    $db=new PDOConfig;
    session_start(true);
    $decide = $_POST["decide"];
    $gender = $_POST["gender"];
    $birthday = $_POST["birthday"];
    $address = $_POST["address"];
    $name= $_POST["name"];
    $password = $_POST["password"];
    $field_file = $_FILES['file'];
    $filename=$_FILES['file']['name'];
    $tmpname=$_FILES['file']['tmp_name'];
    $filetype=$_FILES['file']['type'];
    $filesize=$_FILES['file']['size'];
switch ($decide) {
    case 'update':
        		$id=$_SESSION['mem_id'];
            $sql = "UPDATE member SET  name = :name,  address = :address, password = :password, birthday = :birthday , gender = :gender WHERE member.mem_id =$id";
            $query = $db->prepare($sql);
            $query->execute(array('name' => $name  , 'address' => $address , 'password' => $password , 'birthday' => $birthday , 'gender' => $gender));
            $imgtype = ((string)$id +'.jpg');
            $stmt2 = $db->prepare("UPDATE member SET `imgtype`='$imgtype.jpg' WHERE `mem_id`='$id'");
            $result2 = $stmt2->execute();
            if($query == true){
              if (move_uploaded_file($_FILES['file']['tmp_name'], '../../../../store/StoreManage/picture/member/'.$id.'.jpg')) {
                echo true;
              } else {
                echo "檔案上傳失敗";
              }
            }
    else{
        echo "新增失敗";
    }

            
    	break;
  default:
  	echo "re";
    break;
}



?>
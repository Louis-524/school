<?php
  include("../../../model/connectDB.php");
    $db=new PDOConfig;
    session_start(true);
switch ($decide) {
  case 'select':
    if(isset($username)&&isset($password))
    {
    $sql = "SELECT name,mem_id from member where cellphone =:username and password =:password";
    $query = $db->prepare($sql);
    $query->execute(array(':username' => $username,':password' => $password));
    $result = $query->fetchall(PDO::FETCH_OBJ);
    if($result!=null)
    {
    $_SESSION['mem_id'] = $result[0]->mem_id;
    $_SESSION['cellphone']=$username;
    $_SESSION['member_name']=$result[0]->name;
    echo true;
    }
    else{
      echo false;
    }

  }
  else {
    echo false;

  }
    break;

  default:
      if(isset($name)&&isset($password)&&isset($cellphone)&&isset($gender)&&isset($password2)&&$password==$password2)
      {
        $sql ="select cellphone from member where cellphone =:cellphone";
        $query = $db->prepare($sql);
        $query->execute(array(':cellphone' => $cellphone));
        $result = $query->fetchColumn();
        if($result)
        {
          echo "re"; //註冊帳號重複
        }
        else{
                $sql = "INSERT INTO member (cellphone, name, gender,  password) VALUES (:cellphone,  :name,  :gender,  :password)";
                $query = $db->prepare($sql);
                $query->execute(array('cellphone' => $cellphone,'name' => $name  ,'gender' => $gender  , 'password' => $password ));

                $_SESSION['mem_id'] = $db->lastInsertId();
                $_SESSION['cellphone']=$cellphone;
                $_SESSION['member_name']=$name;

                if(($db->lastInsertId())!=null)
                {
                  echo true;
                }
                else{
                  echo false;
                }
            }
      }
      else{
        echo "bo";
      }
    break;
}



?>
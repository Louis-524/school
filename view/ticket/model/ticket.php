<?php
  include("../../../model/connectDB.php");
  date_default_timezone_set('Asia/Taipei');
  session_start(true);
  $db=new PDOConfig;
            $a=123;
            if(isset($_REQUEST['a']))
            {
            $a=$_REQUEST['a'];
            $decide=$a[1];
            $qst_type=$a[0];
            }elseif(isset($_REQUEST['ins'])){
                $b=$_REQUEST['ins'];
                $pt=$b[0];
                $couid=$b[1];
                $total=$b[2];
                $decide="insert";
            }

  switch ($decide) {
    case 'list':
        $store_id=$_SESSION['storeid'];
        $mem_id=$_SESSION['mem_id'];
        $sqlp = "SELECT total_pt from `point` where store_id = $store_id and mem_id = $mem_id";
        $queryp = $db->prepare($sqlp);
        $queryp->execute();
        $resultp = $queryp->fetchall(PDO::FETCH_OBJ);
        $total_pt=$resultp[0]->total_pt;

        $today=date("Y-m-d");
        $sql = "SELECT  end_date,need_pt,coupon_name,a.coupon_type_id
                FROM coupon as a join coupon_type as b on a.coupon_type_id = b.coupon_type_id
                where coupon_id=$a[0]";
        $query = $db->prepare($sql);
        $query->execute();
        $row = $query->fetchall(PDO::FETCH_OBJ);
        if($row[0]->coupon_type_id==1){
        echo '<div class="6u" style="width:100%;color:#FFFFFF;text-align:center;font-size:14px"><a href="#" class="image fit"><img src="../../image/discounts.jpg" height="60%" width="60%" alt="" />';
        }else{
        echo '<div class="6u" style="width:100%;color:#FFFFFF;text-align:center;font-size:14px"><a href="#" class="image fit"><img src="../../image/coupons.jpg" height="60%" width="60%" alt="" />';    
        }
        echo      '</a>'.$row[0]->coupon_name.'<br/>領取此禮券需'.$row[0]->need_pt.'點<br/><font color="red">領取期限剩'.((strtotime($row[0]->end_date) - strtotime($today))/86400).'天</font><br/><br/></div>
              <INPUT TYPE=hidden id="pt" NAME="pt" VALUE="'.$row[0]->need_pt.'">
              <INPUT TYPE=hidden id="cou_id" NAME="cou_id" VALUE="'.$a[0].'">
              <INPUT TYPE=hidden id="total" NAME="total" VALUE="'.$total_pt.'">';
            break;
    case 'insert':
        $store_id=$_SESSION['storeid'];
        $mem_id=$_SESSION['mem_id'];
        $today=date("Y-m-d");
        $sql = "INSERT INTO coupon_detail (coupon_id, mem_id, deduct_pt, receive_date ) VALUES ( :coupon_id, :mem_id, :deduct_pt, :receive_date)";
        $query = $db->prepare($sql);
        $query->execute(array('coupon_id' => $couid ,'mem_id' => $mem_id,  'deduct_pt' => $pt , 'receive_date' => $today));
        

        $uptotal=$total-$pt;
        $sqlu ="UPDATE `point` SET total_pt = :total_pt WHERE mem_id = $mem_id and store_id = $store_id;";
        $queryu = $db->prepare($sqlu);
        $queryu->execute(array('total_pt' => $uptotal ));
        break;
    case 'use':
        $store_id=$_SESSION['storeid'];
        $mem_id=$_SESSION['mem_id']; 
        

        $today=date("Y-m-d");
        $sql = "SELECT use_enddate,b.coupon_type_id 
                FROM coupon_detail as a join coupon as b on a.coupon_id=b.coupon_id
                join coupon_type as c on b.coupon_type_id = c.coupon_type_id
                where coupon_detail_id = $a[0]";
        $query = $db->prepare($sql);
        $query->execute();
        $row = $query->fetchall(PDO::FETCH_OBJ);
        if($row[0]->coupon_type_id){
        echo '<div class="6u" style="width:100%;color:#FFFFFF;text-align:center;font-size:14px"><a href="#" class="image fit"><img src="../../image/discounts.jpg" height="60%" width="60%" alt="" />';
        }else{
        echo '<div class="6u" style="width:100%;color:#FFFFFF;text-align:center;font-size:14px"><a href="#" class="image fit"><img src="../../image/conpons.jpg" height="60%" width="60%" alt="" />';    
        }
        echo '</a>使用此禮券<br/><font color="red">剩'.((strtotime($row[0]->use_enddate) - strtotime($today))/86400).'天</font><br/><br/></div>
              <INPUT TYPE=hidden id="detail_id" NAME="detail_id" VALUE="'.$a[0].'">'
              ;
            break;
      case 'upuse':
        $store_id=$_SESSION['storeid'];
        $mem_id=$_SESSION['mem_id'];
        $today=date("Y-m-d");    
        

        $uptotal=$total-$pt;
        $sqlu ="UPDATE coupon_detail SET use_date = :today  WHERE coupon_detail_id = :coudtid ;";
        $queryu = $db->prepare($sqlu);
        $queryu->execute(array('today' => $today ,'coudtid' => $a[0] ));
            break;              
    default:
      
      break;
  }
  




?>

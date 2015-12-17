<?php
  include("../../../model/connectDB.php");
  session_start(true);
  $db=new PDOConfig;
            $a=123;
            if(isset($_REQUEST['a']))
            {
            $a=$_REQUEST['a'];
            $decide=$a[1];
            $qst_type=$a[0];
            }
            elseif(isset($_REQUEST['ins'])){
                $b=$_REQUEST['ins'];
                $Quantity=$b[0];
                $gift_id=$b[1];
                $red_point=0-$b[2];
                $decide="inster";
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

            $sql= "SELECT  gift_name,gift_id,imgtype,need_pt,Quantity FROM gift where gift_id = $a[0] and CURDATE() between start_date-1 and end_date";
            //$qst_name=$result[0]->qst_name;
            //echo $qst_name.$result[0]->opt_1;
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetchall(PDO::FETCH_OBJ);
            echo '
<td rowspan="3"  style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:120px;height:120px;" src="../../../store/StoreManage/picture/gift/'.$result[0]->imgtype.'" alt="" /></td>
                <td style="border-color:#3C3C3C;color:#FFFFFF;text-align:center;display: table-cell;vertical-align:middle;font-size:16px;">'.$result[0]->gift_name.'</td>
                <INPUT TYPE=hidden id="pt" NAME="pt" VALUE="'.$result[0]->need_pt.'">
                <INPUT TYPE=hidden id="gift_id" NAME="gift_id" VALUE="'.$result[0]->gift_id.'">
                <INPUT TYPE=hidden id="gift_name" NAME="gift_name" VALUE="'.$result[0]->gift_name.'">
                <INPUT TYPE=hidden id="total" NAME="total" VALUE="'.$total_pt.'">
                <INPUT TYPE=hidden id="gift_Quantity" NAME="gift_Quantity" VALUE="'.$result[0]->Quantity.'">
';
    	break;
    case 'inster':
            $store_id=$_SESSION['storeid'];
            $mem_id=$_SESSION['mem_id'];

            $sqlQuantity = "SELECT Quantity from gift where gift_id = $gift_id";
            $queryQuantity = $db->prepare($sqlQuantity);
            $queryQuantity->execute();
            $resultQuantity = $queryQuantity->fetchall(PDO::FETCH_OBJ);
            if($resultQuantity[0]->Quantity>0)
            {

                $sql = "INSERT INTO giftdetail (mem_id, Quantity, gift_id, red_point ) VALUES ( :mem_id, :Quantity, :gift_id, :red_point)";
                $query = $db->prepare($sql);
                $query->execute(array('mem_id' => $mem_id ,'Quantity' => $Quantity,  'gift_id' => $gift_id , 'red_point' => $red_point));
                
                $sqlq = "UPDATE `gift` SET Quantity = Quantity-1 WHERE gift_id = $gift_id ;";
                $queryq = $db->prepare($sqlq);
                $queryq->execute();




                    $sqls = "SELECT store_id,mem_id,total_pt from point where store_id =:store_id and mem_id =:mem_id";
                    $querys = $db->prepare($sqls);
                    $querys->execute(array(':store_id' => $store_id,':mem_id' => $mem_id));
                    $results = $querys->fetchall(PDO::FETCH_OBJ);
                    if($results!=null)
                    {
                        $total_pt=$results[0]->total_pt;
                        $total_pt=$total_pt+$red_point;
                        $sqlu ="UPDATE `point` SET total_pt = :total_pt WHERE mem_id = $mem_id and store_id = $store_id;";
                        $queryu = $db->prepare($sqlu);
                        $queryu->execute(array('total_pt' => $total_pt ));
                    }
                    else{
                        $total_pt=0-$red_point;
                        $sqli="INSERT INTO point (mem_id,store_id,total_pt ) VALUES (:mem_id,:store_id,:total_pt) ";
                        $queryi = $db->prepare($sqli);
                        $queryi->execute(array('mem_id' => $mem_id ,'store_id' => $store_id ,'total_pt' =>$total_pt));

                    }

            }else{
                echo "zero";
            }

        break;
  default:
  	if(isset($number))
    {

        for ($i=1; $i<$number+1 ; $i++) {
            $answerstr="answer";
            $answerstr=$answerstr.$i;
            $answer=$_GET[$answerstr];
            $qst_id=$_GET['qstid'];
            $qstbidstr="qstbid";
            $qstbidstr=$qstbidstr.$i;
            $qstb_id=$_GET[$qstbidstr];
            $mem_id=$_SESSION['mem_id'];
            date_default_timezone_set("Asia/Taipei");
            $qst_date = date("Y-m-d");
            $sql = "INSERT INTO qstnirdetail (qst_id, mem_id, qstb_id, qst_date, answer ) VALUES (:qst_id, :mem_id, :qstb_id, :qst_date, :answer);";
            $query = $db->prepare($sql);
            $query->execute(array('qst_id' => $qst_id,'mem_id' => $mem_id , 'qstb_id' => $qstb_id ,'qst_date' => $qst_date , 'answer' => $answer));
        }
        echo true;
    }
    else {
        echo "re";
    }
    break;
}




?>


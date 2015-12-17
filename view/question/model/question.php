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

switch ($decide) {
    case 'list':
            $sql= "SELECT b.qstb_id,b.qst_id,b.qst_name,b.opt_1,b.opt_2,b.opt_3,b.opt_4
                    from questionnaire as a
                    JOIN question_bank as b on a.qst_id=b.qst_id
                    where a.qst_id = '$qst_type'  and CURDATE() between a.start_date-1 and a.end_date ";
            //$qst_name=$result[0]->qst_name;
            //echo $qst_name.$result[0]->opt_1;
            $query = $db->prepare($sql);
            $query->execute();
            $ans='';
            $number=0;
            $number1=null;
            $id0=1;
            $id1=2;
            $id2=3;
            $id3=4;
            while($row=$query->fetch(PDO::FETCH_ASSOC)){
                if ($row['opt_4']!=null) {
                    $number=$number+1;
                    $number1=$row['qst_id'];
              $ans1='<div class="table-wrapper" style="margin-top:20px; background:#3C3C3C;">
                <INPUT TYPE=hidden id="qstbid'.$number.'" NAME="qstbid'.$number.'" VALUE="'.$row['qstb_id'].'">
                <table class="alt" style=" background:#3C3C3C; ">
                <tbody style=" background:#3C3C3C; ">
                    <tr style=" background:#3C3C3C; ">
                        <td colspan="3" style="border-color:#3C3C3C;color:#FFFFFF;text-align:center;display: table-cell;vertical-align:middle;font-size:20px;">問題'.$number.':'.$row['qst_name'].'</td>
                    </tr>
                    <tr style=" background:#3C3C3C; ">
                        <td style="border-color:#3C3C3C;text-align:center;vertical-align:middle;width:25%;"><input type="radio" id="answer'.$id0.'" name="answer'.$number.'" value="'.$row['opt_1'].'">
                            <label for="answer'.$id0.'" style="text-align:center;"> '.$row['opt_1'].'</label></td>
                        <td style="border-color:#3C3C3C;text-align:center;vertical-align:middle;width:25%;"><input type="radio" id="answer'.$id1.'" name="answer'.$number.'" value="'.$row['opt_2'].'">
                            <label for="answer'.$id1.'" style="text-align:center;">'.$row['opt_2'].' </label></td>
                        <td style="border-color:#3C3C3C;text-align:center;vertical-align:middle;width:25%;"><input type="radio" id="answer'.$id2.'" name="answer'.$number.'" value="'.$row['opt_3'].'">
                            <label for="answer'.$id2.'" style="text-align:center;">'.$row['opt_3'].' </label></td>
                        <td style="border-color:#3C3C3C;text-align:center;vertical-align:middle;width:25%;"><input type="radio" id="answer'.$id3.'" name="answer'.$number.'" value="'.$row['opt_4'].'">
                            <label for="answer'.$id3.'" style="text-align:center;">'.$row['opt_4'].' </label></td>
                    </tr>
                <div style="background:#FFFFFF;height:5px;width:300px;margin: 0px auto;"> </div>
                </tbody>
                </table>
            </div>';
                $id0=$id0+4;
                $id1=$id1+4;
                $id2=$id2+4;
                $id3=$id3+4;
                $ans=$ans.$ans1;
                    # code...
                } else {
                    $number=$number+1;
              $ans1='<div class="table-wrapper" style="margin-top:20px; background:#3C3C3C;">
                <INPUT TYPE=hidden id="qstbid'.$number.'" NAME="qstbid'.$number.'" VALUE="'.$row['qstb_id'].'">
                <table class="alt" style=" background:#3C3C3C; ">
                <tbody style=" background:#3C3C3C; ">
                    <tr style=" background:#3C3C3C; ">
                        <td colspan="3" style="border-color:#3C3C3C;color:#FFFFFF;text-align:center;display: table-cell;vertical-align:middle;font-size:20px;">問題'.$number.':'.$row['qst_name'].'</td>
                    </tr>
                    <tr style=" background:#3C3C3C; ">
                        <td style="border-color:#3C3C3C;text-align:center;vertical-align:middle;width:25%;"><input type="radio" id="answer'.$id0.'" name="answer'.$number.'" value="'.$row['opt_1'].'">
                            <label for="answer'.$id0.'" style="text-align:center;"> '.$row['opt_1'].'</label></td>
                        <td style="border-color:#3C3C3C;text-align:center;vertical-align:middle;width:25%;"><input type="radio" id="answer'.$id1.'" name="answer'.$number.'" value="'.$row['opt_2'].'">
                            <label for="answer'.$id1.'" style="text-align:center;">'.$row['opt_2'].' </label></td>
                        <td style="border-color:#3C3C3C;text-align:center;vertical-align:middle;width:25%;"><input type="radio" id="answer'.$id2.'" name="answer'.$number.'" value="'.$row['opt_3'].'">
                            <label for="answer'.$id2.'" style="text-align:center;">'.$row['opt_3'].' </label></td>
                    </tr>
                <div style="background:#FFFFFF;height:5px;width:300px;margin: 0px auto;"> </div>
                </tbody>
                </table>
            </div>';
                $id0=$id0+4;
                $id1=$id1+4;
                $id2=$id2+4;
                $id3=$id3+4;
                $ans=$ans.$ans1;

                }


                            }
                            $ans1='<INPUT TYPE=hidden id="number" NAME="number" VALUE="'.$number.'">
                            <INPUT TYPE=hidden id="qstid" NAME="qstid" VALUE="'.$number1.'">';
                            $ans=$ans.$ans1;
                            echo $ans;
    	break;
    case 'inster':
        echo "inster";
        break;
  default:
  	if(isset($number))
    {
            $answerstr="answer";
            $answerstr=$answerstr.$i;
            $answer=$_GET[$answerstr];
            $qst_id=$_GET['qstid'];
            $qstbidstr="qstbid";
            $qstbidstr=$qstbidstr.$i;
            $qstb_id=$_GET[$qstbidstr];
            $id=$_GET['qstid'];
            $mem_id=$_SESSION['mem_id'];
            date_default_timezone_set("Asia/Taipei");
            $qd_date = date("Y-m-d");
            $sqlg="SELECT reward_pt from questionnaire  where qst_id=$id";
            $queryg = $db->prepare($sqlg);
            $queryg->execute();
            $resultg = $queryg->fetchall(PDO::FETCH_OBJ);
            $reward_pt=$resultg[0]->reward_pt;
           
            
            $sql = "INSERT INTO question_detail (mem_id, qst_id, qd_date, reward_pt ) VALUES ( :mem_id, :qst_id, :qd_date, :reward_pt)";
            $query = $db->prepare($sql);
            $query->execute(array('mem_id' => $mem_id ,'qst_id' => $qst_id,  'qd_date' => $qd_date , 'reward_pt' => $reward_pt));
            $qd_id = $db->lastInsertId();
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
            $sql = "INSERT INTO qstnirdetail (qd_id,  qstb_id,  answer ) VALUES (:qd_id,  :qstb_id,  :answer);";
            $query = $db->prepare($sql);
            $query->execute(array('qd_id' => $qd_id, 'qstb_id' => $qstb_id , 'answer' => $answer));
        }
            $mem_id=$_SESSION['mem_id'];
            $store_id=$_SESSION['storeid'];
            $id=$_GET['qstid'];
            $tablename="questionnaire";
            date_default_timezone_set("Asia/Taipei");
            $date = date("Y-m-d");
            
                $sqls = "SELECT store_id,mem_id,total_pt from point where store_id =:store_id and mem_id =:mem_id";
                $querys = $db->prepare($sqls);
                $querys->execute(array(':store_id' => $store_id,':mem_id' => $mem_id));
                $results = $querys->fetchall(PDO::FETCH_OBJ);
                if($results!=null)
                {
                    $total_pt=$results[0]->total_pt;
                    $total_pt=$total_pt+$reward_pt;
                    $sqlu ="UPDATE `point` SET total_pt = :total_pt WHERE mem_id = $mem_id and store_id = $store_id;";
                    $queryu = $db->prepare($sqlu);
                    $queryu->execute(array('total_pt' => $total_pt ));
                }
                else{
                    $total_pt=$reward_pt;
                    $sqli="INSERT INTO point (mem_id,store_id,total_pt ) VALUES (:mem_id,:store_id,:total_pt) ";
                    $queryi = $db->prepare($sqli);
                    $queryi->execute(array('mem_id' => $mem_id ,'store_id' => $store_id ,'total_pt' =>$total_pt));

                }

        echo true;
    }
    else {
        echo "re";
    }
    break;
}




?>


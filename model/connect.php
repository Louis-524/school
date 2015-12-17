<?php

include("../../model/connectDB.php");
date_default_timezone_set('Asia/Taipei');
$id=$_SESSION['mem_id'] ;
function  condb(){
    $db=new PDOConfig;
    
    $sql = "SELECT * from member where mem_id =$id";
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchall(PDO::FETCH_OBJ);
}
function storesql(){
                        $db=new PDOConfig;
                        $id=$_SESSION['mem_id'];
                        $sql = "SELECT  store_name,store_id,imgtype FROM store";
                        $query = $db->prepare($sql);
                        $query->execute();
}
function connect($decide,$val){
  switch ($decide) {
    case 'member':
        condb();

        switch ($val) {
                        case 'name':
                          $name=$result[0]->name;
                          echo $name;
                          unset($db);
                          break;
                        case 'age':
                          $age=$result[0]->age;
                          echo $age;
                          break;
                        case 'address':
                          $address=$result[0]->address;
                          echo $address;
                          break;
                        case 'cellphone':
                          $cellphone=$result[0]->cellphone;
                          echo $cellphone;
                          break;
                        case 'birthday':
                          $birthday=$result[0]->birthday;
                          echo $birthday;
                          break;
                        case 'imgtype':
                          $imgtype=$result[0]->imgtype;
                          if ($imgtype==null) {
                            $imgtype="no.jpg";
                          }
                          echo $imgtype;
                          break;
                        default:
                          echo "error";
                          break;
                      }
      break;
    case 'store':
        switch ($val) {
                        case 'list':  //select all  store
                        storesql();
                        while($row=$query->fetch(PDO::FETCH_ASSOC)){
                              echo '<li ><a href="../store/store.php?id='.$row['store_id'].'">';
                              echo '<img src="../../../store/StoreManage/picture/store/'.$row['imgtype'].'" height="75px">';
                              echo '<h2>'.$row['store_name'].'</h2>';
                              }
                        break;
                        case 'memlist':  //select member join store
                        $db=new PDOConfig;
                        $id=$_SESSION['mem_id'];
                        $sql = "SELECT store_name , a.store_id , a.imgtype ,sum(reward_pt) as pt from store as a join shopdetail as b on b.store_id = a.store_id join member as c on c.mem_id = b.mem_id where b.mem_id=$id GROUP BY store_name HAVING count(store_name) ORDER BY COUNT(store_name) desc";
                        $query = $db->prepare($sql);
                        $query->execute();
                        while($row=$query->fetch(PDO::FETCH_ASSOC)){
                              echo '<div class="6u" style="color:#FFFFFF;text-align:center;"><a href="../store/store.php?id='.$row['store_id'].'" target="_self" class="image fit"><img src="../../../store/StoreManage/picture/store/'.$row['imgtype'].'" alt="" /></a>'.$row['store_name'].'<div style="color:red;">點數：'.$row['pt'].'</div></div>';
                              }
                        break;
                        case 'qlist':
                            $db=new PDOConfig;
                            $id=$_SESSION['mem_id'];
                            $sql = " SELECT   diStinct(store_name),b.store_id,imgtype FROM store as a join questionnaire as b on a.store_id=b.store_id  where CURDATE() between b.start_date-1 and b.end_date and b.qst_id not in (select diStinct(b.qst_id) from question_detail  as b join questionnaire as a on b.qst_id=a.qst_id where b.mem_id=$id )  ";
                            $query = $db->prepare($sql);
                            $query->execute();
                            
                            while($row=$query->fetch(PDO::FETCH_ASSOC)){

                        
                                  echo '<li ><a href="../store/store.php?id='.$row['store_id'].'">';
                                  echo '<img src="../../../store/StoreManage/picture/store/'.$row['imgtype'].'" height="75px">';
                                  echo '<h2>'.$row['store_name'].'</h2>';
                                  }
                                  $count = $query->rowCount();
                                  if(empty($count)){echo "尚無問券";}

                              break;
                        case 'glist':
                            $db=new PDOConfig;
                            $id=$_SESSION['mem_id'];
                            $sql = " SELECT DISTINCT store_name,b.store_id,a.imgtype FROM store as a join gift as b on a.store_id=b.store_id  where CURDATE() between b.start_date-1 and b.end_date and b.Quantity>0";
                            $query = $db->prepare($sql);
                            $query->execute();
                            
                            while($row=$query->fetch(PDO::FETCH_ASSOC)){

                        
                                  echo '<li ><a href="../store/store.php?id='.$row['store_id'].'">';
                                  echo '<img src="../../../store/StoreManage/picture/store/'.$row['imgtype'].'" height="75px">';
                                  echo '<h2>'.$row['store_name'].'</h2>';
                                  }
                                  $count = $query->rowCount();
                                  if(empty($count)){echo "尚無贈品";}

                              break;
                          case 'plist':
                            $db=new PDOConfig;
                            $id=$_SESSION['mem_id'];
                            $sql = " SELECT DISTINCT store_name,b.store_id,a.imgtype FROM store as a join point as b on a.store_id=b.store_id  where mem_id=$id";
                            $query = $db->prepare($sql);
                            $query->execute();
                            
                            while($row=$query->fetch(PDO::FETCH_ASSOC)){

                        
                                  echo '<li ><a href="../store/store.php?id='.$row['store_id'].'">';
                                  echo '<img src="../../../store/StoreManage/picture/store/'.$row['imgtype'].'" height="75px">';
                                  echo '<h2>'.$row['store_name'].'</h2>';
                                  }
                                  $count = $query->rowCount();
                                  if(empty($count)){echo "尚無紀錄";}
                            break;
                          break;

                        default:
                          echo "error";
                          break;

                      }
      break;
    case 'mission':
        switch ($val) {
                        case 'list':  //select member join store
                        $db=new PDOConfig;
                        $id=$_SESSION['mem_id'];
                        $sql = "SELECT act_id, act_name , ad_words , start_date , end_date ,a.imgtype from activity as d
                                join store as a on d.store_id = a.store_id
                                join shopdetail as b on b.store_id = a.store_id
                                join member as c on c.mem_id = b.mem_id
                                where b.mem_id=$id
                                GROUP BY store_name HAVING count(store_name) ";
                        $query = $db->prepare($sql);
                        $query->execute();
                        while($row=$query->fetch(PDO::FETCH_ASSOC)){
                              echo '<div class="6u" style="width:50%;color:#FFFFFF;text-align:center;font-size:12px"><a href="#" class="image fit"><img src="../../../store/StoreManage/picture/store/'.$row['imgtype'].'" alt="" /></a>'.$row['ad_words'].'<br/>'.$row['start_date'].'~'.$row['end_date'].'<br/><font color="red">P50</font><br/><br/></div>';
                              }
                        break;

                        default:
                          echo "error";
                          break;

                      }
      break;
    case 'gift':
              switch ($val) {
                        case 'list':  //select all  store
                        $db=new PDOConfig;
                        $id=$_SESSION['mem_id'];
                        $store_id=$_SESSION['storeid'];
                        $sql = "SELECT  gift_name,gift_id,imgtype,need_pt,Quantity FROM gift where  CURDATE() between start_date and end_date and store_id=$store_id and Quantity > 0";
                        $query = $db->prepare($sql);
                        $query->execute();
                        while($row=$query->fetch(PDO::FETCH_ASSOC)){
                              echo '<li ><a href="#pagetwo" onclick="go('.$row['gift_id'].')";>';
                              echo '<img src="../../../store/StoreManage/picture/gift/'.$row['imgtype'].'"  width="75%" height="100%">';

                              echo '<tbody><tr><h2>'.$row['gift_name'].'</h2></tr><tr><h2 style="color:red;">點數：'.$row['need_pt'].'</h2></tr>剩餘:'.$row['Quantity'].'份</tbody>';
                              }
                        break;
                      }
      break;
      case 'question':
                      switch ($val) {
                        case 'list':  //select all  store
                        $db=new PDOConfig;
                        $id=$_SESSION['mem_id'];
                        $store_id=$_SESSION['storeid'];
                        $sql = "SELECT a.qst_id , a.reward_pt , a.qst_name FROM questionnaire as a  where   a.qst_id not in (select diStinct(b.qst_id) from question_detail  as b join questionnaire as a on b.qst_id=a.qst_id where b.mem_id=$id ) and CURDATE() between a.start_date-1 and a.end_date and a.store_id =$store_id";
                        $query = $db->prepare($sql);
                        $query->execute();
                        while($row=$query->fetch(PDO::FETCH_ASSOC)){


                          echo '<button  href="#pagetwo"  style="height:70px;width:100%;margin:0 auto; border-radius:10px; float:center;" onclick="cul('.$row['qst_id'].')"; target="_self";>'.$row['qst_name'].'<br><font color="#FF0000">點數:'.$row['reward_pt'].'</font></button><br></br>';
                              }
                        break;
                      }
        break;
        case 'message':
                      switch ($val) {
                        case 'list':
                          $db=new PDOConfig;
                        $id=$_SESSION['mem_id'];
                        $sql = "SELECT act_name,ad_words,imgtype FROM `activity` where CURDATE() between start_date and end_date";
                        $query = $db->prepare($sql);
                        $query->execute();
                        while($row=$query->fetch(PDO::FETCH_ASSOC)){
                          echo '<article class="6u 12u$(xsmall) work-item" font-color:"white";>
                                <h3 font-color:white;>'.$row['act_name'].'</h3>
                                <img style="width: 70%;
  height : 50%;
  max-height: 100%;
  max-width: 100%;"; src="../../../store/StoreManage/picture/activity/'.$row['imgtype'].'" alt="" />
                                <p font-color:white;>'.$row['ad_words'].'</p>
                                </article>';                                 
                        }

                          break;
                        
                        default:
                          # code...
                          break;
                      }
          break;
          case 'point':
                      switch ($val) {
                        case 'total':
                            $db=new PDOConfig;
                            $mem_id=$_SESSION['mem_id'];
                            $store_id=$_SESSION['storeid'];
                            $sql = "SELECT total_pt from `point` where store_id = $store_id and mem_id = $mem_id";
                            $query = $db->prepare($sql);
                            $query->execute();
                            $result = $query->fetchall(PDO::FETCH_OBJ);
                            $total_pt=$result[0]->total_pt;
                            echo $total_pt;
                            break;
                        case 'list':
                            $db=new PDOConfig;
                            $mem_id=$_SESSION['mem_id'];
                            $store_id=$_SESSION['storeid'];
                            $sql = "select * from 
                                   (
                                   select b.act_name as name, a.reward_pt as pt,a.join_date as date  from act_record as a join activity as b on a.act_id=b.act_id where mem_id =$mem_id
                                   Union
                                   select b.coupon_name as name,a.deduct_pt as pt,a.receive_date as date from coupon_detail as a join coupon as b on a.coupon_id=b.coupon_id  where mem_id =$mem_id
                                  union
                                   select b.qst_name ,a.reward_pt as pt,a.qd_date as date from question_detail as a join questionnaire as b on a.qst_id=b.qst_id where mem_id=$mem_id
                                  union
                                    select b.gift_name as name ,a.red_point as pt,a.changedate as date from giftdetail as a join gift as b on a.gift_id=b.gift_id where mem_id=$mem_id
                                   
                                   ) as A
                                   order by A.date DESC";
                            $query = $db->prepare($sql);
                            $query->execute();
                            while($row=$query->fetch(PDO::FETCH_ASSOC)){
                                
                                if($row['reward_pt']<0){$img="pic09.png";}else{$img="pic10.png";}
                                if($row['date']!= '0000-00-00'){
                                  echo'<div class="table-wrapper" style="margin-top:30px; background:#3C3C3C;">
                                          <table class="alt" style=" background:#3C3C3C; ">
                                              <tbody style=" background:#3C3C3C; ">
                                              <tr style=" background:#3C3C3C; ">
                                                  <td rowspan="2" style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:120px;height:120px;" src="../../image/pic04.jpg" alt="" /></td>
                                                  <td rowspan="2" style="width:40%;border-color:#3C3C3C;color:#FFFFFF;text-align:left;display: table-cell;vertical-align:middle;font-size:16px;">
                                                      '.$row['pt'].'</br>
                                                      日期:'.$row['date'].'</br>
                                                      說明:'.$row['name'].'
                                                  </td>
                                                  <td style="width:20%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:35px;height:35px;" src="../../image/'.$img.'" alt="" /></td>
                                              </tr>
                                              </tbody>
                                          </table>
                                          </div>
                                        <div style="background:#FFFFFF;height:5px;width:300px;margin: 0px auto;margin-top:10px"> </div>';
                                }else{
                                  echo'<div class="table-wrapper" style="margin-top:30px; background:#3C3C3C;">
                                          <table class="alt" style=" background:#3C3C3C; ">
                                              <tbody style=" background:#3C3C3C; ">
                                              <tr style=" background:#3C3C3C; ">
                                                  <td rowspan="2" style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:120px;height:120px;" src="../../image/pic04.jpg" alt="" /></td>
                                                  <td rowspan="2" style="width:40%;border-color:#3C3C3C;color:#FFFFFF;text-align:left;display: table-cell;vertical-align:middle;font-size:16px;">
                                                      '.$row['pt'].'</br>
                                                      日期:'.$row['date'].'</br>
                                                      說明:'.$row['name'].'(尚未領取)
                                                  </td>
                                                  <td style="width:20%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:35px;height:35px;" src="../../image/'.$img.'" alt="" /></td>
                                              </tr>
                                              </tbody>
                                          </table>
                                          </div>
                                        <div style="background:#FFFFFF;height:5px;width:300px;margin: 0px auto;margin-top:10px"> </div>';




                                }
                                }
                                                           
                            
                          break;


                        
                        default:
                          # code...
                          break;
                      }
            break;
            case 'ticket':
                      switch ($val) {
                        case 'list':  //select all  store
                        $db=new PDOConfig;
                        $id=$_SESSION['mem_id'];
                        $store_id=$_SESSION['storeid'];
                        $today = date("Y-m-d");

                        $sql = "SELECT  distinct(coupon_name),start_date,end_date,use_enddate,ps,coupon_id,e.coupon_type_id
                                FROM member as a join shopdetail as b on a.mem_id=b.mem_id 
                                join store as c on b.store_id=c.store_id
                                join coupon as d on c.store_id=d.store_id
                                join coupon_type as e on d.coupon_type_id=e.coupon_type_id
                                where a.mem_id = $id and c.store_id = $store_id
                                and use_flag = 'Y'
                                and CURDATE() between start_date and end_date"
                                ;
                        $query = $db->prepare($sql);
                        $query->execute();
                        while($row=$query->fetch(PDO::FETCH_ASSOC)){
                         

                          echo '
                                    <table class="alt" style=" background:#3C3C3C; ">
                                        <tbody style=" background:#3C3C3C; ">
                                            <tr style=" background:#3C3C3C; ">';
                          if($row['coupon_type_id']==1){
                          echo      '<td rowspan="1" style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:100px;height:100px;" src="../../image/discounts.jpg" alt="" /></td>';
                          }else{
                          echo      '<td rowspan="1" style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:100px;height:100px;" src="../../image/coupons.jpg" alt="" /></td>';  
                          echo      '<td style="border-color:#3C3C3C;color:#FFFFFF;display: table-cell;vertical-align:middle">
                                                    '.$row['coupon_name'].'</br>
                                                    發放日:'.$row['start_date'].'</br>
                                                    兌換截止日:'.$row['end_date'].'</br>
                                                    使用到期日:'.$row['use_enddate'].'</br>
                                                    說明:'.$row['ps'].'</br>
                                                </td>                                                
                                            </tr>  
                                            <tr style=" background:#3C3C3C; ">

                                                <td style="margin-top:5px;border-color:#3C3C3C;color:#FF0000;text-align:center;display: table-cell;vertical-align:middle;"></br>領取期限剩餘:'.((strtotime($row['end_date']) - strtotime($today))/86400).'天</td>
                                                <td style=" background:#3C3C3C;border-color:#3C3C3C;text-align:center;vertical-align:middle;">
                                                    <button  name="'.$row['coupon_id'].'" style="height:40px;width:100px;background:#33CCFF;border-color:#33CCFF;border-radius:10px;color:#FFFFFF;text-align:center;margin:0 auto;" onclick="couid('.$row['coupon_id'].')" ><a href="#pagetwo" >兌換禮卷</button></a> </td>
                                            </tr>    
                                        </tbody>
                                    </table>
                                    <HR color="#FFFFFF";size="5";width="80%";align="center">
                                ';
                          }}
                        break;
                      case 'use':  //select all  store
                        $db=new PDOConfig;
                        $id=$_SESSION['mem_id'];
                        $store_id=$_SESSION['storeid'];
                        $today=date("Y-m-d");
                        $sql = "SELECT receive_date,use_enddate,ps,coupon_detail_id,e.coupon_type_id
                                FROM coupon_detail as b join coupon as c on b.coupon_id = c.coupon_id 
                                join store as d on c.store_id=d.store_id
                                join coupon_type as e on c.coupon_type_id=e.coupon_type_id 
                                where mem_id = 2 and d.store_id <>0 and  CURDATE() between start_date and use_enddate";
                        $query = $db->prepare($sql);
                        $query->execute();
                        while($row=$query->fetch(PDO::FETCH_ASSOC)){


                          echo '<table class="alt" style=" background:#3C3C3C; ">
                                        <tbody style=" background:#3C3C3C; ">
                                            <tr style=" background:#3C3C3C; ">';
                          if($row['coupon_type_id']==1){
                          echo '<td rowspan="1" style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:100px;height:100px;" src="../../image/discounts.jpg" alt="" /></td>';
                          }else{
                          echo '<td rowspan="1" style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:100px;height:100px;" src="../../image/coupons.jpg" alt="" /></td>';                      


                          echo                      '<td style="border-color:#3C3C3C;color:#FFFFFF;display: table-cell;vertical-align:middle">
                                                    領取日:'.$row['receive_date'].'</br>
                                                    使用期限:'.$row['use_enddate'].'</br>
                                                    說明:'.$row['ps'].'</br>
                                                </td>                                                                                      
                                            </tr>  
                                            <tr style=" background:#3C3C3C; ">
                                                <td style="margin-top:5px;border-color:#3C3C3C;color:#FF0000;text-align:center;display: table-cell;vertical-align:middle;">使用期限剩餘:'.((strtotime($row['use_enddate']) - strtotime($today))/86400).'天</td>
                                                <td style=" background:#3C3C3C;border-color:#3C3C3C;text-align:center;vertical-align:middle;">
                                                    <button style="height:40px;width:100px;background:#33CCFF;border-color:#33CCFF;border-radius:10px;color:#FFFFFF;text-align:center;margin:0 auto;" onclick="use('.$row['coupon_detail_id'].')"><a href="#pageuse1">使用禮卷</button></a> </td>
                                            </tr>    
                                        </tbody>
                                    </table>
                                    <HR color="#FFFFFF";size="5";width="80%";align="center">';
                          }}
                        break;
                        case 'detail':  //select all  store
                        $db=new PDOConfig;
                        $id=$_SESSION['mem_id'];
                        $store_id=$_SESSION['storeid'];
                        $today=date("Y-m-d");
                        $sql = "SELECT start_date,end_date,use_date,receive_date,a.coupon_type_id  
                                FROM coupon as a join coupon_detail as b on a.coupon_id=b.coupon_id
                                join coupon_type as c on a.coupon_type_id = c.coupon_type_id
                                where mem_id=$id and store_id=$store_id
                                Limit 10";
                        $query = $db->prepare($sql);
                        $query->execute();
                        while($row=$query->fetch(PDO::FETCH_ASSOC)){
                            echo '<div class="table-wrapper" style="margin-top:1px; background:#3C3C3C;">
                                        <table class="alt" style=" background:#3C3C3C; ">
                                            <tbody style=" background:#3C3C3C; ">
                                                <tr style=" background:#3C3C3C; ">';
                            if($row['coupon_type_id']==1){
                                 echo                    '<td rowspan="1" style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:100px;height:100px;" src="../../image/discounts.jpg" alt="" /></td>';
                            }else{
                                  echo                    '<td rowspan="1" style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:100px;height:100px;" src="../../image/coupons.jpg" alt="" /></td>';
                            }


                          if($row['use_date']==0){                            
                            echo                    '<td style="border-color:#3C3C3C;color:#FFFFFF;display: table-cell;vertical-align:middle">
                                                        發放日:'.$row['start_date'].'</br>
                                                        截止日:'.$row['end_date'].'</br>
                                                        取得日:'.$row['receive_date'].'</br>
                                                    </td>
                                                    <td style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:35px;height:35px;" src="../../image/pic09.png" alt="" /></td>
                                                </tr>      
                                            </tbody>
                                        </table>                                      
                                 </div>';
                          }else{
                            echo                     '<td style="border-color:#3C3C3C;color:#FFFFFF;display: table-cell;vertical-align:middle">
                                                        發放日:'.$row['start_date'].'</br>
                                                        截止日:'.$row['end_date'].'</br>
                                                        使用日:'.$row['use_date'].'</br>
                                                    </td>
                                                    <td style="width:30%;border-color:#3C3C3C;color:#3C3C3C;text-align:center;display: table-cell;vertical-align:middle;"><img style="width:35px;height:35px;" src="../../image/pic15.png" alt="" /></td>
                                                </tr>      
                                            </tbody>
                                        </table>                                      
                                 </div>';
                              }
                          }
                        break;
                        
                      }
        break;
    default:
      # code...
      break;
  }


}
function connectstorelist($decide,$val){
  switch ($decide) {

                          case 'name':
                          $db=new PDOConfig;
                          $id=$val;
                          $sql = "SELECT * from store where store_id =$id";
                          $query = $db->prepare($sql);
                          $query->execute();
                          $result = $query->fetchall(PDO::FETCH_OBJ);
                            $name=$result[0]->store_name;
                            echo $name;
                            unset($db);
                            break;
                          case 'intro':
                            $db=new PDOConfig;
                            $id=$val;
                            $sql = "SELECT * from store where store_id =$id";
                            $query = $db->prepare($sql);
                            $query->execute();
                            $result = $query->fetchall(PDO::FETCH_OBJ);
                            $name=$result[0]->store_intro;
                            echo $name;
                            break;
                          case 'aclist':
                            $db=new PDOConfig;
                            $id=$val;
                            $sql = "SELECT ad_words,start_date,end_date FROM `activity` where store_id = $id and CURDATE() between start_date-1 and end_date order by start_date DESC";
                            $query = $db->prepare($sql);
                            $query->execute();
                            while($row=$query->fetch(PDO::FETCH_ASSOC)){
                              $i=1;
                              echo ''.$i.'.  '.$row['start_date'].'~'.$row['end_date'].'  '.$row['ad_words'].'
                                            </br>';
                              $i=$i+1;

                            }
                            break;
                          case 'imgtype':
                            $db=new PDOConfig;
                            $id=$val;
                            $sql = "SELECT * from store where store_id =$id";
                            $query = $db->prepare($sql);
                            $query->execute();
                            $result = $query->fetchall(PDO::FETCH_OBJ);
                            $imgtype=$result[0]->imgtype;
                            echo $imgtype;
                            unset($db);


                          break;
                          default:
                            echo "error";
                            break;




  }

}
function photo($decide){
  switch ($decide) {

                          case 'view':
                          $db=new PDOConfig;
                          $id=$_SESSION['mem_id'];
                          $sql = "SELECT imgtype FROM `activity` where CURDATE() between start_date and end_date LIMIT 3";
                          $query = $db->prepare($sql);
                          $query->execute();
                          while($row=$query->fetch(PDO::FETCH_ASSOC)){

                          echo '<div >
                                  <img   src="src=../../../../../store/StoreManage/picture/activity/'.$row['imgtype'].'" style="width: 100%;height: 100%;" />
                                  </div>
                                  ';
                                }
                            break;
                          default:
                            echo "error";
                            break;




  }

}









 ?>
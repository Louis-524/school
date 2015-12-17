function viewdatejs() {
    var self = this;
    var a=[];

    this.view = function(qst_type){
      var decide="list";
       a =[qst_type,decide];
      $.ajax({
        url: "./model/question.php",
        type:"get",
        data:{a:a},
        datatype:"text",//回傳的資料型態
        success: function(data){
              if(data==true)
              {
                   window.alert('成功');

              }
              else if(data == "re")
              {
                window.alert('cellphone已註冊');
                location.reload();

              }
              else
              {
                  document.getElementById("abc").innerHTML = data;
                  console.log();
              }
          },
          error:function(xhr, ajaxOptions, thrownError){
                    console.log(xhr.status);
                    console.log(thrownError);
                 }

        });




      }
      this.insert = function(){
      $decide=$('#decide').val();
      $number=$('#number').val();
      $qstid=$('#qstid').val();
      $answer=[];
      $qstbid=[];
      var n=0;
      for (var i=1; i<6; i++) {
          $qstbid[n]=$('#qstbid'+i).val();
          var str="input[name=answer";
          str=str+i+"]:checked";
          $answer=$(str).val();
          n=n+1;
      }
      $.ajax({
      url: "./model/question.php",
      type:"GET",
      data: $('#insert_form').serialize(),
      datatype:"text",//回傳的資料型態
      success: function(data){
              if(data==true)
              {
                  window.alert('成功');
                  document.location.href="../home/home.php";
              }
              else if(data == 2)
              {
                window.alert('未填寫完成');
              }
              else if(data == 1)
              {

                window.alert('空值');
              }
              else
              {
                  //location.reload();
                  window.alert(data);
              }
          },
          error:function(xhr, ajaxOptions, thrownError){
                    console.log(xhr.status);
                    console.log(thrownError);
                 }

        });
    }

}
var viewdate = new viewdatejs();
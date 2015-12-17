function giftjs() {
    var self = this;
    var a=[];
    var ins=[];

    this.view = function(qst_type){
      var decide="list";
       a =[qst_type,decide];
      $.ajax({
        url: "./model/gift.php",
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
      this.insert = function(Quantity,gift_id,red_point){
      var decide="insert";
      ins =[Quantity,gift_id,red_point];
      $.ajax({
        url: "./model/gift.php",
        type:"get",
        data:{ins:ins},
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
              else if(data == "zero")
              {
                window.alert('已被兌換完畢');
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

}
var giftdate = new giftjs();
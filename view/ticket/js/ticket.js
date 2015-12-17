function ticketjs() {
    var self = this;
    var a=[];

    this.view = function(cou_id){  
      var decide="list";
      a=[cou_id,decide];    
      $.ajax({
        
        url: "./model/ticket.php",
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

              }else
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
      this.insert = function(pt,couid,total){  
      var decide="insert";
      ins = [pt,couid,total];    
      $.ajax({
        
        url: "./model/ticket.php",
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

              }else
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
      this.use = function(coudetailid){  
      var decide="use";
      a=[coudetailid,decide];     
      $.ajax({
        
        url: "./model/ticket.php",
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

              }else
              {
                document.getElementById("cba").innerHTML = data;
                  console.log();             
                   }
          },
          error:function(xhr, ajaxOptions, thrownError){
                    console.log(xhr.status);
                    console.log(thrownError);
                 }

        });




      }
      this.upuse = function(coudtid){  
      var decide="upuse";
      a=[coudtid,decide];     
      $.ajax({
        
        url: "./model/ticket.php",
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

              }else
              {
                document.getElementById("cba").innerHTML = data;
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
var ticketdata = new ticketjs();
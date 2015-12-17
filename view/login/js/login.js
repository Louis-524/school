function loginjs() {
    var self = this;

    this.login = function(){
     $cellphones=$('#cellphone').val();
      $passwords=$('#password').val();
      $decide=$('#decide').val();
      $.ajax({
      url: "./model/login.php",//連接
      type:"POST",//傳送方式
      data: $('#login_form').serialize(),//傳送去server
      datatype:"text",//回傳的資料型態
      success: function(data){
              if(data==true)
              {
                  document.location.href="../home/home.php";
              }
              else
              {
                  location.reload();
              }
          },
          error:function(xhr, ajaxOptions, thrownError){
                    console.log(xhr.status);
                    console.log(thrownError);
                 }

        });
    }
    this.insert = function(){
      $cellphone=$('#cellphone').val();
      $password=$('#password').val();
      $name=$('#name').val();
      $gender=$('#gender').val();
      $decide=$('#decide').val();
      $password2=$('#password2').val();
      $.ajax({
      url: "./model/login.php",
      type:"POST",
      data: $('#insert_form').serialize(),
      datatype:"text",//回傳的資料型態
      success: function(data){
              if(data==true)
              {
                  document.location.href="../home/home.php";
              }
              else if(data == "re")
              {
                window.alert('cellphone已註冊');
                location.reload();

              }
              else if(data == "bo")
              {
                //location.reload();
                window.alert('空值');
              }
              else
              {
                  location.reload();
                  window.alert('失敗');
              }
          },
          error:function(xhr, ajaxOptions, thrownError){
                    console.log(xhr.status);
                    console.log(thrownError);
                 }

        });
    }


}
var LoginData = new loginjs();
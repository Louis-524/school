function updatejs() {
    var self = this;


    this.update = function(){
      $password=$('#password').val();
      $name=$('#name').val();
      $address=$('#address').val();
      $birthday=$('#birthday').val();
      $decide=$('#decide').val();
      $gender=$('#gender').val();
      if($name.length == 0)
      {
          window.alert('姓名不可為空值');
          location.reload();

      }
      else if($password.length < 4 || $password.length > 8)
      {
          window.alert('密碼格式錯誤');
          location.reload();
      }
      else if($address.length == 0)
      {
          window.alert('地址不可為空值');
          location.reload();
      }
      else if($birthday.length == 0)
      {
          window.alert('生日不可為空值');
          location.reload();
      }
      else{



      $.ajax({
      url: "./model/member.php",
      type:"POST",
      data: $('#update_form').serialize(),
      datatype:"text",//回傳的資料型態
      success: function(data){
              if(data==true)
              {
                  document.location.href="../member/member_home.php";

              }
              else if(data == "re")
              {
                window.alert('cellphone已註冊');
                location.reload();

              }
              else
              {
                  location.reload();
                  window.alert('更新失敗');
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
}
var updateData = new updatejs();
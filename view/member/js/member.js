function updatejs() {
    var self = this;


    this.update = function(){
      var password=$('#password').val();
      var name=$('#name').val();
      var address=$('#address').val();
      var birthday=$('#birthday').val();
      var decide=$('#decide').val();
      var file_data = $("#uploadImage").prop('files')[0];  
      var form = document.getElementById("update_form");
      for (var i=0; i<form.gender.length; i++)
      {
         if (form.gender[i].checked)
         {
            var gender = form.gender[i].value;
         }
      }
      if(name.length == 0)
      {
          window.alert('姓名不可為空值');
          location.reload();

      }
      else if(password.length < 4 || password.length > 8)
      {
          window.alert('密碼格式錯誤');
          location.reload();
      }
      else if(address.length == 0)
      {
          window.alert('地址不可為空值');
          location.reload();
      }
      else if(birthday.length == 0)
      {
          window.alert('生日不可為空值');
          location.reload();
      }
      else{
      var form_data = new FormData();                  
      form_data.append('file', file_data);     
      form_data.append('gender', gender);     
      form_data.append('decide', decide);     
      form_data.append('birthday', birthday);     
      form_data.append('address', address);     
      form_data.append('name', name);
      form_data.append('password', password);


      $.ajax({
      url: "./model/member.php",
      type:"POST",
      data: form_data,
      contentType: false,       
      cache: false,             
      processData:false,
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
                  //location.reload();
                  window.alert(data);
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
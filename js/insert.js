function loginjs() {
    var self = this;

    this.login = function(){
    	$cellphones=$('#cellphone').val();
      $passwords=$('#password').val();
      $.ajax({
      url: "./model/login.php", 
      type:"POST",
      data: $('#login_form').serialize(),
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
}
var LoginData = new loginjs();
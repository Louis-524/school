function sub(){
      $cellphones=$('#cellphone').val();
      $passwords=$('#password').val();
      $.ajax({
      url: "../../model/login/getdata.php", 
      type:"POST",
      data:{cellphone:$cellphones,password:$passwords},
      datatype:"text",
      success: function(data){
              if(data==true)
              {
                  document.location.href="../../view/home.php";
              }
              else
              {
                  document.location.href="../../view/login/login_home.php";
              }
          },
          error:function(xhr, ajaxOptions, thrownError){ 
                    alert(xhr.status); 
                    alert(thrownError);
                 }

        });
      //document.location.href="home.html";
    }
	
	
function insert(){
      $cellphone=$('#setuser').val();
      $password=$('#passwd').val();
      $username=$('#username').val();
      //alert($username);
      $.ajax({
      url: "../../model/login/signin.php", 
      type:"POST",
      data:{cellphone:$cellphone,password:$password,username:$username},
      success: function(){
            document.location.href="../../view/home.php";
          },
             error:function(xhr, ajaxOptions, thrownError){ 
                    alert(xhr.status); 
                    alert(thrownError);
                 }
             });
    }

function getuserdataaction(cellphone,password){

	$.ajax({
			url: "../model/getdata.php",	
			type:"post",
			data:{cellphone:cellphone,password:password}
			success: function(Data){
				
					}
					});

}
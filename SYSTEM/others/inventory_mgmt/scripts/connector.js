var stat="";
Tooooo();
// call this scripts only when there is internet connection
	function Tooooo(){
		$.ajax({
		  url: "../test1.php",
		  cache: false,
		  success: function(data){
			//$(".refresh").html(data);
			//response
			stat=data;
			if(stat=="MOPARI"){
				t=setTimeout("Tooooo()",1000);
				stat="";
			}
		  },
		  error:function (xhr, status, err){
		  Tooooo();
			//alert(xhr.responseText);
		  }
		});
	}
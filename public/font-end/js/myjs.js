

$(document).ready(function(){
	$('a.update-sp').click(function(){
		var rowid = $(this).attr('id');
		var token = $(this).parent().parent().parent().find("input[name='_token']").val();
		var qty	  = $(this).parent().parent().find("#qty").val();

		// $.ajax({
		// 	url: 'update/'+rowid+'/'+qty, 
		// 	type: 'GET',
		// 	cache:false,
		// 	data:{"id":rowid, "qty":qty,"token":token},
		// 	success:function(data){
		// 		if(data == "oke"){
		// 			alert(1);
		// 		}
		// 	}
		// });

		$.ajax({
    		url: 'update/'+rowid+'/'+qty,
    		type: 'GET',
    		cache: false,
    		data: {"id":rowid,"qty":qty,"token":token},
    		success:function(data){
    			if(data == "oke"){
    				window.location ="gio-hang";
    			}
    			else{ alert('Xảy ra lỗi!');}
    		}
    	});
	});
});
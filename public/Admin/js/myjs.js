$(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
$('div.alert').delay(3000).slideUp();

$(document).ready(function() {
    $('#addImages').click(function(){
		$('#insert').append('<div class="form-group"><input type="file" name="f-Edit-detail[]"></div>');
	});
});
function Xacnhanxoa(msg){
    if(window.confirm(msg)){
        return true;
    }else return false;
}

$(document).ready(function() {
    $('a#del-img').on('click',function(){
    	var url = "http://localhost/NTLar/Admin/product/delimg/";
    	var _token = $("form[name='edit']").find("input[name='_token']").val();
    	var idHinh = $(this).parent().find('img').attr('idHinh');
    	var id = $(this).parent().find('img').attr('id');
    	var src = $(this).parent().find('img').attr('src');
    	$.ajax({
    		url: url + idHinh,
    		type: 'GET',
    		cache: false,
    		data: {"_token":_token,"id":idHinh,"urlHinh":src},
    		success:function(data){
    			if(data == "Oke"){
    				$('div.form-group#'+id).remove();
    			}
    			else{ alert('Xảy ra lỗi!');}
    		}
    	});
    });
});
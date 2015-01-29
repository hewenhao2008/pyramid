function validate(){
	$('input').each(function(){
		var this_input_value = $(this).val();
		if (this_input_value == null) {
			alert('请正确填写相关字段');
			return false;
		};
	});
}
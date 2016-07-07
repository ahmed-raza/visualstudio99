$(document).ready(function(){
	$('.alert').hide();
	$('#sendForm').submit(function(e){
		e.preventDefault();
		var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var message = $('#message').val();
		$.ajax({
			url: 'scripts/php/send.php',
			data: { name: name, email: email, phone: phone, message: message },
			dataType: 'json',
			success: function(data){
				if (data.status == 'success') {
					$('.alert.alert-success').show();
					$('.alert.alert-danger').hide();
					$('.alert.alert-success#feedback').text(data.message);
				}
				if (data.status == 'error') {
					$('.alert.alert-success').hide();
					$('.alert.alert-danger').show();
					$('.alert.alert-danger#feedback').text(data.message);
				}
			}
		});
	});
});
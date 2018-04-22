$(document).ready(function () {

	$('#home').on('click', function (event) {
		$.ajax({
			cache: false,
			url: "home",
			type: 'post',
			success: function (result) {
				$('#container').empty();
				$('#container').append(result);
			}
		});
	});

	$('#addMessageSubmit').on('click', function () {

		// var title = $("input[id='addMessageTitle']").val();
		var title = $("#addMessageTitle").val();
		var content = $("#addMessageContent").val();
		var priority = $("#addMessagePriority").val();
		var data = new FormData();
		 data.append('title', title);
		 data.append('content', content);
		 data.append('priority', priority);
		$.ajax({
			cache: false,
			url: "roman",
			data: data,
			type: 'post',
			processData: false,
			contentType: false,
			success: function (result) {
				//$('#addMessage').modal('hide');
				$('#container').empty();
				$('#container').append(result);
				// return false;

			}
		});
	});

	$('.editMessage').on('click', function () {
		console.log('edit Mess');
		var that = this;
		var id = that.parentNode.parentNode.parentNode.parentNode.children[0].textContent.trim()
		// console.log(that.parentNode.parentNode.parentNode.parentNode.children[0].textContent.trim());
		var title = that.parentNode.parentNode.parentNode.parentNode.children[1].textContent.trim()
		var content = that.parentNode.parentNode.parentNode.parentNode.children[2].textContent.trim()
		var priority = that.parentNode.parentNode.parentNode.parentNode.children[3].textContent.trim() == 'asc' ? 1 : 2;
		console.log(title);
		console.log(content);
		$("#editMessageId").val(id);
		$("#editMessageTitle").val(title);
		$("#editMessageContent").text(content);
		$("#editMessagePriority option[value=" + priority + "]").prop('selected', true);


	});
	
	$('.destroyMessage').on('click', function () {
		console.log('destroy Mess');
		var that = this;
		var id = that.parentNode.parentNode.parentNode.parentNode.children[0].textContent.trim()
		var data = new FormData();
		data.append('id', id);
		$.ajax({
			cache: false,
			url: "destroymessage",
			data:data,
			type: 'post',
			processData: false,
			contentType: false,
			success: function (result) {
				
				$('#container').empty();
				$('#container').append(result);
			}
		})

	});

	$('#editMessageSubmit').on('click', function () {
		var id = $("#editMessageId").val();
		var title = $("#editMessageTitle").val();
		var content = $("#editMessageContent").val();
		var priority = $("#editMessagePriority").val();
		var data = new FormData();
		data.append('id', id);
		data.append('title', title);
		data.append('content', content);
		data.append('priority', priority);
		 $.ajax({
		 cache: false,
		 url: "editmessage",
		 data:data,
		 type: 'post',
		 processData: false,
		 contentType: false,
		 success: function (result) {

		 $('#container').empty();
		 $('#container').append(result);
		 }
		 });
	});

	$('#messages').on('click', function () {
		$.ajax({
			cache: false,
			url: "messages",
			type: 'post',
			success: function (result) {
				$('#container').empty();
				$('#container').append(result);
			}
		});
	});

	$('#signout').on('click', function (event) {
		$.ajax({
			cache: false,
			url: "signout",
			type: 'post',
			success: function (result) {
				$('#container').empty();
				$('#container').append(result);
			}
		});
	});

	$('#signinButton ').on('click', function () {
		var username = $("input[id='inputName']").val();
		var pass = $("input[id='inputPassword']").val();
		var data = new FormData();
		data.append('username', username);
		data.append('pass', pass);
		$.ajax({
			data: data,
			cache: false,
			// dataType: 'json',
			url: "signin",
			type: 'post',
			processData: false,
			contentType: false,
			success: function (result) {
				if (result == 'error') {
					$('#errorMessage').html('Incorrect user data!!!');
					setTimeout(function () {
						$('#errorMessage').html('')
					}, 2000)
				}
				else {
					$('#container').empty();
					$('#container').append(result);
				}
			},

		});
	});

})
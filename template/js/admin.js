$(document).ready(function () {
function rewriteContainer (result){
	$('#container').remove();
	$('#empty').before(result);
}

	$('body').on('click', '#home', function () {
		$.ajax({
			cache: false,
			url: "home",
			type: 'post',
			success: function (result) {
				rewriteContainer(result);
			}
		});
	});

	$('body').on('click', '#feedback', function () {
		$.ajax({
			cache: false,
			url: "feedback",
			type: 'post',
			success: function (result) {
				rewriteContainer(result);
			}
		});
	});

	$('body').on('click', '#feedbacks', function () {
		$.ajax({
			cache: false,
			url: "showAllFeedbacks",
			type: 'post',
			success: function (result) {
				rewriteContainer(result);
			}
		});
	});

	$('body').on('click', '#signout', function () {
		$.ajax({
			cache: false,
			url: "signout",
			type: 'post',
			success: function (result) {
				$('#menu').remove();
				rewriteContainer(result);;
			}
		});
	});

	$('body').on('click', '#signinButton ', function () {
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
				} else {
					rewriteContainer(result);
				}
			},

		});
	});

	$('body').on('click', '#sendFeedbackButton', function (e) {
		e.preventDefault();
		e.stopPropagation();
		var username = $("#username").val();
		var email = $("#email").val();
		var type = $("#type").val();
		var title = $("#title").val();
		var text = $("#text").val();
		var data = new FormData();
		data.append('username', username);
		data.append('email', email);
		data.append('type', type);
		data.append('title', title);
		data.append('text', text);
		$.ajax({
			cache: false,
			url: "addFeedback",
			data: data,
			type: 'post',
			processData: false,
			contentType: false,
			success: function (result) {
				rewriteContainer(result);
			}
		});
	});

	$('body').on('click', '.paginationLink', function (e) {
		e.preventDefault();
		e.stopPropagation();
		var selectedPage = $(this).text();
		var statusFilterValue = $("#statusFilter").val();
		var typeFilterValue = $("#typeFilter").val();

		var data = new FormData();
		data.append('selectedPage', selectedPage);
		data.append('statusFilter', statusFilterValue);
		data.append('typeFilter', typeFilterValue);
		$.ajax({
			cache: false,
			url: "getFeedbacksByFilters",
			data: data,
			type: 'post',
			processData: false,
			contentType: false,
			success: function (result) {
				$('#feedbackBoard').html(result);
			}
		});
	});

	$('body').on('click', '.showDetail', function (e) {
		e.preventDefault();
		e.stopPropagation();
		var feedbackId = this.href.split('/')[4];
		var data = new FormData();
		data.append('feedbackID', feedbackId);
		$.ajax({
			cache: false,
			url: "showDetail",
			data: data,
			type: 'post',
			processData: false,
			contentType: false,
			success: function (result) {
				rewriteContainer(result);
			}
		});
	});

	$('body').on('change', '#statusFilter, #typeFilter', function () {

		var statusFilterValue = $("#statusFilter").val();
		var typeFilterValue = $("#typeFilter").val();
		var data = new FormData();
		data.append('typeFilter', typeFilterValue);
		data.append('statusFilter', statusFilterValue);
		$.ajax({
			cache: false,
			url: "getFeedbacksByFilters",
			data: data,
			type: 'post',
			processData: false,
			contentType: false,
			success: function (result) {
				$('#feedbackBoard').html(result);
			}
		});
	});

	$('body').on('click', '#answerButton', function () {
		var feedbackId = $("#feedbackId").val();
		var email = $("#email").val();
		var data = new FormData();
		data.append('feedbackId', feedbackId);
		data.append('email', email);
		$.ajax({
			cache: false,
			url: "getAnswerForm",
			data: data,
			type: 'post',
			processData: false,
			contentType: false,
			success: function (result) {
				rewriteContainer(result);
			}
		});
	});

	$('body').on('click', '#rejectButton', function () {
		var feedbackId = $("#feedbackId").val();
		var data = new FormData();
		data.append('feedbackId', feedbackId);
		$.ajax({
			cache: false,
			url: "rejectFeedback",
			data: data,
			type: 'post',
			processData: false,
			contentType: false,
			success: function (result) {
				rewriteContainer(result);
			}
		});
	});

	$('body').on('click', '#sendAnswerButton', function () {
		var feedbackId = $("#feedbackId").val();
		var email = $("#email").val();
		var message = $("#message").val();
		var data = new FormData();
		data.append('feedbackId', feedbackId);
		data.append('email', email);
		data.append('message', message);
		$.ajax({
			cache: false,
			url: "sendAnswer",
			data: data,
			type: 'post',
			processData: false,
			contentType: false,
			success: function (result) {
				rewriteContainer(result);
			}
		});
	});
})

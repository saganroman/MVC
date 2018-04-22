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

    $('#messages').on('click', function (event) {
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

    $('#addMessageSubmit').on('click', function () {
        alert('asd');
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
            url: "addMessage",
            data:data,
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
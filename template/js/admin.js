$(document).ready(function () {


    $('#messages').on('click', function (event) {
        event.preventDefault()
        alert('messages');
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
        event.preventDefault()
        alert('sda');
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
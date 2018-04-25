$(document).ready(function () {
    setInterval(function () {
        if (($('h1').text() == " Messages board User")) {
            $.ajax({
                cache: false,
                url: "messages",
                type: 'post',
                processData: false,
                contentType: false,
                success: function (result) {
                    $('#container').remove();
                    $('#empty').before(result);
                }
            })
        }
    }, 1000)

    $('body').on('click', '.editMessage', function () {
        var that = this;
        var id = that.parentNode.parentNode.parentNode.parentNode.children[0].textContent.trim()
        var title = that.parentNode.parentNode.parentNode.parentNode.children[1].textContent.trim()
        var content = that.parentNode.parentNode.parentNode.parentNode.children[2].textContent.trim()
        var priority = that.parentNode.parentNode.parentNode.parentNode.children[3].textContent.trim() == 'asc' ? 1 : 2;
        $("#editMessageId").val(id);
        $("#editMessageTitle").val(title);
        $("#editMessageContent").text(content);
        $("#editMessagePriority option[value=" + priority + "]").prop('selected', true);


    });

    $('body').on('click', '#home', function () {
        $.ajax({
            cache: false,
            url: "home",
            type: 'post',
            success: function (result) {

                $('#container').remove();
                $('#empty').before(result);
                // $('body').append(result);
            }
        });
    });

    $('body').on('click', '#addMessageSubmit', function () {

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
            url: "addmes",
            data: data,
            type: 'post',
            processData: false,
            contentType: false,
            success: function (result) {
                //$('#addMessage').modal('hide');
                $('#container').remove();
                $('#empty').before(result);
                // return false;

            }
        });
    });

    $('body').on('click', '.destroyMessage', function () {
        var that = this;
        var id = that.parentNode.parentNode.parentNode.parentNode.children[0].textContent.trim()
        var data = new FormData();
        data.append('id', id);
        $.ajax({
            cache: false,
            url: "destroymessage",
            data: data,
            type: 'post',
            processData: false,
            contentType: false,
            success: function (result) {

                $('#container').remove();
                $('#empty').before(result);
            }
        })

    });

    $('body').on('click', '#editMessageSubmit', function () {
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
            data: data,
            type: 'post',
            processData: false,
            contentType: false,
            success: function (result) {

                $('#container').remove();
                $('#empty').before(result);
            }
        });
    });

    $('body').on('click', '#messages', function () {
        $.ajax({
            cache: false,
            url: "messages",
            type: 'post',
            success: function (result) {
                // $('#container').empty();
                $('#container').remove();
                $('#empty').before(result);
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
                $('#container').remove();
                $('#empty').before(result);
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
                }
                else {
                    $('#container').remove();
                    $('#empty').before(result);
                }
            },

        });
    });

})
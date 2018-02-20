$(document).ready(function () {
    var msg = $('#messages');
    $.ajax({
        url: '/api/generate-sms',
        type: 'GET',
        success: function (messages) {
            msg.html(messages); 
        },
        error: function(data){
            msg.html(data.status);
        }
    });
});
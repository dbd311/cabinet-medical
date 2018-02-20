var nbSMS = $('#nbSMS');
var nbRDV = $('#nbAppointments');

var SMS = $('#SMS');
var RDV = $('#RDV');

var SMSWrapper = $('#reminder-wrapper');
var RDVWrapper = $('#appointment-wrapper');

function loadStatistics() {
    $.ajax({
        url: '/api/get-statistics',
        type: 'GET',
        cache: false,
        success: function (results) {
            if (results.SMS > 0) {
                SMSWrapper.show();
                nbSMS.html(results.SMS);
                SMS.attr('title', 'Vous avez ' + results.SMS + ' SMS à envoyer aux patients aujourd\'hui');
            } else {
                nbSMS.html('');
                SMSWrapper.hide();
            }
            if (results.RDV > 0) {
                RDVWrapper.show();
                nbRDV.html(results.RDV);
                RDV.attr('title', 'Vous avez ' + results.RDV + ' rendez-vous en attente aujourd\'hui');
            } else {
                nbRDV.html('');
                RDVWrapper.hide();
            }

        },
        error: function (data) {
            alert('error');
        }
    });
}


$(document).ready(function () {
    loadStatistics();  
    $('[data-toggle="popover"]').popover();  
});

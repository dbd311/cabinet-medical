$(document).ready(function () {
    var url = document.getElementById('url');
    url = url.textContent;

    var pid = $('#pid').val();
    var detailView = $('#appointment-details');

    $.get(url + "/api/get-appointment-info/" + pid,
            function (data) {
                var c = data.customer;
                var details = '<h3>' + c.first_name + ' ' + c.last_name  + '</h3>' +
                        '<p><b>Email :</b> ' + c.email + '</p>' +
                        '<p><b>Tél :</b> ' + c.contact_number + '</p>' +
                        '<p><b>réservé pour :</b> <i>' + moment(data.appointment_datetime).format('DD-MM-YYYY [à] HH:mm') + '</i></p>';
                detailView.empty();
                detailView.append(details);

            });

});
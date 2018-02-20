$(document).ready(function () {

    var info = $('#info');
    $("#startdate").datepicker({
        inline: true,
        minDate: 0,
        dateFormat: 'dd-mm-yy'
    });
    $("#enddate").datepicker({
        inline: true,
        minDate: 0,
        dateFormat: 'dd-mm-yy'
    });


    $('#btnSubmit').click(function () {

        $.ajax({
            url: '/api/add-holiday',
            type: 'POST',
            data: $('#formAddHoliday').serialize(),
            success: function (results) {
                if (results.status === true) {
                    info.attr('class', 'text-success');
                    var startDate = $('#startdate').val();
                    var endDate = $('#enddate').val();
                    if (endDate === '' || endDate === 'undefined') {
                        endDate = startDate;
                    }
                    info.html('Les vacances à partir du "' + startDate + '" au "' + endDate + '" inclus (' + $('#note').val() + ') ont été ajoutées avec succès!');
                }
            },
            error: function (data) {
                info.attr('class', 'text-danger');
                info.html('Il est impossible d\'ajouter la date ou la période sélectionnée. Merci de choisir une autre date ou une autre période.');
            }
        });
    });

});
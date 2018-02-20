$(document).ready(function () {
    var url = document.getElementById('url');
    url = url.textContent;
    var cDate = new Date();
    var newAppointmentView = $('#new-appointment');
    var appointmentDetailsView = $('#appointment-details');
    var calendar = $('#calendar');
    var dashboard = $('#dashboard');
    var connexionInfo = $('#connexionInfo');
    var info = $('#info');
    var calendarView = $('#calendarView').val();
    if (!calendarView) {
        calendarView = 'agendaWeek';
    }
    

// Calendar initialization
    calendar.fullCalendar({
        editable: true,
        allDaySlot: false,
        minTime: '08:00:00',
        maxTime: '21:00:00',
        axisFormat: 'hh:mm a',
        timeFormat: 'HH:mm',
        columnFormat: 'ddd D/M',
        slotDuration: '00:15:00',
        header: {
            left: 'prev,next today',
            center: 'Appointments',
            right: 'month, agendaWeek, agendaDay'
        },
        defaultDate: cDate,
        defaultView: calendarView, //'agendaWeek',
        // API call returns a json feed
//        events: {
////            url: url + '/api/get-all-appointments',
//            url: url + '/api/get-year-appointments/' + cDate.getFullYear(),
//            error: function () {
//                $('#error').html('Could not find any appointments');
//            }
//        },
        eventSources: [
            {
                url: url + '/api/get-year-appointments/' + cDate.getFullYear()
            }
            //,
//            {
//                url: url + '/api/get-holidays/' + cDate.getFullYear(),
//                color: 'darkred',
//                textColor: 'black'
//            }
        ],
//        // a hook for modifying a day cell (jours feries)
        eventAfterAllRender: function (view) {
            // display dashboard
            dashboard.attr('class', 'visible');
            // display connexion information
            connexionInfo.attr('class', 'visible');
            //Use view.intervalStart and view.intervalEnd to find date range of holidays
            //Make ajax call to find holidays in range.
            $.ajax({
                url: '/api/get-holidays/' + cDate.getFullYear(),
                type: 'GET',
                success: function (holidays) {
//                    var d1 = moment('2017-04-11', 'YYYY-MM-DD');
//                    var d2 = moment('2017-04-14', 'YYYY-MM-DD');
//                    var d3 = moment('2017-04-15', 'YYYY-MM-DD');
//                    var holidays = [d1, d2, d3];                    
//                    console.log(holidays[0]['date']);
                    for (var i = 0; i < holidays.length; i++) {
                        var holidayMoment = moment(holidays[i]['date'], 'YYYY-MM-DD');
                        var e = $("td[data-date=" + holidayMoment.format('YYYY-MM-DD') + "]");
                        e.addClass('holiday');
                        e.attr('title', holidays[i]['note']);
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        },
        // Function to handle a day click event
        dayClick: function (date, jsEvent, view) {

            newAppointmentView.attr('class', 'visible');
            appointmentDetailsView.attr('class', 'hidden');
            info.text('');
            // set starting datetime
            $("#startsAt").val(date.format());
            $("#startsAtFormat").val(date.format('ddd DD/MM/YYYY [à] HH:mm'));
        },
        // Function to handle an event click event
        eventClick: function (calEvent, jsEvent, view) {

            newAppointmentView.attr('class', 'hidden');
            appointmentDetailsView.attr('class', 'visible');
            $.get(url + "/api/get-appointment-info?eventID=" + calEvent.id + '&_=' + new Date().getTime(),
                    function (data) {
                        var start = moment(calEvent.start).format('DD/MM/YYYY [à] HH:mm');
                        var end = moment(calEvent.end).format('DD/MM/YYYY [à] HH:mm');
                        $("#lastName").val(data.last_name);
                        //alert(data.last_name);
                        $("#firstName").val(data.first_name);
                        $("#phoneNumber").val(data.contact_number);
                        $("#mail").val(data.email);
                        $("#motifDetails").val(data.motif);
                        $('#typeDetails').prop('selectedIndex', data.appointment_type - 1);
                        $("#startTime").val(start);
                        $("#endTime").val(end);
                        $("#eventID").val(calEvent.id);
                        info.text('');
                    }
            );
        },
        eventDrop: function (event, delta, revertFunc) {

            $.post('/api/update-appointment?id=' + event.id + '&start=' + event.start.format(),
                    function (results) {
                        if (!confirm("Etes-vous sûr de déplacer ce créneau ?")) {

                            var serviceURI = '/api/update-appointment?id=' + event.id + '&start=' + results.previous_datetime;
                            $.post(serviceURI, function (results) {
                                calendar.fullCalendar('refetchEvents');
                            });
                        } else {
//                            appointmentDetailsView.attr('class', 'hidden');

                            var start = moment(event.start).format('DD/MM/YYYY [à] HH:mm');
                            var end = moment(event.end).format('DD/MM/YYYY [à] HH:mm');
                            $("#startTime").val(start);
                            $("#endTime").val(end);
                            // update statistics in the header bar
                            loadStatistics();
                        }
                    }
            );
        },
        eventMouseover: function (calEvent, jsEvent, view) {

//// change the border color just for fun
//            $(this).css('border-color', 'red');

            $(this).find(".fc-content").attr({"data-toggle": "popover", "title": calEvent.title, "data-content": calEvent.title});
            $(this).find(".fc-content").click(function () {
                $(this).popover('show');
            }, function () {
                $(this).popover('hide');
            });
        }
    });
    // -----end full calendar ---------------------
    function resetNewAppointmentForm() {
        $('#fname').val('');
        $('#lname').val('');
        $('#number').val('');
        $('#email').val('');
        $('#motif').val('');
        $('#typeRDV').prop('selectedIndex', 0);
    }

    function validateEmail(email) {

        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            return (true);
        }

        return (false);
    }

    function jsUcFirst(s) {
        return s.charAt(0).toUpperCase() + s.slice(1);
    }

    // send email after a booking
    function sendConfirmMail(emailID, formID, firstNameID, lastNameID, slotID) {
        var email = $(emailID).val();

        if (validateEmail(email)) {
            if (confirm("Voulez-vous envoyer un message de confirmation à l'adresse " + email + " ?")) {
                // send a confirmation email to patient for the available slot
                $.ajax({
                    url: '/api/confirm-appointment-by-email',
                    type: 'GET',
                    data: $(formID).serialize(),
                    success: function (results) {
                        info.append('<br>Le message de confirmation a été envoyé à ' + email);
                        console.log(results.message);
                    },
                    error: function (results) {
                        alert('Il est impossible d\'envoyer le message de conformation au patient. Veuillez réessayer ultérieurement.');
                    }
                }
                );
            } else {
                var firstName = $(firstNameID).val();
                var lastName = $(lastNameID).val();
                var slot = $(slotID).val();
                var message = 'Bonjour ' + jsUcFirst(firstName) + ' ' + lastName.toUpperCase() + ',' +
                        'Le prochain rendez-vous sera le ' + slot + ' au 18 rue du Général Mangin à Thionville (Moselle). ' +
                        'Est-ce que cela vous convient ?' +
                        'Cordialement, Cabinet d\'ostéopathie';
                console.log(message);
                alert(message);
            }
        }
    }

    // send email after a delete
    function sendDeleteMail(emailID, formID, firstNameID, lastNameID) {
        var email = $(emailID).val();
        if (validateEmail(email)) {
            var firstName = $(firstNameID).val();
            var lastName = $(lastNameID).val();
            
            if (confirm("Voulez-vous envoyer un message d'ANNULATION à l'adresse " + email + " <" + firstName + ' ' + lastName + "> ?")) {
                // send a confirmation email to patient for the available slot
                $.ajax({
                    url: '/api/cancel-appointment-by-email',
                    type: 'GET',
                    data: $(formID).serialize(),
                    success: function (results) {
                        info.append('<br>Le message d\'annulation a été envoyé à ' + email);
                        console.log(results.message);
                    },
                    error: function (results) {
                        alert('Il est impossible d\'envoyer le message d\'annulation au patient ' + email + '. Veuillez réessayer ultérieurement.');
                    }
                }
                );
            }
        }
    }


    $('#btnSubmit').click(function () {

        $.ajax({
            url: '/api/add-appointment',
            type: 'POST',
            data: $('#formAdd').serialize(),
            success: function (results) {
                calendar.fullCalendar('refetchEvents');
                info.attr('class', 'text-success');
                info.html('Le rendez-vous du <b>' + moment($("#startsAt").val()).format('DD/MM/YYYY [à] HH:mm') + '</b> a été ajouté avec succès!');
                loadStatistics();
                // hide form and send confirmation email to the patient if email sepcified
                newAppointmentView.attr('class', 'hidden');
                sendConfirmMail('#email', '#formAdd', '#fname', '#lname', '#startsAtFormat');
                resetNewAppointmentForm();
            },
            error: function (data) {
                window.location = '/admin/login';
            }
        });
    });
    $('#btnDelete').click(function () {

        if (confirm("Etes-vous sûr de supprimer ce créneau ?")) {

            $.ajax({
                url: '/api/delete-appointment',
                type: 'DELETE',
                data: $('#formUpdate').serialize(),
                success: function (results) {                   
                    // desactivate sending email to patient
                    // sendDeleteMail('#mail', '#formUpdate', '#firstName', '#lastName');
                    calendar.fullCalendar('refetchEvents');
                    appointmentDetailsView.attr('class', 'hidden');
                    
                    info.attr('class', 'text-success');
                    info.html('Le rendez-vous du <b>' + $("#startTime").val() + '</b> a été supprimé avec succès!');
                    loadStatistics();
                    
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });
        }
    });
    $('#btnModify').click(function () {
        
        $.ajax({
            url: '/api/update-customer-info',
            type: 'PUT',
            data: $('#formUpdate').serialize(),
            success: function (results) {
                sendConfirmMail('#mail', '#formUpdate', '#firstName', '#lastName', '#startTime');
                calendar.fullCalendar('refetchEvents');
                appointmentDetailsView.attr('class', 'hidden');
                info.attr('class', 'text-success');
                info.html('Les détails concernant le rendez-vous du <b>' + $("#startTime").val() + '</b> ont été modifiés avec succès!');                
            }
        });
    });
    $('#btnClear').click(function () {
        resetNewAppointmentForm();
    });
});
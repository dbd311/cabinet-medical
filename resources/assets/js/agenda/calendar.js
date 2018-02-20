var url = document.getElementById("url").textContent;
var jdays = [];

var cDate = moment();

$('#currentDate').text("Today : " + cDate.format("dddd") + ' ' + cDate.format("DD/MM/YYYY", "fr"));

$(document).ready(function ($) {
    createCalendar();
});

/**
 * Instantiates the calendar AFTER ajax call
 */
function createCalendar()
{
    $.get(url + "/api/get-available-days-current-month", function (data) {
        $.each(data, function (index, value) {
            jdays.push(value.booking_datetime);
        });

        //My function to intialize the datepicker
        $('#calendar').datepicker({
            inline: true,
            minDate: 0,
            dateFormat: 'yy-mm-dd',
            beforeShowDay: highlightDays,
            onSelect: getTimes,
            onChangeMonthYear: loadAvailableDays
        });
    });
}

/**
 * Highlights the days available for booking
 * @param  {datepicker date} date
 * @return {boolean, css}  
 */
function highlightDays(date)
{
    date = moment(date).format('YYYY-MM-DD');
    for (var i = 0; i < jdays.length; i++) {
        var jDate = moment(jdays[i]).format('YYYY-MM-DD');
        if (jDate === date) {
            return[true, 'available'];
        }
    }
    return false;
}

/**
 * Gets times available for the day selected
 * Populates the daytimes id with dates available
 * @param {date} d
 */
function getTimes(d)
{
    var dateSelected = moment(d);
    document.getElementById('daySelect').innerHTML = dateSelected.format("D MMMM YYYY");

    $.get(url + "/booking/times?selectedDay=" + d, function (data) {
        $('#dayTimes').empty();
        //$('#dayTimes').append('<h6>Créneaux</h6>');
        var s = '';
        for (var i in data) {
            var rdate = data[i].booking_datetime;
            rdate = rdate.split(" ");
            var slot = rdate[1].substring(0, 5);
            var slotH = parseInt(rdate[1].substring(0, 2));
            var className = '';
            if (slotH === 12 || slotH === 13) {
                className = 'text-warning';
            } else if (slotH < 12 || slotH > 13) {
                className = 'text-success';
            }

            s += '<a href="' + url + '/booking/details/' + data[i].id + '" class="' + className + '">' + slot + '</a><br>';


        }
        $("#dayTimes").append(s);
    });
}

function loadAvailableDays(year, month) {
//    alert(year + ' ' + month);
    var service = url + "/api/get-available-days/" + year + '/' + month;
//    alert(service);
    // reset days for this month
    jdays = [];
    $.get(service, function (data) {
        $.each(data, function (index, value) {
//            alert(value.booking_datetime);
            jdays.push(value.booking_datetime);
        });
        $("#calendar").datepicker("refresh");
    });
}
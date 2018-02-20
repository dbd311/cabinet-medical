@extends('admin/layout')
@section('content')

<?php
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
$today = new DateTime();

$half = sizeof($appointments) / 2;
$appointmentsArray = json_decode($appointments, true);

$appointmentsLeft = array_slice($appointmentsArray, 0, $half);
$appointmentsRight = array_slice($appointmentsArray, $half);
?>
<div class="row m-b-3">
    <div class="col-md-offset-2 col-md-8">
        Aujourd'hui : <?php echo $today->format('d/m/Y') ?> <br>
        Voici la liste des <b>créneaux indisponibles</b> pendant une période de <b>2 semaines</b>. <br>
        De ce fait, vous pouvez réserver un rendez-vous en dehors de ces créneaux.
    </div>
</div>
<br />
<div class="row m-t-3">
    <div class="col-md-offset-2 col-xs-5 col-md-2">
        <ul>

            <?php
            
            setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
            for ($i = 0; $i < sizeof($appointmentsLeft); $i++) {
                $dt = new Datetime($appointmentsLeft[$i]['appointment_datetime']);
            ?>    
            <li>{{strftime("%A %d/%m/%Y à %H:%M", $dt->getTimestamp())}}</li>
            <?php }  
                
            ?>
                
        </ul>
    </div>

    <div class="col-xs-5 col-md-2">
        <ul>
            @foreach ($appointmentsRight as $a)
            <?php            
            $datetimeR = new DateTime($a['appointment_datetime']);
            ?>
            <li>{{strftime("%A %d/%m/%Y à %H:%M", $datetimeR->getTimestamp())}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection


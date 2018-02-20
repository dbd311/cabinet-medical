@extends('agenda.layout')
@section('content')

<!-- Output correct data for checking -->
<div class="row jumbotron text-center">    
    <h3> Appointment time: {{ $startdatetime }} </h3>
</div>
<br><br><br>
<!-- <div class="col-md-6 center-block" style="float:none;"> -->
<div class="row col-md-6 center-block" style="float:none;">

    <form action="/appointment/add" method="POST">
        <fieldset>
            <legend>Patient Information</legend>

            <!-- First Name Input -->
            <div class="form-group">
                <label for="fname" class="col-lg-2 control-label">First Name</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" name="fname" id="fname" placeholder="First">
                </div>
            </div>

            <!-- Last Name Input -->
            <div class="form-group">
                <label for="lname" class="col-lg-2 control-label">Last Name</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last">
                </div>
            </div>

            <!-- Contact Number -->
            <div class="form-group">
                <label for="number" class="col-lg-2 control-label">Contact Number</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" name="number" id="number" placeholder="5555555555">
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">E-Mail</label>
                <div class="col-lg-5">
                    <input type="text" class="form-control" name="email" id="email" placeholder="you@example.com">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div>
@endsection

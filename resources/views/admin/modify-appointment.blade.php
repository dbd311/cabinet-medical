@extends('admin/layout')
@section('content')
<div class="col-lg-8">    
    <legend>Update appointment</legend>
    <div id="error"></div>


    <!-- <div class="col-md-6 center-block" style="float:none;"> -->
    <div class="row col-md-6 center-block" style="float:none;">


        <!-- Hidden forms to be used later for appointment confirmation -->

        <form action="/appointment/delete" class="form-horizontal" data-abide="true">

            <input name="pid" type="hidden" value="{{$pid}}">

            <fieldset>
                <legend>Patient Information</legend>

                <!-- First Name Input -->
                <div class="form-group">
                    <label for="fname" class="col-lg-2 control-label">First Name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="fname" id="fname" value="">
                    </div>
                </div>

                <!-- Last Name Input -->
                <div class="form-group">
                    <label for="lname" class="col-lg-2 control-label">Last Name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="">
                    </div>
                </div>

                <!-- Contact Number -->
                <div class="form-group">
                    <label for="number" class="col-lg-2 control-label">Contact Number</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="number" id="number" placeholder="">
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">E-Mail</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="email" id="email" placeholder="">
                    </div>
                </div>            

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </fieldset>        
        </form>
    </div>
</div>

<script src="{{ elixir('/js/admin/delete-appointment.js') }}"></script>
@endsection
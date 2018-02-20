@extends('admin.layout')
@section('content')
<div class="col-lg-8">    
    <legend>Supprimer le rendez-vous</legend>
    <div id="error"></div>


    <!-- <div class="col-md-6 center-block" style="float:none;"> -->
    <div class="row col-md-6 center-block" style="float:none;">


        <div class="text-info" id="appointment-details"></div>
        <!-- Hidden forms to be used later for deleting appointment -->


        <form method="GET" action="/admin/appointment/delete" class="form-horizontal" data-abide="true">

            <input name="pid" id="pid" type="hidden" value="{{$pid}}">
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Supprimer</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('js')
<script src="{{ elixir('/js/cpanel/agenda/admin/delete-appointment.js') }}"></script>
@endsection
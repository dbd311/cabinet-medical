@extends('agenda.layout')

@section('content')

@include('admin.header')

<div class="row jumbotron text-center">  
  <h4><b> {{ $packageName }} </b></h4>
  <p><b><span id="currentDate">  </span></b></p>
</div>

<div class="col-md-11 text-center">
  <div class="col-md-offset-4 col-lg-offset-5 col-md-2 col-lg-2">
    <div id="calendar"></div>
  </div>
  <div class="col-md-offset-1 col-lg-offset-1 col-md-2 col-lg-1">
    <div class="panel panel-primary">
      <div class="panel-heading" id="daySelect">
        Select a day
      </div>
      <div class="panel-body">
        <p id="dayTimes"></p>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<!-- Calendar Functionality -->
<script src="{{ elixir('/js/cpanel/agenda/calendar.js') }}"></script>
@endsection


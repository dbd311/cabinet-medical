@extends('admin/layout')
@section('content')
<div class="col-md-offset-2 col-md-8">
	<div id="error"></div>
	<div id="calendar"></div>
</div>
@endsection
@section('js')
<script src="{{ elixir('/js/cpanel/agenda/availability.js') }}"></script>
@endsection

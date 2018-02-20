@extends('admin/layout')
@section('content')
<div class="col-md-offset-2 col-md-8">	
	<div id="messages"></div>
</div>
@endsection

@section('js')
<script src="{{ asset('/js/cpanel/agenda/sms.js') }}"></script>
@endsection

@extends('admin.layout')


@section('content')
<style>
    .ui-datepicker  {
        text-align: center;
        margin-left: 15px;
        padding: 5px 15px 0px 15px;
        background: white;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-5 col-offset-1 mb-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Congés annuels, jours fériés ...</div>
                <div class="panel-body">

                    <form id="formAddHoliday" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="row">
                            <label for="startdate" class="col-1 control-label">Début</label>
                            <div class="col-5">
                                <input type="text" id="startdate" name="startdate">
                            </div>

                            <label for="enddate" class="col-1 control-label">Fin</label>
                            <div class="col-5">
                                <input type="text" id="enddate" name="enddate">
                            </div>                            
                        </div>
                        <div class="row mt-5">
                            <label for="note" class="col-1 control-label">Note</label>
                            <div class="col-4">
                                <input type="text" id="note" name="note">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-4 offset-8">
                                <button type="button" class="btn btn-primary" id="btnSubmit">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <p id="info" class="text-muted"></p>
        </div>
    </div>

</div>

@endsection


@section('js')
<script src="{{ elixir('/js/cpanel/agenda/admin/planning.js') }}"></script>
@endsection
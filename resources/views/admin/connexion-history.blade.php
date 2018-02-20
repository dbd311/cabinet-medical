@extends('admin.layout')

@section('content')

    <div class="container-fluid">
        <?php

        use \App\Models\Connexion;

//
        $rows = Connexion::all();

        $counter = 1;
        foreach ($rows as $row) {
            ?>
            <div class="row ml-3">
                <div class="col-12">
                    <?php
                    print_r($counter++ . ') ' . $row['ip'] . ' | ' . $row['city'] . ' | ' . $row['country'] . ' | ' . $row['created_at']);
                    ?>
                </div>
            </div>
        <?php } ?>
        
</div>
@endsection

@section('js')

@endsection
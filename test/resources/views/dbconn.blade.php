@extends('layouts.master')

@section('dbconnection')
    <div>
        <?php
            if (DB::connection()->getPdo()) {
                echo "Successfully connected to DB and DB name is " . DB::connection()->getDatabaseName();
            }
            ?>
    </div>
@endsection
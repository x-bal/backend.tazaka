@extends('layouts.master', ['title' => 'Dashboard'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <p>
                    Welcome, {{ auth()->user()->name }}. <br>
                    <span class="text-primary">Have a nice day :)</span>
                </p>
            </div>
        </div>
    </div>
</div>
@stop
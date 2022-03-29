@extends('layouts.master', ['title' => 'Team'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add Team</div>

            <div class="card-body">
                <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('team.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
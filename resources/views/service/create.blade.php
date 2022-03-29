@extends('layouts.master', ['title' => 'Service'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add service</div>

            <div class="card-body">
                <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('service.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.master', ['title' => 'Service'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit Service</div>

            <div class="card-body">
                <form action="{{ route('service.update', $service->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('service.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
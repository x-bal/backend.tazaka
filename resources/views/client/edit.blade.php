@extends('layouts.master', ['title' => 'Client'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit Client</div>

            <div class="card-body">
                <form action="{{ route('client.update', $client->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('client.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.master', ['title' => 'Sosmed'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add Sosmed</div>

            <div class="card-body">
                <form action="{{ route('sosmed.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('sosmed.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
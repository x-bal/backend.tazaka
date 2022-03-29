@extends('layouts.master', ['title' => 'sSction'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add Section</div>

            <div class="card-body">
                <form action="{{ route('section.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('section.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
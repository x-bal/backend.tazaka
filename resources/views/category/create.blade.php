@extends('layouts.master', ['title' => 'Category'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add Category</div>

            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('category.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.master', ['title' => 'Category'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit Category</div>

            <div class="card-body">
                <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('category.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
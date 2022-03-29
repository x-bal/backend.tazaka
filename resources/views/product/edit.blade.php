@extends('layouts.master', ['title' => 'Product'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit Product</div>

            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('product.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
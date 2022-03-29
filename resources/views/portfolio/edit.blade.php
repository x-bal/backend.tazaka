@extends('layouts.master', ['title' => 'Portfolio'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit Portfolio</div>

            <div class="card-body">
                <form action="{{ route('portfolio.update', $portfolio->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('portfolio.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.master', ['title' => 'Portfolio'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add Portfolio</div>

            <div class="card-body">
                <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('portfolio.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
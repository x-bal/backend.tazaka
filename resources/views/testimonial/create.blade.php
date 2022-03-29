@extends('layouts.master', ['title' => 'Testimonial'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add Testimonial</div>

            <div class="card-body">
                <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('testimonial.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@extends('layouts.master', ['title' => 'Testimonial'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit Testimonial</div>

            <div class="card-body">
                <form action="{{ route('testimonial.update', $testimonial->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('testimonial.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
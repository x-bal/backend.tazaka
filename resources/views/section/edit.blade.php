@extends('layouts.master', ['title' => 'Section'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit Section</div>

            <div class="card-body">
                <form action="{{ route('section.update', $section->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('section.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
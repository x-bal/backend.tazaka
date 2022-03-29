@extends('layouts.master', ['title' => 'Count'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Edit Count</div>

            <div class="card-body">
                <form action="{{ route('count.update', $count->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    @include('count.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
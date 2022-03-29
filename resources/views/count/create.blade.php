@extends('layouts.master', ['title' => 'Count'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add Count</div>

            <div class="card-body">
                <form action="{{ route('count.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('count.form')
                </form>
            </div>
        </div>
    </div>
</div>
@stop
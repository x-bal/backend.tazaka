@extends('layouts.master', ['title' => 'Testimonial'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Testimonial</div>

            <div class="card-body">
                <a href="{{ route('testimonial.create') }}" class="btn btn-primary mb-3">Add Testimonial</a>

                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($testimonials as $testimonial)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $testimonial->name }}</td>
                            <td>{!! $testimonial->desc !!}</td>
                            <td>
                                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="" width="50px">
                            </td>
                            <td>
                                <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this data ?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
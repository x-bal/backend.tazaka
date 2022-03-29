@extends('layouts.master', ['title' => 'Portfolio'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Portfolio</div>

            <div class="card-body">
                <a href="{{ route('portfolio.create') }}" class="btn btn-primary mb-3">Add Portfolio</a>

                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Client</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($portfolios as $portfolio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $portfolio->name }}</td>
                            <td>{{ $portfolio->client }}</td>
                            <td>{{ $portfolio->category->name }}</td>
                            <td>{{ $portfolio->description }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="" width="50px">
                            </td>
                            <td>
                                <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="post" class="d-inline">
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
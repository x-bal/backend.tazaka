@extends('layouts.master', ['title' => 'Count'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Count</div>

            <div class="card-body">
                <a href="{{ route('count.create') }}" class="btn btn-primary mb-3">Add Count</a>

                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($counts as $count)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $count->title }}</td>
                            <td>{{ $count->total }}</td>
                            <td>
                                <a href="{{ route('count.edit', $count->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('count.destroy', $count->id) }}" method="post" class="d-inline">
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
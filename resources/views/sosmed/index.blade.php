@extends('layouts.master', ['title' => 'Sosmed'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Sosmed</div>

            <div class="card-body">
                <a href="{{ route('sosmed.create') }}" class="btn btn-primary mb-3">Add Sosmed</a>

                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Icon</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($sosmeds as $sosmed)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><i class="{{ $sosmed->icon }}"></i></td>
                            <td>{{ $sosmed->link }}</td>
                            <td>
                                <a href="{{ route('sosmed.edit', $sosmed->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('sosmed.destroy', $sosmed->id) }}" method="post" class="d-inline">
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
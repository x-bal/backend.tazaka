@extends('layouts.master', ['title' => 'Team'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Team</div>

            <div class="card-body">
                <a href="{{ route('team.create') }}" class="btn btn-primary mb-3">Add Team</a>

                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Twitter</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>Linkedin</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($teams as $team)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $team->image) }}" alt="" width="50px">
                            </td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->position }}</td>
                            <td>{{ $team->twitter }}</td>
                            <td>{{ $team->facebook }}</td>
                            <td>{{ $team->instagram }}</td>
                            <td>{{ $team->linkedin }}</td>
                            <td>
                                <a href="{{ route('team.edit', $team->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('team.destroy', $team->id) }}" method="post" class="d-inline">
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
@extends('layout.app')
@section('title', 'Users')

@section('breadcrumb')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
        </ol>
    </div>
@endsection
@section('content')

    <div class="card">
        <div class="card-header row">
            <div class="col-md-10">
                <h4 class="card-title">Data Users</h4>
            </div>
            <div class="col-md-2">
                <!-- Button trigger modal -->
                <a href="{{ route('users-create') }}" class="btn btn-rounded btn-primary"><span
                        class="btn-icon-start text-primary" data-bs-toggle="modal"><i class="fa fa-plus color-info"></i>
                    </span>Create
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $index => $item)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->level }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('users-edit', $item->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ route('users-delete', $item->id) }}" method="POST" onsubmit="return confirm('Do you want to delete this users?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

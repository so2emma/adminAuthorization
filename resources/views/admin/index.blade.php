@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="text-center">
            <h4>ADMIN HOME PAGE</h4>
        </div>

        <div class="row">
            <div class="col-md-8 m-auto">
                <form action="{{ route("admin.index") }}" method="get">
                    <div class="mb-3 form-group">
                        <label class="lead" for="">Query Activated or Deactivated</label>
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option selected value="">Select By status</option>
                            <option value="1">Activated</option>
                            <option value="0">Deactivated</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Update Status</th>
                        </tr>
                    </thead>

                    @if (!(count($users) == 0 ))
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form method="POST" action="{{ route("admin.status", $user->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary"> {{$user->activated ? "Deactivate" : "Activate" }} </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                    <div class="alert alert-danger">
                        <h4>No User</h4>
                    </div>

                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection

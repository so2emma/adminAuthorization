@extends('layouts.admin')
@section('content')
<div class="container">
    <h3>Dashboard</h3>

    <div class="row text-white py-5">
        <div class="col-md-4 ">
            <div class="p-5 bg-primary">
                <h4 class="fw-bold">Pending</h4>
                <p>Tasks: {{ count($pending) }}</p>
            </div>

        </div>
        <div class="col-md-4 ">
            <div class="p-5 bg-success">
                <h4 class="fw-bold">Done</h4>
                <p>Tasks: {{ count($done) }}</p>
            </div>

        </div>
        <div class="col-md-4 ">
            <div class="p-5 bg-danger">
                <h4 class="fw-bold">Overdue</h4>
                <p>Tasks: {{ count($overdue) }}</p>
            </div>
        </div>
    </div>

    <h4>No. of registered users: {{ count($all_user) }}</h4>


    <h3 class="pt-5">Latests Tasks</h3>

    <div class="card">
        <div class="table-responsive m-3">
            <table class="table text-center ">
                <thead>
                    <tr>
                        <td>S/N</td>
                        <td>Title</td>
                        <td>Category</td>
                        <td>Deadline</td>
                        <td>Status</td>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->category }}</td>
                        <td>{{ $task->deadline }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <h3 class="pt-5">Latests Registered Users</h3>
    <div class="card">
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                    </tr>
                </thead>

                @if (!(count($users) == 0 ))
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
                @else
                <div class="text-danger">
                    <h4>No User</h4>
                </div>

                @endif
            </table>
        </div>
    </div>

</div>
@endsection

@extends('layouts.user')
@section('content')
    <div class="container overflow-hidden">

        <h3>Dashboard</h3>

        <div class="row text-white">
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
                            <td>Actions</td>
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
                            <td class="d-flex justify-content-center">
                                    <a href="{{ route("user.task.edit", $task->id) }}" class="btn btn-primary mx-1">Edit</a>
                                    <form action="{{ route("user.task.destroy", $task->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

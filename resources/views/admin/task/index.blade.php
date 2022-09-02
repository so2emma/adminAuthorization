@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h4>All Tasks</h4>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="table-responsive m-3">
                <table class="table text-center ">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Title</td>
                            <td>Category</td>
                            <td>User(Name)</td>
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
                            <td>{{ $task->user->name }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td>{{ $task->status }}</td>
                            <td class="d-flex justify-content-center">
                                    <a href="{{ route("admin.task.edit", $task->id) }}" class="btn btn-primary mx-1">Edit</a>
                                    <form action="{{ route("admin.task.destroy", $task->id) }}" method="POST">
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

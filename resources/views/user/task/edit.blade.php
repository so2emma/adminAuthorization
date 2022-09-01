@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h4>Edit Task</h4>
            <a href="{{ route('user.task.index') }}" class="btn btn-success">Back</a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <form class="m-3" action="{{ route("user.task.update", $task->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="m-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" value="{{ $task->title }}" >
                </div>

                <div class="m-3">
                    <label for="category" class="form-label">Category:</label>
                    <select name="category" id="" class="form-control">
                        @foreach ($categories as $category )
                        <option @if ($task->category == $category->title)
                            selected @endif value="{{ $category->title }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="m-3">
                    <label for="deadline" class="form-label">Deadline:</label>
                    <input type="date" name="deadline" class="form-control" value="{{ $task->deadline }}">
                </div>

                <div class="m-3">
                    <label for="status" class="form-label">Status:</label>
                    <select name="status" id="" class="form-control">
                        <option @if($task->status == "pending") selected @endif value="pending">Pending</option>
                        <option @if($task->status == "done") selected @endif value="done">Done</option>
                        <option @if($task->status == "overdue") selected @endif value="overdue">Overdue</option>
                    </select>
                </div>

                <div class="m-3">
                    <button class="btn btn-success" type="submit">Edit</button>
                </div>
            </form>
        </div>

    </div>
@endsection

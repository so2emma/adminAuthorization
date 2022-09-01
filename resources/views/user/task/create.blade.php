@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h4>Create Task</h4>
            <a href="{{ route('user.task.index') }}" class="btn btn-success">Back</a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <form class="m-3" action="{{ route("user.task.store") }}" method="POST">
                @csrf
                <div class="m-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" >
                </div>

                <div class="m-3">
                    <label for="category" class="form-label">Category:</label>
                    <select name="category" id="" class="form-control">
                        <option  selected value=""></option>
                        @foreach ($categories as $category )
                        <option value="{{ $category->title }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="m-3">
                    <label for="deadline" class="form-label">Deadline:</label>
                    <input type="date" name="deadline" class="form-control" >
                </div>

                <div class="m-3">
                    <label for="status" class="form-label">Status:</label>
                    <select name="status" id="" class="form-control">
                        <option  selected value=""></option>
                        <option value="pending">Pending</option>
                        <option value="done">Done</option>
                        <option value="overdue">Overdue</option>
                    </select>
                </div>

                <div class="m-3">
                    <button class="btn btn-success" type="submit">Create</button>
                </div>
            </form>
        </div>

    </div>
@endsection

@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h4>Edit Categories</h4>
            <a href="{{ route('admin.category.index') }}" class="btn btn-success">Back</a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <form class="m-3" action="{{ route("admin.category.update", $category->id) }}" method="POST">
                @method("PUT")
                @csrf
                <div class="m-3">
                    <label for="title" class="form-label">Title:</label>
                    <p class="lead">{{ $category->title }}</p>
                </div>

                <div class="m-3">
                    <label for="title" class="form-label">Status:</label>
                    <select name="status" id="" class="form-control">
                        <option  @if ($category->status == "active") selected @endif value="active">Active</option>
                        <option  @if ($category->status == "inactive") selected @endif value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="m-3">
                    <button class="btn btn-success" type="submit">Edit</button>
                </div>
            </form>
        </div>

    </div>
@endsection

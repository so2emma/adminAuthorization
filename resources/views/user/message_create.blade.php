@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Create Message
                    </div>
                    <div class="card-body">
                        <form action="{{ route("user.message.store") }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="message">Message</label>
                                <textarea name="message" class="form-control" id="" cols="30" rows="5">{{ old("message") }}</textarea>

                                @error("message")
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Create message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends("layouts.admin")
@section("content")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 card">
            <div class="card-header"><h4 class="text-center">Admin Login</h4></div>
            <div class="card-body">
                <form action="{{ route("admin.check") }}" method="post" aria-autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control"
                            placeholder="Enter email address" value="{{ old("email") }}">
                    </div>
                    @error("email")
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Enter Password ">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

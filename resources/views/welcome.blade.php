<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
<div class="container pt-5">
    <div class="row justify-content-center g-5">
        <h4 class="text-center">Links to respective Login pages</h4>
        <div class="col-6 col-md-4">
            <div class="card">
                <div class="card-header">
                    Admin Login
                </div>
                <div class="card-body">
                    <a href="{{ route("admin.login") }}" class="btn btn-primary">Admin Login</a>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card">
                <div class="card-header">
                    User Login
                </div>
                <div class="card-body">
                    <a href="{{ route("user.login") }}" class="btn btn-primary">User Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

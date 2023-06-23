<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/pulse.css') }}">
</head>
<body>
<div class="container">
    <h1 class="text text-primary text-center">Login</h1>
    <form action="{{ route('login') }}" method="post" class=" gap-2">
    @csrf
    <div class="row">
        <input type="email" name="email" class="form-control col m-3">
        <input type="password" name="password" id="" class="form-control col m-3">
    </div>
    <button type="submit" class="btn  container-fluid btn-primary">Se Connecter</button>
    </form>
</div>
</body>
</html>

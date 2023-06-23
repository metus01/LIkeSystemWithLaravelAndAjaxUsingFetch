<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link rel="stylesheet" href="{{ asset('css/pulse.css') }}">
    <script defer  src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="container">
        <h2 class="text text-center text-success">Les Posts</h2>
        @foreach ($posts as $post)
        <form action="{{ route('posts.like') }}" method="post" id="form-js">
            @csrf
            <p id="count-js" >{{ $post->likes->count() }}Like(s)</p>
            <input type="hidden" name="" value="{{ $post->id }}" id="post-id-js">
            <button type="submit" class="btn btn-primary">J'aime</button>
        </form>
        <p class="text text-dark">{{ $post->content }}</p>
        <br>
       @endforeach
    </div>
</body>
</html>

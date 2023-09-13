<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @auth
    <div class="topbar">
        <h1>Congrats! you're logged in</h1>

        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>
    </div>
    <div class="wrapper">
        <div class="box">
            <h2>Create a new post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="post title">
                <textarea name="body" cols="50" rows="10" placeholder="body content..."></textarea>
                <button>save post</button>
            </form>
        </div>
        <div class="box">
            <h2>All Posts</h2>
            @foreach ($posts as $post)
            <div class="post">
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                <p>{{$post['body']}}</p>
                <a href="/edit-post/{{$post->id}}">Edit</a>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>delete</button>

                </form>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="wrapper">
        <div class="box">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" id="" placeholder="name">
                <input type="email" name="email" id="" placeholder="email">
                <input type="password" name="password" id="" placeholder="password">
                <button>Register</button>
            </form>
        </div>
        <div class="box">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" name="loginname" id="" placeholder="name">
                <input type="password" name="loginpassword" id="" placeholder="password">
                <button>Log in</button>
            </form>
        </div>
    </div>
    @endauth

</body>

</html>

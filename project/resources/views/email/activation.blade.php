<!DOCTYPE html>
<html>
<head>
    <style>

        div.container {
            width: 100%;
            border: 1px solid gray;
            font-family: Avenir, Helvetica, sans-serif;
        }

        header, footer {
            padding: 1em;
            color: white;
            background-color: black;
            clear: left;
            text-align: center;
        }

        div.content {
            text-align: center;
            padding: 1em;
            overflow: hidden;
        }

        a {
            color: #2F3133;
        }

    </style>
</head>
<body>

<div class="container">

    <header>
        <h1>Welcome!</h1>
    </header>


    <div class="content">
        <h1>Registration successful!</h1>
        <p>Click on the the following link to activate your account:</p>
        <a href="{{ url('register/verify/'.$user->remember_token) }}"> Verify </a>
        <br>
    </div>

    <footer>Ainet Print Management</footer>

</div>

</body>
</html>


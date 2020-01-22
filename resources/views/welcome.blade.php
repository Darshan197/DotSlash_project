<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SMS</title>
        <link rel="stylesheet" href="/css/app.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            body, html {
            height: 100%;
            }

            * {
            box-sizing: border-box;
            }

            .bg-image {
            /* The image used */
            background-image: url("./school.png");

            /* Add the blur effect */
            filter: blur(8px);
            -webkit-filter: blur(25px);

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            }

            /* Position text in the middle of the page/image */
            .bg-text {
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
            color: white;
            font-weight: bold;
            border: 3px solid gray;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="bg-image"></div>

        <div class="bg-text">
        <h1 class="display-3">School Management System</h1>
        <p><a href="/login" class="btn btn-success col-4 font-weight-bold">Login</a></p>
        </div>
    </body>
</html>

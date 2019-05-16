<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <style>
    body {
      margin: 0;
    }

    .welcome {
      height: 100vh;
      width: 100vw;
      background: #18173f;
    }

    .welcome .inner {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      margin: auto;
      width: 300px;
      height: 300px;
    }

    .inner > img {

      max-width: 300px;
    }

    .links {
      display: flex;
      justify-content: flex-end;
      margin-top: 40px;
    }

    .links > a {
      text-decoration: none;
      color: white;
      margin: 5px;
      font-size: 18px;
      text-transform: uppercase;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;

    }
  </style>
</head>
<body>
<div class="welcome">
  <div class="inner">
    <img src=" {{ URL::to('/') }}/img/logo-welcome.png" alt="logo">
    <div class="links">
      <a href="/register"> Regiter</a>
      <a href="/register"> Sign in</a>
    </div>
  </div>
</div>
</body>
</html>

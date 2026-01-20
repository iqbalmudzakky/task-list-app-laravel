<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel 12 Task List</title>
  @yield('styles')
</head>

<body>
  <h1>@yield('title')</h1>

  @if (session('success'))
  <div style="color: green; font-weight: bold;">
    {{ session('success') }}
  </div>
  @endif

  <div>@yield('content')</div>
</body>

</html>
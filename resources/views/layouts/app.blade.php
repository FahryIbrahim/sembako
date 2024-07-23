<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Groceries App') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .navbar-brand {
      font-weight: bold;
    }

    .container {
      margin-top: 2rem;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Sembako</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="mb-2 navbar-nav me-auto mb-lg-0">

          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
          </li>
          @endauth
        </ul>
        <ul class="mb-2 navbar-nav ms-auto mb-lg-0">
          @guest

          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

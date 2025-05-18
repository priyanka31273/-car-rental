<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Car Rental</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Montserrat&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            padding-top: 70px; /* navbar height */
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        footer {
            background-color:rgb(2, 2, 2);
            color: white;
            padding: 15px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            text-align: center;
        }
    </style>
    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top" style="background-color:rgb(128, 88, 161);">
  <div class="container">
    <a class="navbar-brand text-white" href="{{ route('home') }}">CarRental</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('rentals.index') }}">My Rentals</a>
        </li>
        @guest
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
             <li class="nav-item"><a class="nav-link text-white" href="{{ route('register') }}">Register</a></li>

          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" 
               data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
              <li>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

<main class="py-4">
    @yield('content')
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{config('app.name','Laravel')}}</title>
  <link rel="stylesheet" href="/css/app.css">
  <script src="https://kit.fontawesome.com/7e2d3ac16a.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <nav class="main-header navbar navbar-expand bg-dark navbar-dark border-bottom">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item"><a href=""></a></li>
      <li class="nav-item d-none d-sm-inline-block">
        <router-link to="/home" class="nav-link">Home</router-link>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a href="#" class="nav-link disabled"><span class="badge badge-light text-capitalize">{{Auth::user()->role}}</span></a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link disabled"><img src="/image/user.png" alt="" class="rounded-circle" style="width:20px"></a>
      </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <strong>{{ Auth::user()->name }}</strong>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="./image/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin </span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/image/Profile/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <router-link to="/home" class="nav-link" active-class="active" exact>
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </router-link>
            </li>
            @if (Auth::user()->role == 'admin')
            <li class="nav-item">
                <router-link to="/classes" class="nav-link" active-class="active" exact>
                    <i class="nav-icon fab fa-pushed"></i>
                    <p>Classes & Section</p>
                </router-link>
            </li>
            @endif
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'teacher')
            <li class="nav-item">
                <router-link to="/users" class="nav-link" active-class="active" exact>
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>Teachers And Students</p>
                </router-link>
            </li>
            @endif
            @if (Auth::user()->role == 'student')
            <li class="nav-item">
                <router-link to="#" class="nav-link" active-class="active" exact>
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    <p>My Attendance</p>
                </router-link>
            </li>
            @endif
          @if (Auth::user()->role == 'admin')
          <li class="nav-item has-treeview text-success">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog green"></i> 
              <p>Management<i class="right fa fa-angle-left"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/create-school" class="nav-link" active-class="active" exact>
                  <i class="nav-icon fas fa-tools"></i>
                  <p>Academic Settings</p>
                </router-link>
            </li>
              <li class="nav-item"><a href="#" active-class="active" exact="" class="nav-link"><i class="far fa-circle nav-icon"></i> <p>Inactive Page</p></a></li>
            </ul>
          </li>
          @endif
          @if (Auth::user()->role == 'teacher' || Auth::user()->role == 'student')
          <li class="nav-item">
            <router-link to="/courses/{{0}}" class="nav-link" active-class="active" exact>
                <i class="nav-icon fas fa-book-open"></i>
                <p>My Courses</p>
            </router-link>
          </li>
          @endif
          <li class="nav-item">
            <router-link to="/changepassword" class="nav-link" active-class="active" exact>
                <i class="nav-icon fas fa-key"></i>
                <p>Change Password</p>
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
    @yield('content')
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
@auth
    <script>
        window.user = @json(Auth::user())
    </script>
@endauth
<script src="/js/app.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laratrue - @yield('title',' Laravel 入门教程')</title>
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	@include('layouts/_header')
	<div class="container">
	  @include('shared/_messages')
      @yield('content')
      @include('layouts/_footer')
    </div> 
     <script src="/js/app.js"></script>
</body>
</html>
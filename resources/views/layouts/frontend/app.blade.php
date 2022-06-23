<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Jquery-->
  <script src="{{asset('frontend/jquery.js')}}"></script>
  <!-- Fontawesome Icons-->
  <script src="{{asset('frontend/all.min.js')}}"></script>
  <!-- Bootstrap from app.css-->  
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <script src="{{asset('js/app.js')}}"></script>
  <!-- <script src="{{asset('frontend/popper.min.js')}}"></script> -->
</head>
<body>
@include('layouts.frontend.navbar')
@include('layouts.frontend.slider')
@include('layouts.frontend.grid')  
@include('layouts.frontend.featured')
</body>
</html>

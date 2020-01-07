<!doctype html>
<html><head>

<meta charset="utf-8">
<title>Task</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="images/logo.png">

<script type="text/javascript" language="javascript" src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>


<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}"/>

<script src="{{asset('js/bootstrap.min.js')}}"></script>

<link type="text/css" rel="stylesheet" href="{{asset('css/default.css')}}" />
<!--<script type="text/javascript" language="javascript" src="{{asset('js/main.js')}}"></script>-->


<link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}"/>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>


<link href="{{asset('css/datatables.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>





</head>

<body>






@include('layouts.header')
@include('layouts.leftmenu') 

<div>
   @yield('content')
</div>
@include('layouts.footer')



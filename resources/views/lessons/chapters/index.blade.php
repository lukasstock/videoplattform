<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/video.js') }}" defer></script>
</head>
    <meta name="csrf-token" content="{{ csrf_token() }}">



<body>

<script>

</script>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

<form method="post" action="/chapters/create">
   {{csrf_field()}}
    <input type="hidden" name="lesson_name" value="{{$lessons['lesson_name'] ?? $lessons[0]->lesson_name}}">
    <input type="hidden" name="lesson_id" value="{{$lessons['lesson_id']  ?? $lessons[0]->id}}">
    @foreach($chapters as $key => $chapter)
        <input type="hidden" name="chapter_name" value="{{$chapter->chapter_name}}">
        <a data-lesson_id="{{$lessons[0]->id ?? ''}}" data-chapter_id="{{$chapter->id}}" class="btn-show">{{$key+1 . '. ' . $chapter->chapter_name}}</a>
    @endforeach
    @if(is_object(auth()->user()) && (isset($lessons[0]) && $lessons[0]->user_id == auth()->user()->id || isset($lessons['user_id']) && $lessons['user_id'] == auth()->user()->id) || (is_object(auth()->user()) && auth()->user()->is_admin))
    <button style="margin-left: 8px" class="button" type="submit">Neues Kapitel erstellen</button>
    @endif
</form>
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Kapitel</span>



    <div class="content" id="ajax_data" style="padding: 20px">

    </div>


@extends('misc/back')
@extends('footer')
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

</script>

</body>
</html>

<style>


    .content{
        margin-left: 30%;
        margin-right: 30%;
    }
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
</style>

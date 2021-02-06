
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/form.css') }}" />

</head>
<body>

<h3>Erstellen eines Kapitels unter der Lektion: {{$chapter_data['lesson_name']}} </h3>

<div>
    <form method="post" action="/chapters/save">

        {{@csrf_field()}}

        <input type="hidden" name="lesson_id" value="{{$chapter_data['lesson_id']}}">
        <label for="chapter_name">Titel des Kapitels</label>
        <input type="text" id="chapter_name" name="chapter_name" placeholder="Titel">


        <input type="submit" value="Erstellen">
    </form>
</div>

@extends('misc/back')
</body>
</html>



<head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/form.css') }}" />

</head>
<video  width="720" height="540" controls preload="auto">
    @if(isset($video[0]->videoname))
    <source src="{{asset('videos/' . $video[0]->videoname)}}">
        @endif
</video>
<form method="post" action="/video/save" enctype="multipart/form-data">
    <label for="file"><span>Videoname:</span></label>
    <input type="file" name="file" id="file" />
    <p>***Bearbeitungsmodus***</p>
    <label for="title">Titel:</label>
    <input type="text" name="title" id="title" value="{{$video[0]->title ?? ''}}"> <br>
    <label for="description">Beschreibung:</label> <br>
    <input type="text" name="description" id="description" value="{{$video[0]->description ?? ''}}"><br>
    <input type="hidden" name="chapter_id" value="{{$chapter_id ?? ''}}">
    {{csrf_field()}}
    <button type="submit">Änderungen speichern</button>
</form>


@if(isset($message))
{{$message}}
@endif

<form method="post" action="/video/delete" >
    {{csrf_field()}}
    <input type="hidden" name="chapter_id" value="{{$chapter_id}}">
    <button style="margin-bottom: 20px;float: right;color: red" type="submit">Kapitel löschen</button>

</form>
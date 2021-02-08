<head>

    <link rel="stylesheet" type="text/css" href="{{ url('/css/form.css') }}" />

</head>
@if(!isset($video[0]))
    <p>Dieses Kapitel wurde noch nicht befüllt.</p>
<video  width="720" height="540" controls preload="auto">
</video>
<p></p>
<label for="title">Titel:</label>
<p style="width: 720px" id="title"> ***Noch kein Titel*** </p>
<label for="description">Beschreibung:</label>
<p style="width: 720px" id="description">***Noch keine Beschreibung*** </p>



    @else
    <video  width="720" height="540" controls preload="auto">
        <source src="{{asset('videos/' . $video[0]->videoname)}}">
    </video>
    <p></p>
    <label for="title">Titel:</label>
    <p style="width: 720px" id="title">{{$video[0]->title}}</p>
    <label for="description">Beschreibung:</label>
    <p style="width: 720px" id="description">{{$video[0]->description}}</p>

@endif
@if((isset($chapter[0]) && (is_object(auth()->user()) && $chapter[0]->user_id == auth()->user()->id)) ||
    (is_object(auth()->user()) && auth()->user()->is_admin) ||
    (isset($video[0]) && (is_object(auth()->user()) && $video[0]->user_id == auth()->user()->id)))
    <button class="button" type="submit" data-chapter_id="{{$chapter_id}}" id="manage_content">Inhalt verwalten</button>
@endif
<script type="text/javascript">

</script>
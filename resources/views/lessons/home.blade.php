<html>
<ul class="circle">

    @if(isset($message))
        {{$message}}
    @endif

@foreach($lessons as $key => $lesson)
        <form method="post" action="chapters/index">

            {{csrf_field()}}

                <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
                <input type="hidden" name="lesson_name" value="{{$lesson->lesson_name}}">
                <input type="hidden" name="user_id" value="{{$lesson->user_id}}">
            <li>
                <input name="name" type="submit" value=" {{$lesson->lesson_name}}" >
            </li>

        </form>
@endforeach
        @extends('misc/back')
        @extends('footer')
</ul>
</html>

<style type="text/css">


    a{
        cursor: pointer;
    }

    body {
        font-family: "Lato", sans-serif;
        background: black;
        color: white;
    }

    .circle{
        counter-reset: list-counter;
        list-style: none;
    }


    .circle li{
        margin: 1.5em 0;
    }
    .circle li:before{
        content: counter(list-counter);
        counter-increment: list-counter;
        width: 1em;
        height: 1em;
        padding: .5em;
        margin-right: 1em;
        border-radius: 50%;
        border: .25em solid #ccc;
        background: #000;
        color: #fff;
        font-weight: bold;
        text-align: center;
        display: inline-block;

    }

    input[type=submit] {
        width: 50%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>

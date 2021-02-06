
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/form.css') }}" />
</head>
<body>

<h3>Erstellen einer Lektion</h3>

<h4> Nach dem Erstellen einer Lektion können Sie dieser noch Material wie z.B. Kapitel hinzufügen!</h4>
<div>
    <form method="post" action="/lessons/home">

        {{@csrf_field()}}

        <label for="title">Titel der Lektion</label>
        <input type="text" id="title" name="title" placeholder="Titel">


        <label for="category">Kategorie der Lektion</label>
        <select id="category" name="category">
            <option value="Programmierung">Programmierung</option>
            <option value="Kochen">Kochen</option>
            <option value="Verschiedenes">Verschiedenes</option>
        </select>

        <input type="submit" value="Erstellen">
    </form>
</div>

</body>
</html>

@extends('footer')
@extends('misc/back')
<?php

namespace App\Http\Controllers\Lessons;

use App\Http\Controllers\Controller;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonsController extends Controller
{

    public function create()
    {

        return view('lessons/create');

    }

    public function show()
    {

        $lessons = DB::select('SELECT * FROM lessons');
        return view('lessons/home', ['lessons' => $lessons]);

    }

    public function save(Request $request)
    {
        if (!$request->input('title')){
            return view('welcome', ['message' => 'Bitte Titel angeben']);
        }

        $category = $request->input('category');
        $title = $request->input('title');
        $user_id = auth()->user()->id;

        try {
            DB::insert("INSERT INTO lessons(category, lesson_name, user_id, created_at) VALUES (?, ?, ?, ?)", array($category, $title, $user_id, date('Y-m-d H:i:s')));
        } catch (\Exception $e){
            $error = "Diesen Lektionname gibt es bereits!";
        }

       return view('lessons/home', ['lessons' => DB::select('SELECT * FROM lessons')]);

    }

}

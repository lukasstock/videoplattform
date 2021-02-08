<?php

namespace App\Http\Controllers\Chapters;

use App\Http\Controllers\Controller;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChaptersController extends Controller
{
    public function show(Request $request)
    {

        $lessons = $request->input();
        $chapters = DB::select('SELECT * FROM chapters WHERE lesson_id = ?', [$request->input('lesson_id')]);

        return view('lessons/chapters/index', ['chapters' => $chapters, 'lessons' => $lessons ]);
    }

    public function create(Request $request)
    {

        return view('lessons/chapters/create', ['chapter_data' => $request->input()]);

    }

    public function save(Request $request)
    {

        if (!$request->input('chapter_name')){
            return view('welcome', ['message' => 'Bitte Titel angeben']);
        }
        $chapter_name = $request->input('chapter_name');
        $lesson_id = $request->input('lesson_id');
        try{
        DB::insert('INSERT INTO chapters(chapter_name, lesson_id, user_id, created_at) VALUES(?, ?, ?, ?)', [$chapter_name, $lesson_id, auth()->user()->id, date('Y-m-d H:i:s')]);
        } catch (\Exception $e){
            $message = "Diesen Kapitelnamen gibt es bereits!";
            return view('welcome', ['message' => $message]);
        }
        $lessons = DB::select('SELECT * FROM lessons WHERE id = ?', [$lesson_id]);
        $chapters = DB::select('SELECT * FROM chapters WHERE lesson_id = ?', [$lesson_id]);
        return view('lessons/chapters/index', ['message' => 'Kapitel "' . $chapter_name . '" wurde erfolgreich hinzugefügt', 'lessons' => $lessons, 'chapters' => $chapters]);
    }
}

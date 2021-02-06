<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $video = DB::select('SELECT * FROM videos WHERE chapter_id = ?', [$request->input('chapter_id')]);
        $chapter = DB::select('SELECT * FROM chapters WHERE lesson_id = ?', [$request->input('lesson_id')]);
        return view('videos/content', ['chapter' => $chapter, 'video' => $video, 'chapter_id' => $request->input('chapter_id'), 'user_id' => auth()->user()->id ?? null]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return
     */
    public function show(Request $request)
    {
        $video = DB::select('SELECT * FROM videos WHERE chapter_id = ?', [$request->input('chapter_id')]);

        return view('videos/manage_content', ['video' => $video, 'chapter_id' => $request->input('chapter_id'),  'user_id' => auth()->user()->id]);
    }

    public function save(Request $request)
    {

        if ($_FILES["file"]["type"] == "video/mp4")

        {
            if ($_FILES["file"]["error"] > 0)
            {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            }
            else
            {
                    move_uploaded_file($_FILES["file"]["tmp_name"],
                        "videos/" . $_FILES["file"]["name"]);
            }
        }
        else
        {
            $error = "Dateiformat ungültig. Bitte in .mp4 Format hochladen";
        }


        $video_name = $_FILES["file"]["name"];
        $title = $request->input('title');
        $description = $request->input('description');
        $chapter_id = $request->input('chapter_id');
        if (empty($description) || empty($title) )
        {
            return view('welcome', ['message' => 'Bitte alle Felder ausfüllen!']);

        }
        $select = DB::select('SELECT * FROM videos WHERE chapter_id = ?', [$chapter_id]);
        $select ? DB::update('UPDATE videos SET title = ?, description = ?, videoname = ?, updated_at = ? WHERE chapter_id = ?', [$title, $description, $video_name, date('Y-m-d H:i:s'), $chapter_id])
                : DB::insert('INSERT INTO videos(user_id, title, description, videoname, chapter_id, created_at) VALUES (?, ?, ?, ? , ?, ?) ', [auth()->user()->id, $title, $description, $video_name, $chapter_id, date('Y-m-d H:i:s')]);
        $message = $error ?? "Kapitel '". $title . "' wurde erfolgreich bearbeitet!";


        return view('welcome', ['message' => $message]);
    }

    public function delete(Request $request)
    {
        DB::delete('DELETE FROM chapters WHERE id = ?', [$request->input('chapter_id')]);
        return view('welcome', ['message' => 'Das Kapitel wurde erfolgreich gelöscht!']);
    }

}
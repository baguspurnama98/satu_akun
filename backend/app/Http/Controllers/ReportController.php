<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{
    public function upload(Request $request) 
    {
        $filename = $request->file('media_blob')->getClientOriginalName();
        return $request->file('media_blob')->move(storage_path('uploads/video_report'), $filename);
    }
}
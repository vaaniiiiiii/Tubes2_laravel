<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class videoController extends Controller
{
    public function index()
    {
        $videos = Video::with('user')->get(); // Mengambil semua video beserta user-nya
    return view('beranda', compact('videos'));

    }

    public function show($id)
    {
        $video = video::find($id);
        return view('videoShow', compact('video'));
    }

    public function unggah()
    {
        return view('unggah');
    }

    public function create()
    {
        return view('video');
    }

    public function store(Request $request)
    {

        video::insert($data);
        return redirect('/video');
    }

    public function unggahVideo(Request $request)
{
    try {
        // Validasi video
        $validatedData = $request->validate([
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:50000',
            'judul' => 'required|string|max:50',
            'thumbnail' => 'required',
            'deskripsi' => 'string',
            'link_toko' => 'required',
        ]);

        // Simpan file video ke folder public/videos
        $videoPath = null;
    if ($request->hasFile('video')) {
    $video = $request->file('video');
    $videoPath = 'storage/videos/' . $video->getClientOriginalName();
    $video->move(public_path('storage/videos'), $video->getClientOriginalName());
    }

        // Simpan file thumbnail ke folder public/thumbnail
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = 'storage/thumbnail/' . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('storage/thumbnail'), $thumbnail->getClientOriginalName());
        }

        // Simpan data ke database
        $video = new Video();
        $video->path = $videoPath;
        $video->judul = $validatedData['judul'];
        $video->thumbnail = $thumbnailPath;
        $video->user_id = auth()->id();
        $video->deskripsi = $validatedData['deskripsi'];
        $video->link_toko = $validatedData['link_toko'];
        $video->save();

        return redirect('/profil')->with('success', 'Video has been uploaded successfully!');
    } catch (Exception $e) {
        // Log error untuk debugging
        Log::error('Error uploading video: ' . $e->getMessage());

        // Tampilkan pesan error ke user
        return redirect()->back()->with('error', 'An error occurred while uploading video. Please try again.');
    }
}

}

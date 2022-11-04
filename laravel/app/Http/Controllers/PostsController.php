<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\File;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("posts.index", [
            "posts" => posts::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'upload' => 'required|mimes:gif,jpeg,jpg,png,video/avi,video/mp4,video/3gpp,video/mpg,video/mpeg,video/x-mpeg,video/x-msvideo,
            video/x-ms-wm,video/x-ms-wmv,video/x-ms-asf,video/x-la-asf,video/x-msvideo,video/x-sgi-movie,video/quicktime,video/vnd.rn-realvideo,
            audio/vnd.rn-realmedia,application/x-shockwave-flash,application/octet-stream|max:2048'          
        ]);

        

        $upload = $request->file('upload');
        $fileName = $upload->getClientOriginalName();
        $fileSize = $upload->getSize();
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');        
        $body = $request->get('body');

        \Log::debug("Storing file '{$fileName}' ($fileSize)...");
        
        // Pujar fitxer al disc dur
        $uploadName = time() . '_' . $fileName;
        $filePath = $upload->storeAs(
            'uploads',      // Path
            $uploadName ,   // Filename
            'public'        // Disk
        );

        if (\Storage::disk('public')->exists($filePath)) {
            \Log::debug("Local storage OK");
            $fullPath = \Storage::disk('public')->path($filePath);
            \Log::debug("File saved at {$fullPath}");
            // Desar dades a BD
            $file = File::create([
                'filepath' => $filePath,
                'filesize' => $fileSize,                
            ]);

            $post = posts::create([
                'latitude'=> $latitude,
                'longitude'=> $longitude,
                'body'=> $body,
                'file_id'=>$file->id,
                'author_id'=>auth()->user()->id,
            ]);
            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('files.show', $file) /////// FALTA LA REDIRECCIÓ AL POST!!!
                ->with('success', 'File successfully saved');
        } else {
            \Log::debug("Local storage FAILS");
            // Patró PRG amb missatge d'error
            return redirect()->route("files.create") ///////// AQUI TAMBE
               ->with('error', 'ERROR uploading file');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(posts $post)
    {
        $file=File::find($post->file_id);
        return view('posts.show', [
            'post'=>$post, 
            'file'=>$file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(posts $posts)
    {
        //
    }
}

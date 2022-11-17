<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("posts.index", [
            "posts" => Post::all()
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
 
            $post = Post::create([
                'latitude'=> $latitude,
                'longitude'=> $longitude,
                'body'=> $body,
                'file_id'=>$file->id,
                'author_id'=>auth()->user()->id,
            ]);
            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('posts.show', $post)
                ->with('success', 'Post successfully saved');
        } else {
            \Log::debug("Local storage FAILS");
            // Patró PRG amb missatge d'error
            return redirect()->route("posts.create")
               ->with('error', 'ERROR creating the post');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $file=File::find($post->file_id);
        return view('posts.show', [
            'post'=>$post, 
            'file'=>$file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $file=File::find($post->file_id); //$file = $post->file fa el mateix pq tenim la relacio definida al model.
        return view('posts.edit', [
            'post'=>$post,
            'file'=>$file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
          // Validar fitxer
          $validatedData = $request->validate([
            'upload' => '|mimes:gif,jpeg,jpg,png,video/avi,video/mp4,video/3gpp,video/mpg,video/mpeg,video/x-mpeg,video/x-msvideo,
            video/x-ms-wm,video/x-ms-wmv,video/x-ms-asf,video/x-la-asf,video/x-msvideo,video/x-sgi-movie,video/quicktime,video/vnd.rn-realvideo,
            audio/vnd.rn-realmedia,application/x-shockwave-flash,application/octet-stream|max:2048'          
        ]);
       
        $file=File::find($post->file_id);
        $prevPic = $file->upload;
 
        // Obtenir dades del fitxer
 
        if ($request->hasFile('upload')){
 
            $upload = $request->file('upload');
            $fileName = $upload->getClientOriginalName();
            $fileSize = $upload->getSize();                          
           
            \Log::debug("Storing file '{$fileName}' ($fileSize)...");
 
            // Pujar fitxer al disc dur
            $uploadName = time() . '_' . $fileName;
            $filePath = $upload->storeAs(
                'uploads',      // Path
                $uploadName ,   // Filename
                'public'        // Disk
        );} else{
            $filePath = $file->filepath;
            $filesize = $file->filesize;
        }      
                   
        if (\Storage::disk('public')->exists($filePath)) {
            if($request->hasFile('upload')){                
                \Log::debug("Local storage OK");
                $fullPath = \Storage::disk('public')->path($filePath);
                \Log::debug("File saved at {$fullPath}");
 
                // Desar dades a BD
                $file->filepath = $filePath;
                $file->filesize = $fileSize;
                $file->save();
                \Log::debug("DB storage OK");
                $post->latitude = $request->get('latitude');
                $post->longitude = $request->get('longitude');
                $post->body = $request->get('body');
                $post->save();  
 
                }
                else{
                    $post->latitude = $request->get('latitude');
                    $post->longitude = $request->get('longitude');
                    $post->body = $request->get('body');
                    $post->save();
                }
                // Patró PRG amb missatge d'èxit
                return redirect()->route('posts.show', $post)
                    ->with('success', 'Post modified');
 
            } else {
                \Log::debug("Local storage FAILS");
                // Patró PRG amb missatge d'error
                return redirect()->route("posts.edit")
                ->with('error', 'ERROR modifying post');}
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
       
        if(is_null($post->file_id)){
            $post->delete();
            return redirect(route('posts.index'))->with('success', 'Post successfully deleted');
 
 
        } else{
            $file = File::findOrFail($post->file_id);
            $filePath = $file->filepath;
            if (\Storage::disk('public')->exists($filePath)) {
                $file->delete();
                $post->delete();
                return redirect(route('posts.index'))->with('success', 'Post successfully deleted');
            }  
        }
   
    }
}


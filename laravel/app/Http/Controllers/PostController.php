<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\File;
use App\Models\User;
use App\Models\Like;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
            "posts" => Post::all(),
            "files" => File::all(),
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
        // Validar dades del formulari
        $validatedData = $request->validate([
            'body'      => 'required',
            'upload'    => 'required|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'  => 'required',
            'longitude' => 'required',
            'visibility' => 'required',
        ]);
        
        // Obtenir dades del formulari
        $body          = $request->get('body');
        $upload        = $request->file('upload');
        $latitude      = $request->get('latitude');
        $longitude     = $request->get('longitude');
        $visibility    = $request->get('visibility');

        // Desar fitxer al disc i inserir dades a BD
        $file = new File();
        $fileOk = $file->diskSave($upload);

        if ($fileOk) {
            // Desar dades a BD
            Log::debug("Saving post at DB...");
            $post = Post::create([
                'body'      => $body,
                'file_id'   => $file->id,
                'latitude'  => $latitude,
                'longitude' => $longitude,
                'author_id' => auth()->user()->id,
                'visibility' => $visibility
            ]);
            Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('posts.show', $post)
                ->with('success', __('messages.success',[
                    'attribute' => __('messages.Post'),
            ]));
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("posts.create")
                ->with('error', __('messages.error',[
                    'attribute' => __('messages.post'),
            ]));
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
        $file = file::find($post->file_id);
        $user = user::find($post->author_id);        
        $logUser = auth()->user()->id;

        //per retornar boleá al show
        if(Like::where('user_id', $logUser)->where('post_id', $post->id)->count() > 0) {
            $like = 1;
        } else{
            $like = 0;
        }
        //comptador de likes
        $numlikes = Like::where('post_id', $post->id)->count();
        
        return view("posts.show", [
            'post'   => $post,
            'file'   => $file,
            'author' => $user,  
            'like' => $like,   
            'numlikes' => $numlikes                    
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $file=file::find($post->file_id);
        $user=user::find($post->author_id);
        return view("posts.edit", [
            'post'   => $post,
            'file'   => $file,
            'author' => $user,
        ]);
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
        // Validar dades del formulari
        $validatedData = $request->validate([
            'body'      => 'required',
            'upload'    => 'nullable|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'  => 'required',
            'longitude' => 'required',            
            
        ]);

        // Obtenir dades del formulari
        $body      = $request->get('body');
        $upload    = $request->file('upload');
        $latitude  = $request->get('latitude');
        $longitude = $request->get('longitude');
        $visibility = $request->get('visibility');


        // Desar fitxer (opcional)
        if (is_null($upload) || $post->file->diskSave($upload)) {
            // Actualitzar dades a BD
            Log::debug("Updating DB...");
            $post->body      = $body;
            $post->latitude  = $latitude;
            $post->longitude = $longitude;
            $post->visibility = $visibility;
            $post->save();
            Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('posts.show', $post)
            ->with('success', __('messages.success',[
                'attribute' => __('messages.Post'),
        ]));
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("posts.edit")
            ->with('error', __('messages.error',[
                'attribute' => __('messages.post'),
            ]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    
    public function destroy(Post $post)
    {   
        
        if ($post->author_id !== auth()->user()->id) {

            return redirect()->route("posts.index")
            ->with('error', __('messages.error2'));
        }else{
            // Delete post.
            // Eliminar post de BD
            $post->delete();
            // Eliminar fitxer associat del disc i BD
            $post->file->diskDelete();
            // Patró PRG amb missatge d'èxit
            return redirect()->route("posts.index")
                ->with('success', __('messages.successD'));
        }        
    }

    public function like(Post $post)
    {

        $user = $post->user();
        $like = Like::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);
        return redirect()->back();           
        
    }

    public function unlike(Post $post)
    {
        
        $logUser = auth()->user()->id;
        $like = Like::where('user_id', $logUser)->where('post_id', $post->id);
        $like->delete();
        return redirect()->back(); 
    }
}

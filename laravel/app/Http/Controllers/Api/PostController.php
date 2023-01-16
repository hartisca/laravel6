<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('store','update','like','unlike');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Post::all(),
        ], 200);
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
            'body'      => 'required|string',
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
            return response()->json([
                'success' => true,
                'data' => $post
            ], 201);
            
        } else {
            // Patró PRG amb missatge d'error
            return response()->json([
                'success' => false,                
                'message' => "Error upload file"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = File::find($id);

        if ($post === null){

            return response()->json([
                'success' => false,
                'message'    => 'Post not found'
            ], 404);
        }

        if ($post->exists()){

            return response()->json([
                'success' => true,
                'data'    => $post
            ], 200);
        } else {

            return response()->json([
                'success'  => false,
                'message' => 'Error!'
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $file = File::find($id);


        if ($post === null){

            return response()->json([
                'success' => false,
                'message'    => 'Post not found'
            ], 404);
        }
        // Validar fitxer
        // Validar fitxer
        $validatedData = $request->validate([
            'body'      => 'required|string',
            'upload'    => 'required|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'  => 'required',
            'longitude' => 'required',
            'visibility' => 'required',
        ]);

        // Obtenir dades del formulari
        $body      = $request->get('body');
        $upload    = $request->file('upload');
        $latitude  = $request->get('latitude');
        $longitude = $request->get('longitude');
        $visibility = $request->get('visibility');

        // Desar fitxer al disc i inserir dades a BD
        $upload = $request->file('upload');
        $ok = $file->diskSave($upload);
    
        if ($ok) {
            $post->body      = $body;
            $post->latitude  = $latitude;
            $post->longitude = $longitude;
            $post->visibility = $visibility;
            $post->save();

            return response()->json([
                'success' => true,
                'data'    => $post
            ], 201);
        } else {

            return response()->json([
                'success'  => false,
                'message' => 'Error uploading post'
            ], 500);
        } 
    }   

    public function like($id)
    {
        $post = Post::find($id);        
        $like = Like::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
        ]);

        if ($like){
            return response()->json([
                'success' => true,
                'data' => $like,
            ]); 
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Error on liking the post',
            ]); 
        }
        
    }

    public function unlike($id){

        $post = Post::find($id);
        $logUser = auth()->user()->id;
        $like = Like::where('user_id', $logUser)->where('post_id', $post->id);

        if ($like){
            
            $like->delete();

            return response()->json([
                'success' => true,
                'data' => $post,
            ], 200); 
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Error on this unlike'
            ], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);        
        
        if ($post === null){

            return response()->json([
                'success' => false,
                'message'    => 'Post not found'
            ], 404);
        }
        
        $ok = $post->delete();

        if ($ok){

            return response()->json([
                'success' => true,
                'data'    => $post
            ], 200);

        } else {

            return response()->json([
                'success'  => false,
                'message' => 'Error, deleting post',
            ], 500);
        }
    }

    public function update_workaround(Request $request, $id)
    {
        return $this->update($request, $id);
    }
}

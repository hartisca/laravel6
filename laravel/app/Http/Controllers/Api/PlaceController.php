<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Place;
use App\Models\Fav;
use Illuminate\Support\Facades\Log;



class PlaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('store','update','fav','unfav');
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
            'data' => Place::all(),
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
            'name' => 'required',
            'description' => 'required',
            'upload'      => 'required|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'    => 'required',
            'longitude'   => 'required',
            'visibility' => 'required',
            
        ]);
        
        // Obtenir dades del formulari
        $name = $request->get('name');
        $description = $request->get('description');
        $upload      = $request->file('upload');
        $latitude    = $request->get('latitude');
        $longitude   = $request->get('longitude');
        $visibility  = $request->get('visibility');
        //$rating      = $request->get('rating');

        // Desar fitxer al disc i inserir dades a BD
        $file = new File();
        $fileOk = $file->diskSave($upload);

        if ($fileOk) {
            // Desar dades a BD
            Log::debug("Saving place at DB...");
            $place = Place::create([
                'name' => $name,
                'description' => $description,
                'file_id'     => $file->id,
                'latitude'    => $latitude,
                'longitude'   => $longitude,
                'author_id'   => auth()->user()->id,
                'visibility'  => $visibility
            ]);
            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return response()->json ([
                'success' => true,
                'data' => $place
            ],201);

                
        } else {
            \Log::debug("Disk storage FAILS");
            // Patró PRG amb missatge d'error
            return response()->json ([
                'success' => false,
                'message' => 'ERROR Uploading file'
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $place = File::find($id);

        if ($place === null){

            return response()->json([
                'success' => false,
                'message'    => 'Place not found'
            ], 404);
        }

        if ($place->exists()){

            return response()->json([
                'success' => true,
                'data'    => $place
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
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $place = Place::find($id);
        $file = File::find($id);


        if ($place === null){

            return response()->json([
                'success' => false,
                'message'    => 'Post not found'
            ], 404);
        }
        // Validar fitxer
        // Validar fitxer
        $validatedData = $request->validate([
            'name' => 'required',
            'description'      => 'required|string',
            'upload'    => 'required|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'  => 'required',
            'longitude' => 'required',
            'visibility' => 'required',
        ]);

        // Obtenir dades del formulari
        $name = $request->get('name');
        $description      = $request->get('description');
        $upload    = $request->file('upload');
        $latitude  = $request->get('latitude');
        $longitude = $request->get('longitude');
        $visibility = $request->get('visibility');

        // Desar fitxer al disc i inserir dades a BD
        $upload = $request->file('upload');
        $ok = $file->diskSave($upload);
    
        if ($ok) {
            $place->description      = $description;
            $place->latitude  = $latitude;
            $place->longitude = $longitude;
            $place->visibility = $visibility;
            $place->save();

            return response()->json([
                'success' => true,
                'data'    => $place
            ], 201);
        } else {

            return response()->json([
                'success'  => false,
                'message' => 'Error uploading post'
            ], 500);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $place = Place::find($id);        
        
        if ($place === null){

            return response()->json([
                'success' => false,
                'message'    => 'Place not found'
            ], 404);
        }
        
        $ok = $place->delete();

        if ($ok){

            return response()->json([
                'success' => true,
                'data'    => $place
            ], 200);

        } else {

            return response()->json([
                'success'  => false,
                'message' => 'Error, deleting place',
            ], 500);
        }
    }



    public function fav ($id)
    {    
        $place = Place::find($id);        
        $fav = Fav::create([
            'user_id' => auth()->user()->id,
            'place_id' => $place->id,
        ]);

        if ($fav){
            return response()->json([
                'success' => true,
                'data' => $fav,
            ]); 
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Error on liking the post',
            ]); 
        }      
    }


    public function unfav($id){

        $place = Place::find($id);
        $logUser = auth()->user()->id;
        $fav = Fav::where('user_id', $logUser)->where('place_id', $place->id);

        if ($fav){
            
            $fav->delete();

            return response()->json([
                'success' => true,
                'data' => $place,
            ], 200); 
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Error on this unfav'
            ], 500);
        }
    }

}
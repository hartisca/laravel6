<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


use App\Models\Place;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Fav;



class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        
        return view("places.index", [
            "places" => Place::all(),
            "files"=> File::all(),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("places.create");
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
            'name'        => 'required',
            'description' => 'required',
            'upload'      => 'required|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'    => 'required',
            'longitude'   => 'required',
            
        ]);
        
        // Obtenir dades del formulari
        $name        = $request->get('name');
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
                'name'        => $name,
                'description' => $description,
                'file_id'     => $file->id,
                'latitude'    => $latitude,
                'longitude'   => $longitude,
                'author_id'   => auth()->user()->id,
                'visibility'  => $visibility
            ]);
            \Log::debug("DB storage OK");
            // Patr?? PRG amb missatge d'??xit
            return response()->json ([
                'success' => true,
                'data' => $place
            ],201);

                
        } else {
            \Log::debug("Disk storage FAILS");
            // Patr?? PRG amb missatge d'error
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
    public function show(Place $place)
    {   
        $file=File::find($place->file_id);
        $user=User::find($place->author_id);
        $logUser = auth()->user()->id;
        $numFavs= count(Fav::where('user_id',$logUser)->where('place_id',$place->id)->get());

       if( Fav::where('user_id',$logUser)->where('place_id',$place->id)->count() > 0) {
        $fav = 1;
       }
       else{
        $fav = 0 ;
    
       }

        return view("places.show", [
            'place'  => $place,
            'file'   => $file,
            'author' => $user,
            'fav'    => $fav,
            'numFavs'=> $numFavs,
            
           ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    { 
        if ($place->author_id == auth()->user()->id){
        
        return response()->json([
            'succes'=>true,
            'data' => "place,file,author"
            
            /*view("places.edit", [ //com li paso aixo dins data?
            'place'  => $place,
            'file'   =>$place->file,
            'author' => $place->user*/
        ]);
        }
        else{
            return redirect()->back()
            ->with('success', 'You cannot edit this content');}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'upload'      => 'nullable|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'    => 'required',
            'longitude'   => 'required',
            
        ]);
        
        // Obtenir dades del formulari
        $name        = $request->get('name');
        $description = $request->get('description');
        $upload      = $request->file('upload');
        $latitude    = $request->get('latitude');
        $longitude   = $request->get('longitude');
        $visibility  = $request->get('visibility');

        // Desar fitxer (opcional)
        if (is_null($upload) || $place->file->diskSave($upload)) {
            // Actualitzar dades a BD
            Log::debug("Updating DB...");
            $place->name        = $name;
            $place->description = $description;
            $place->latitude    = $latitude;
            $place->longitude   = $longitude;
            $place->visibility  = $visibility;
            $place->save();
            \Log::debug("DB storage OK");
            // Patr?? PRG amb missatge d'??xit
            return response()->json([
                'success'=> true,
                'data'=> $place
            ],201);
                
                
        } else {
            // Patr?? PRG amb missatge d'error
            return response()->json([
                'success'=> false,
                'message' => 'ERROR Uploading place'
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {   
    if ($place->author_id == auth()->user()->id){
        // Eliminar place de BD
        $place->delete();
        // Eliminar fitxer associat del disc i BD
        $place->file->diskDelete();
        // Patr?? PRG amb missatge d'??xit
            return redirect()->route("places.index")
                ->with('success', 'Place successfully deleted');}

    else {
            return redirect()->back()
            ->with('success', 'You cannot delete this content');}
    }



public function fav (Place $place)
{
    
    Fav::create([
        'user_id'     => auth()->user()->id,
        'place_id'    => $place->id
    ]);

    return redirect()->back()->with('success', __('Place successfully added to favorites'));
    
       
    }


public function unfav (Place $place)
{
    // Eliminar place de BD
    $logUser = auth()->user()->id;
    $fav = Fav::where('user_id',$logUser)->where('place_id',$place->id);
    $fav->delete();
    

    return redirect()->back()
        ->with('success', 'Place successfully removed from favorites');
}


}
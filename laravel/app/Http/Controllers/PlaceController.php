<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("places.index", [
            "places" => Place::all()
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
        $description = $request->get('description');
        //$visibility = $request->get('visibility_id');
        //$category = $request->get('category_id');
 
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

            $place = Place::create([
                'latitude'=> $latitude,
                'longitude'=> $longitude,
                'description'=> $description,
                'file_id'=> $file->id,
                'author_id'=>auth()->user()->id,
                //'visibility_id'=> $visibility,
                //'category_id'=> $category
            ]);
            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('files.show', $file) 
                ->with('success', 'File successfully saved');
        } else {
            \Log::debug("Local storage FAILS");
            // Patró PRG amb missatge d'error
            return redirect()->route("files.create") 
               ->with('error', 'ERROR uploading file');
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
        return view('places.show', [
            'place'=>$place, 
            'file'=>$file
        ]);
    }

    public function edit(Place $place)
    {
        $file= File::find($place->file_id);
        return view('places.edit', [
            'file'=>$file,
            'place'=>$place]);
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
        //
        $validatedData = $request->validate([
            'upload' => 'required|mimes:gif,jpeg,jpg,png,video/avi,video/mp4,video/3gpp,video/mpg,video/mpeg,video/x-mpeg,video/x-msvideo,
            video/x-ms-wm,video/x-ms-wmv,video/x-ms-asf,video/x-la-asf,video/x-msvideo,video/x-sgi-movie,video/quicktime,video/vnd.rn-realvideo,
            audio/vnd.rn-realmedia,application/x-shockwave-flash,application/octet-stream|max:2048'          
        ]);
        
        $file=File::find($place->file_id);
        
        $filePath = $file->filepath;//
        $fileSize = $file->filesize;//

        if ($request->hasFile('upload')){
            
            $upload = $request->file('upload');
            $fileName = $upload->getClientoriginalName();
            $fileSize = $upload->getSize();
            $request->upload= $fileName;

            \Log::debug("Storing file {$fileName} ($fileSize)...");
            
            //Pujar fitxer al disc dur
            $uploadName = time() . '_' . $fileName;
            $filePath = $upload->storeAs(
                'uploads',      // Path
                $uploadName ,   // FileName
                'public',       // Disk
            
        );
        }

        
            
        if (\Storage::disk('public')->exists($filePath)) {
            if($request->hasFile('upload')){

                \Log::debug("Local storage OK");
                $fullPath = \Storage::disk('public')->path($filePath);
                \Log::debug("File saved at {$fullPath}");
                
                //Desar dades a BD
                $file->filepath = $filePath;
                $file->filesize = $fileSize;
                $file->save();
                
                //$place->latitude = $request->get('latitude');
                //$place->longitude = $request->get('longitude');
                $place->description = $request->get('description');
                $place->save();

                \Log::debug ("DB storage (update) OK");

                //Patró PRG amb missatge d'èxit
                return redirect()->route("places.show", $place)
                    ->with('success', 'Place modified');
            }
            else {
                \Log::debug("Local storage Fails");
                //Patró PRG amb missatge d'error
                return redirect()->route("places.edit");
            }
        
        }}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //
    }
    
}
<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
   @csrf
   <div class="form-group">
            <label for="upload">File:</label>
            <input type="file" class="form-control" name="upload"/>
       <br>
            <label for="Latitude">Latitude:</label>
            <input type="text" class="form-control" name="latitude"/>
       <br>
            <label for="Longitude">Longitude:</label>
            <input type="text" class="form-control" name="longitude"/>
       <br>
            <label for="body">Escribe tu texto:</label>
       <br>
            <textarea name="body" rows="10" cols="70"> </textarea>
              
   </div>
   <br>
   <button type="submit" class="btn btn-primary">Create</button>   
   <button type="reset" class="btn btn-secondary">Reset</button>   
</form>
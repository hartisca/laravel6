<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\Place;
use Laravel\Sanctum\Sanctum;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\WithFaker;

class PlaceTest extends TestCase
{
    public static User $testUser;
    public static array $validData = [];
    public static array $invalidData = [];
   
    public static function setUpBeforeClass() : void
    {
        parent::setUpBeforeClass();
        // Creem usuari/a de prova
        $name = "test_" . time();
        self::$testUser = new User([
            "name"      => "{$name}",
            "email"     => "{$name}@mailinator.com",
            "password"  => "12345678"
        ]);
        // TODO Omplir amb dades vàlides
        $name  = "avatar.png";
        $size = 500; /*KB*/
        $upload = UploadedFile::fake()->image($name)->size($size);
        self::$validData = [
             'name'     => 'Marc',
             'description'      => 'Mensaje de prueba',
             'upload'    => $upload,
             'latitude'  => '24.15',
             'longitude' => '33.3',
             'visibility' => '1',
         ];
 
        // TODO Omplir amb dades incorrectes
        self::$invalidData = [
             'name' => 3,
             'description'      => 'testing',
             'upload'    => $upload,
             'latitude'  => '24.15',
             'longitude' => '33.3',
             'visibility' => '1',
        ];
    }

    public function test_place_first()
   {
       // Desem l'usuari al primer test
       self::$testUser->save();
       // Comprovem que s'ha creat
       $this->assertDatabaseHas('users', [
           'email' => self::$testUser->email,
       ]);
   }

   public function test_place_create()
   {
       Sanctum::actingAs(self::$testUser);
       // Cridar servei web de l'API
       $response = $this->postJson("/api/places", self::$validData);
        // Check OK response
        $this->_test_ok($response, 201);
       // Revisar que no hi ha errors de validació
       $params = array_keys(self::$validData);
       $response->assertValid($params);
       // Read, update and delete dependency!!!
       $json = $response->getData();
       return $json->data;
   }

   public function test_place_create_error()
   {
       Sanctum::actingAs(self::$testUser);
       // Cridar servei web de l'API
       $response = $this->postJson("/api/places", self::$invalidData);
       // TODO Revisar errors de validació
       $params = [ 'name'];
       $response->assertInvalid($params)->assertStatus(422);       
       // TODO Revisar més errors
   }

    public function test_list_all(){
        // List all files using API web service
        $response = $this->getJson("/api/places");
        
        // Check OK response
        $this->_test_ok($response);
        // Check JSON dynamic values
        $response->assertJsonPath("data",
            fn ($data) => is_array($data)
        );
    }

    /**
     * @depends test_place_create
    */
   public function test_place_update(object $place)
   {
      Sanctum::actingAs(self::$testUser);

      // Create fake file
      $name  = "photo.jpg";
      $size = 1000; /*KB*/
      $upload = UploadedFile::fake()->image($name)->size($size);

      $response = $this->putJson("/api/places/{$place->id}", [
          'name' => 'Marc2',
          'upload' => $upload,
          'description' => 'new description',
          'latitude' => '22.25',
          'longitude' => '14.36',
          'visibility' => 2]);
      
      $response->assertValid(['name', 'upload', 'description', 'latitude', 'longitude', 'visibility']);
      // Check OK response
      $this->_test_ok($response, 201);
          
      $response->assertJsonPath("data.id",
        fn ($id) => !empty($id));
    }

     /**
    * @depends test_place_create
    */
    public function test_place_update_error(object $place)
    {
        Sanctum::actingAs(self::$testUser);

        // Create fake file with invalid max size
        $desc = 42;
        $latitude = '255555';
        // Upload fake file using API web service
        $response = $this->putJson("/api/places/{$place->id}", [
            'description' => $desc,
            'latitude' => $latitude,
        ]);
        // Check ERROR response
        $this->_test_error($response);
    }

    public function test_place_update_notfound()
   {
       Sanctum::actingAs(self::$testUser);
       
       $id = "not_exists";
       $response = $this->putJson("/api/places/{$id}", []);
       $this->_test_notfound($response);
   }

    /**
     * @depends test_place_create
     */
    public function test_place_show(object $place)
    {
        // Read one file
        $response = $this->getJson("/api/places/{$place->id}");
        // Check OK response
        $this->_test_ok($response);
        // Check JSON exact values
        $response->assertJsonPath("data.id",
            fn ($id) => !empty($id)
        );
    }

    public function test_place_show_notfound()
    {
        $id = "not_exists";
        $response = $this->getJson("/api/places/{$id}");
        $this->_test_notfound($response);
    }

    /**
     * @depends test_place_create
     */
    public function test_fav_place(object $place)
    {
       Sanctum::actingAs(self::$testUser);

       $response = $this->postJson("/api/places/{$place->id}/fav");
       // Check OK response
       $this->_test_ok($response);

    }

    /**
     * @depends test_place_create
     */
    public function test_unfav_place(object $place)
    {
        Sanctum::actingAs(self::$testUser);

       $response = $this->deleteJson("/api/places/{$place->id}/fav");
       // Check OK response
       $this->_test_ok($response);
    }

    /**
     * @depends test_place_create
    */

   public function test_destroy(Object $place){
       // Delete one file using API web service
       $response = $this->deleteJson("/api/places/{$place->id}");
       // Check OK response
       $this->_test_ok($response);
   }   
   
   public function test_place_last()
   {
       // Eliminem l'usuari al darrer test
       self::$testUser->delete();
       // Comprovem que s'ha eliminat
       $this->assertDatabaseMissing('users', [
           'email' => self::$testUser->email,
       ]);
   }
   protected function _test_ok($response, $status = 200)
    {
        // Check JSON response
        $response->assertStatus($status);
        // Check JSON properties
        $response->assertJson([
            "success" => true,
            "data"    => true // any value
        ]);
    }
  
    protected function _test_error($response)
    {
        // Check response
        $response->assertStatus(422);
        // Check validation errors
        $response->assertInvalid(["upload"]);
        // Check JSON properties
        $response->assertJson([
            "message" => true, // any value
            "errors"  => true, // any value
        ]);       
        // Check JSON dynamic values
        $response->assertJsonPath("message",
            fn ($message) => !empty($message) && is_string($message)
        );
        $response->assertJsonPath("errors",
            fn ($errors) => is_array($errors)
        );
    }
   
    protected function _test_notfound($response)
    {
        // Check JSON response
        $response->assertStatus(404);
        // Check JSON properties
        $response->assertJson([
            "success" => false,
            "message" => true // any value
        ]);
        // Check JSON dynamic values
        $response->assertJsonPath("message",
            fn ($message) => !empty($message) && is_string($message)
        );       
    }

}

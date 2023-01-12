<?php
 
namespace Tests\Feature;
 
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\Post;
use Laravel\Sanctum\Sanctum;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\WithFaker;

 
class PostTest extends TestCase
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
            'body'      => 'Mensaje de prueba',
            'upload'    => $upload,
            'latitude'  => '24.15',
            'longitude' => '33.322',
            'visibility' => '1',
        ];

       // TODO Omplir amb dades incorrectes
       self::$invalidData = [
            'body'      => 3,
            'upload'    => $upload,
            'latitude'  => '24.15',
            'longitude' => '33.322',
            'visibility' => '1',
       ];
   }
 
   public function test_posts_first()
   {
       // Desem l'usuari al primer test
       self::$testUser->save();
       // Comprovem que s'ha creat
       $this->assertDatabaseHas('users', [
           'email' => self::$testUser->email,
       ]);
   }
    
   public function test_posts_create()
   {
       Sanctum::actingAs(self::$testUser);
       // Cridar servei web de l'API
       $response = $this->postJson("/api/posts", self::$validData);
        // Check OK response
        $this->_test_ok($response, 201);
       // Revisar que no hi ha errors de validació
       $params = array_keys(self::$validData);
       $response->assertValid($params);
       // Read, update and delete dependency!!!
       $json = $response->getData();
       return $json->data;
   }
 
   public function test_posts_create_error()
   {
       Sanctum::actingAs(self::$testUser);
       // Cridar servei web de l'API
       $response = $this->postJson("/api/posts", self::$invalidData);
       // TODO Revisar errors de validació
       $params = [ 'body'];
       $response->assertInvalid($params)->assertStatus(422);       
       // TODO Revisar més errors
   }
 
   // TODO Sub-tests de totes les operacions CRUD
 
   public function test_list_all(){
       // List all files using API web service
       $response = $this->getJson("/api/posts");
       
       // Check OK response
       $this->_test_ok($response);
       // Check JSON dynamic values
       $response->assertJsonPath("data",
           fn ($data) => is_array($data)
       );
   }

   /**
     * @depends test_posts_create
     */
   public function test_post_update(object $post)
   {
       Sanctum::actingAs(self::$testUser);

      $response = $this->putJson("/api/posts/{$post->id}", [self::$validData]);
      $params = array_keys(self::$validData);
      $response->assertValid($params);
      // Check OK response
      $this->_test_ok($response, 201);
          
      $response->assertJsonPath("data.id",
        fn ($id) => !empty($id)
    );
        // Read, update and delete dependency!!!
        $json = $response->getData();
        return $json->data;

  }


   public function test_destroy(Object $post){
       $response = $this->getJson("/api/posts/$post->id");
   }

   
   public function test_posts_last()
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


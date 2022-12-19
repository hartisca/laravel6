<?php
 
namespace Tests\Feature;
 
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\Post;
use Laravel\Sanctum\Sanctum;
use Illuminate\Testing\Fluent\AssertableJson;
 
class MyresourceTest extends TestCase
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
            'longitude' => '33322',
            'visibility' => '1',
        ];

       // TODO Omplir amb dades incorrectes
       self::$invalidData = [
            'body'      => 'Mensaje de prueba',
            'upload'    => 6,
            'latitude'  => '24.15',
            'longitude' => '332225',
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

 
   public function test_posts_auth_operation()
   {
       Sanctum::actingAs(self::$testUser);
       // TODO Lògica del test
   }
 
   public function test_posts_guest_operation()
   {
       // TODO Lògica del test
   }
 
   public function test_posts_create()
   {
       Sanctum::actingAs(self::$testUser);
       // Cridar servei web de l'API
       $response = $this->postJson("/api/posts", self::$validData);
       // Revisar que no hi ha errors de validació
       $params = array_keys(self::$validData);
       $response->assertValid($params);

       //Comprovem si hi ha algún post a la BD
       $this->assertCount(1, Post::all());
       // TODO Revisar més errors
   }
 
   public function test_posts_create_error()
   {
       Sanctum::actingAs(self::$testUser);
       // Cridar servei web de l'API
       $response = $this->postJson("/api/posts", self::$invalidData);
       // TODO Revisar errors de validació
       $params = [ 'upload'];
       $response->assertInvalid($params)->assertStatus(302)->assertRedirect(route('list'));       
       // TODO Revisar més errors
   }
 
   // TODO Sub-tests de totes les operacions CRUD
 
   public function test_list_all(){
       $response = $this->getJson("/api/posts");
       $response-> assertStatus(302)->assertRedirect(route('list'));
       //dd($response->json());
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
}


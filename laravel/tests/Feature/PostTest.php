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
       self::$validData = [
           'name'=> $name,
           'email' => "{$name}@mailinator.com",
           'password' => '12345678'
        ];

       // TODO Omplir amb dades incorrectes
       self::$invalidData = [
           'name' => 'marc',
           'email' => 'alskfjlasf.es',
           'password' => '12345678'
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
       // TODO Revisar més errors
   }
 
   public function test_posts_create_error()
   {
       Sanctum::actingAs(self::$testUser);
       // Cridar servei web de l'API
       $response = $this->postJson("/api/posts", self::$invalidData);
       // TODO Revisar errors de validació
       $params = [ /* Omplir */];
       $response->assertInvalid($params);
       // TODO Revisar més errors
   }
 
   // TODO Sub-tests de totes les operacions CRUD
 
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


<?php

namespace Tests\Feature\Listagem;

use App\Models\Lista;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ListagemTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /** @test */
    public function only_logged_users_can_access_shop_list()
    {
        $response = $this->get('/listas');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function create_new_list()
    {       

        $lista = Lista::factory()->make(['nome' => 'teste 2 Mercado', 'descricao' => 'teste description']);
        $user = User::factory()->create();
        $this->actingAs($user);
       $result = $this->post('/lista/create', [
                'nome' => $lista->nome,
                'descricao' => $lista->descricao,
        ]);


        $this->assertDatabaseHas('listas', [
            'nome' => $lista->nome
        ]);
    }

     /** @test */
     public function check_if_form_request_validated_description()
     {       
 
         $user = User::factory()->create();
         $this->actingAs($user);
      
 
         $this->postJson('/lista/create')
         ->assertJsonValidationErrors('nome')
         ->assertJsonValidationErrors('descricao');

         $this->postJson('/lista/create', [
            'nome' => 'nome test'
         ])
         ->assertJsonValidationErrors('descricao');
     }
}

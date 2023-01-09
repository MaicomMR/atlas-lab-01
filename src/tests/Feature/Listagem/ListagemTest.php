<?php

namespace Tests\Feature\Listagem;

use App\Models\Lista;
use Tests\TestCase;

class ListagemTest extends TestCase
{

    /** @test */
    public function only_logged_users_can_access_shop_list()
    {
        $response = $this->get('/listas');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function create_new_list()
    {
        $lista = Lista::factory()->create(['nome' => 'Lista phpunit Mercado']);

        $lista->refresh();

        $this->assertEquals('Lista phpunit Mercado', $lista->nome);
        $this->assertNull($lista->descricao);
        $this->assertNull($lista->user_id);

        $lista = Lista::factory()->create(['nome' => 'Lista phpunit Mercado', 'descricao' => NULL]);

        $this->assertNull($lista->descricao);
    }
}

<?php

namespace Tests\Feature\Listagem;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListagemTest extends TestCase
{
    /** @test */
    public function only_logged_users_can_access_shop_list()
    {
        $response = $this->get('/listas');

        $response->assertRedirect('/login');
    }
}

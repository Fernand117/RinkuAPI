<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SalarioTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    use DatabaseTransactions;

    public function testSueldoGet()
    {
        $response = $this->get('api/tipos');
        $response->assertStatus(200);
        $response->assertJson(['Mensaje' => 'Lista de tipos de sueldos']);
    }

    public function testSueldoPost()
    {
        $data = ['tipo' => 'SueldoPrueba2'];
        $response = $this->post('api/tipos', $data);
        $response->assertStatus(200);
        $response->assertJson(['Mensaje' => 'Tipo de sueldo guardado.']);
    }

    public function testSueldoPut()
    {
        $id = 4;
        $data = ['tipo' => 'SP'];
        $response = $this->put('api/tipos/'.$id, $data);
        $response->assertStatus(200);
        $response->assertJson(['Mensaje' => 'Tipo de sueldo actualizado.']);
    }

    public function testSueldoDelete()
    {
        $id = 4;
        $response = $this->delete('api/tipos/'.$id);
        $response->assertStatus(200);
        $response->assertJson(['Mensaje' => 'Tipo de sueldo eliminado.']);
    }
}

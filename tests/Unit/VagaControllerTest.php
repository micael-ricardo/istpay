<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\VagaController;
use App\Http\Requests\VagaRequest;

class VagaControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware();
    }

    public function testStore()
    {
        $request = new VagaRequest([
            'titulo' => 'Desenvolvedor PHP',
            'descricao' => 'Procuramos um desenvolvedor PHP experiente para se juntar à nossa equipe.',
            'tipo' => 'CLT',
        ]);

        $controller = new VagaController();
        $response = $controller->store($request);

        $this->assertEquals('Registro inserido com sucesso!', $response->getSession()->get('success'));
    }
}

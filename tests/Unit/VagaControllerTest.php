<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\VagaController;
use App\Http\Requests\VagaRequest;

class VagaControllerTest extends TestCase
{

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

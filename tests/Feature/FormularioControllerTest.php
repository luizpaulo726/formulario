<?php
declare(strict_types=1);
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Mockery\Mock;

class FormularioControllerTest extends TestCase
{
    public function testArmazenaCadastroFormularioComSucesso()
    {
        // Mock do serviço
        $formularioServiceMock = Mockery::mock('App\Services\FormularioService');
        $formularioServiceMock->shouldReceive('getByIdFormulario')
            ->once()
            ->with('form-1')
            ->andReturn([
                'id' => 'form-1',
                'name' => 'Cadastro de pessoa',
                'fields' => [
                    ['id' => 'field-1-1', 'label' => 'Qual o seu nome?', 'type' => 'text', 'required' => true],
                    ['id' => 'field-1-2', 'label' => 'Qual a sua idade?', 'type' => 'number', 'required' => false],
                    ['id' => 'field-1-3', 'label' => 'Você esta disposto à participar de um projeto?', 'type' => 'select', 'required' => true, 'choices' => ['Sim', 'Não', 'Talvez', 'Não sei']],
                ]
            ]);

        app()->instance('App\Services\FormularioService', $formularioServiceMock);

        // Dados válidos
        $data = [
            'field-1-1' => 'Candidato Luiz Paulo',
            'field-1-2' => 37,
            'field-1-3' => 'Sim',
        ];

        // Chamada ao endpoint
        $response = $this->postJson('/api/formularios/form-1/form-preenchimentos', $data);

        // Asserts
        $response->assertStatus(201)
            ->assertJson([
                'field-1-1' => 'Candidato Luiz Paulo',
                'field-1-2' => 37,
                'field-1-3' => 'Sim',
            ]);
    }

    public function testCadastroComCamposObrigatoriosAusentes()
    {
        // Mock do serviço
        $formularioServiceMock = Mockery::mock('App\Services\FormularioService');
        $formularioServiceMock->shouldReceive('getByIdFormulario')
            ->once()
            ->with('form-1')
            ->andReturn([
                'id' => 'form-1',
                'name' => 'Cadastro de pessoa',
                'fields' => [
                    ['id' => 'field-1-1', 'label' => 'Qual o seu nome?', 'type' => 'text', 'required' => true],
                    ['id' => 'field-1-2', 'label' => 'Qual a sua idade?', 'type' => 'number', 'required' => false],
                    ['id' => 'field-1-3', 'label' => 'Você esta disposto à participar de um projeto?', 'type' => 'select', 'required' => true, 'choices' => ['Sim', 'Não', 'Talvez', 'Não sei']],
                ]
            ]);

        app()->instance('App\Services\FormularioService', $formularioServiceMock);

        // Dados com campo obrigatório ausente
        $data = [
            'field-1-3' => "Sim",
        ];

        // Chamada ao endpoint
        $response = $this->postJson('/api/formularios/form-1/form-preenchimentos', $data);

        // Asserts
        $response->assertStatus(422)
            ->assertJsonStructure([
                'error',
                'messages',
            ])
            ->assertJsonFragment([
                'field-1-1' => ['O campo Qual o seu nome? é obrigatório!'],
            ]);
    }
}

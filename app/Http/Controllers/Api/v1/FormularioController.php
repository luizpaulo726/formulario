<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Services\FormularioService;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    protected $formularioService;
    protected $caminhoArquivoFormularioJson;
    public function __construct(FormularioService $formularioService){
        $this->formularioService = $formularioService;
        $this->caminhoArquivoFormularioJson = base_path('forms_definition.json');
    }
    public function index() {

    }

    public function show($id_formulario) {
        $formulario = $this->formularioService->getByIdFormulario($id_formulario);

        if (!$formulario) {
            return response()->json(['error' => 'Formulário json não encontrado'], 404);
        }

        $preenchimentos = json_decode(file_get_contents($this->caminhoArquivoFormularioJson), true) ?? [];
        $result = $preenchimentos[$id_formulario] ?? [];

        return response()->json($result, 200);
    }
    public function create() {}

    public function store(Request $request, $id_formulario)
    {
        try {

            $formulario = $this->formularioService->getByIdFormulario($id_formulario);

            if (!$formulario) {
                return response()->json(['error' => 'Formulário não encontrado ou não existe!!'], 404);
            }

            $regras = $this->getRegras($formulario);


            $validatedData = $request->validate($regras);

            $preenchimentos = json_decode(file_get_contents($this->caminhoArquivoFormularioJson), true) ?? [];
            $preenchimentos[$id_formulario][] = $validatedData;
            file_put_contents($this->caminhoArquivoFormularioJson, json_encode($preenchimentos));

            return response()->json($validatedData, 201);
        }catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Erro de validação',
                'messages' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    private function getRegras ($formulario) {
        $regras = [];

        foreach ($formulario['fields'] as $campo) {
            $campoRegras = [];

            if (!empty($campo['required'])) {
                $campoRegras[] = 'required';
            }

            if ($campo['type'] === 'number') {
                $campoRegras[] = 'numeric';
            } elseif ($campo['type'] === 'select' && !empty($campo['choices'])) {
                $campoRegras[] = 'in:' . implode(',', $campo['choices']);
            }

            if (!empty($campoRegras)) {
                $regras[$campo['id']] = implode('|', $campoRegras);
            }
        }
        return $regras;
    }
    public function teste() {
        return 'teste luiz';
    }
}

<?php

namespace App\Services;

class FormularioService {
    protected string $caminhoArquivoFormularioJson;
    public function __construct()
    {
        $this->caminhoArquivoFormularioJson = base_path('forms_definition.json');
    }

    public function getByIdFormulario($idFormulario) {

        if(!$idFormulario) {
            throw new \Exception("id do formulario vazio!!");
        }

        if (!file_exists($this->caminhoArquivoFormularioJson)) {
            throw new \Exception("Arquivo do formulario nao foi encontrado!!: {$this->filePath}");
        }

        $formularios = json_decode(file_get_contents($this->caminhoArquivoFormularioJson), true);
        return collect($formularios)->firstWhere('id', $idFormulario);

    }
}

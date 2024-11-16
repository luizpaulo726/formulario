

# Projeto Formulário

## Passo a Passo para Rodar o Projeto

### 1. Clonar o Projeto
Para começar, clone o repositório do projeto para sua máquina local:

```bash
git clone <URL_DO_REPOSITORIO>
```

### 2. Entrar no Diretório do Projeto
Entre no diretório do projeto:

```bash
cd <NOME_DO_DIRETORIO>
```

### 3. Iniciar o Docker Compose
Para rodar o ambiente de containers do Docker, execute o seguinte comando:

```bash
docker-compose up -d
```

Este comando vai iniciar os containers necessários para rodar o projeto.

### 4. Verificar se os Containers Estão Rodando
Após o Docker Compose iniciar os containers, verifique se tudo está funcionando corretamente com o comando:

```bash
docker ps
```

Isso irá listar os containers em execução. Localize o container com o nome `formulario_app` e copie o ID correspondente.

### 5. Acessar o Container
Agora, acesse o container do `formulario_app` com o comando:

```bash
docker exec -it <ID_COPIADO> bash
```

Isso abrirá um terminal dentro do container.

### 6. Instalar as Dependências
Dentro do container, execute o comando para instalar as dependências do projeto:

```bash
composer install
```

### 7. Configurar o Ambiente
Copie o arquivo de exemplo `.env` para a configuração padrão do ambiente:

```bash
cp .env.example .env
```

### 8. Gerar a Chave de Aplicação
Agora, gere a chave de aplicação para o Laravel:

```bash
php artisan key:generate
```

### 9. Acessar o Projeto
Após os passos acima, o ambiente está configurado. Agora, abra o navegador e acesse a seguinte URL para testar a API:

```
http://localhost:8080/api/formularios
```

### 10. Testar a Aplicação
Para rodar os testes, no terminal do Docker, execute:

```bash
./vendor/bin/pest
```

Isso vai rodar os testes automatizados do projeto.

---

Pronto!

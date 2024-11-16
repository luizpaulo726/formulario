<<<<<<< HEAD

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

Pronto! Agora você tem o ambiente configurado e está pronto para desenvolver e testar o projeto.
=======
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
>>>>>>> master

## Desafio testes Prodigious

# Foi desenvolvida um sistema CRUD - com upload de imagens.

-   Para abrir o projeto: Ter uma instância do laravel instalada em seu equipamento.
    Recomendo Laragon -> quick install, ou se tiver acesso a vagrant, instalar o homestead.

-   Copiar arquivo .env.example para .env no diretório raiz do projeto.

-   Criar tabela mysql de acordo com nome proposto no .env no diretório:

    `DB_DATABASE=prodigious`
    `DB_USERNAME=root`
    `DB_PASSWORD= `

-   Rodar o comando `composer install` - instalar dependecencias
-   Rodar o comando `npm install && npm run dev` -instalar parte visual
-   Rodar o comando `php artisan migrate` -migrar tabelas criadas
-   Rodar o comando `php artisan storage:link` -criar symlink da pasta storage.

-   Navegar até o url do projeto criado;

-   Criar um login e desfrutar do projeto.

OBS: Não foi possível criar uma 'box' do projeto com vagrant ou docker pelo
desafio de download do box e upload do mesmo. Onde estou a internet está super
devagar, por isso optei por seguir com o projeto sem o "box".

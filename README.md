# Configurar e executar o projeto

Este é um guia passo a passo para configurar e executar este projeto. Siga as instruções abaixo para preparar o ambiente e iniciar a aplicação.

### Passos Iniciais

- Clonar o Repositório: Comece clonando este repositório para o seu ambiente local.
- Copiar o Arquivo .env.example: Duplique o arquivo .env.example e renomeie a cópia para .env.
- Configurar a Database: No arquivo .env, certifique-se de fornecer o caminho absoluto para a sua database no parâmetro DB_DATABASE.

### Instalação e Configuração

- Instalar Dependências do Composer e NPM:

    Navegue até o diretório do projeto e execute os seguintes comandos para instalar as dependências do Composer e do NPM

    ```
    composer install
    ```
    ```
    npm install
    ```

- Rodar Migrations:
  
    Para criar as tabelas necessárias no banco de dados, execute o seguinte comando:

    ```
    php artisan migrate
    ```

### Executando o Projeto
- Rodar a Aplicação:
  
    Inicie o servidor local para executar a aplicação utilizando o seguinte comando:

    ```
    php artisan serve
    ```

- Compilar Front-end:

    Para compilar o front-end, execute:
    
    ```
    npm run dev
    ```




LCG TESTE
=======================

Introdução
------------
Está é uma simples aplicação teste para empresa LCG IT SERVICE baseada em Zend Framework e Twitter Bootstrap.

Instalação
------------

Usando Git e Composer
----------------------------
A forma recomendada para obter uma cópia de trabalho do projeto é clonar o repositório 
e usar `Composer` para instalar as dependências usando o comando `composer install`:

    cd Lcg.Rempel/
    git clone git://github.com/RempelOliveira/Lcg.Rempel.git

    cd Lcg.Rempel

    php composer.phar self-update
    php composer.phar install

Download direto e Composer
----------------------------
Caso seja necessário, apenas efetue o download diretamente do repositório através da seguinte url:

	https://github.com/RempelOliveira/Lcg.Rempel/archive/master.zip

    php composer.phar self-update
    php composer.phar install

É comum em uma instalção windows do Composer, que o mesmo também esteja instalado no explorer do windows,
sendo assim, existe a facilidade de apenas clicar com o botão direito do mouse sobre o arquivo `composer.json`, selecionar a opção `User Composer Here` e passar o comando:

	composer install

Isto basta para que as dependências do projeto sejam baixadas.

Importante
----------------
Crie um diretório nomeado Lcg.Rempel na raiz do seu localhost e copie os arquivos na raiz deste mesmo diretório.
Caso haja necessidade de alterar a localização da aplicação, é necessário que seja alterada a constante `BaseUrl` inserida no arquivo `index.php`, localizado no seguinte diretório:

	public/

Banco de dados
----------------

Uma cópia atualizada do banco de dados `database.sql` encontra-se no seguinte diretório:

	data/database/

Basta criar o banco de dados nomeando-o `lcg.rempel` e importar para o mesmo,
o arquivo localizado no diretório descrito acima.

Para alterar os dados de acesso ao banco de dados, basta alterar as configurações localizadas no arquivo `local.php`,
localizado no seguinte diretório:

	config/autoload/
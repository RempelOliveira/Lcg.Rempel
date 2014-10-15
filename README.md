LCG TESTE
=======================

Introdu��o
------------
Est� � uma simples aplica��o teste para empresa LCG IT SERVICE baseada em Zend Framework e Twitter Bootstrap.

Instala��o
------------

Usando Git e Composer
----------------------------
A forma recomendada para obter uma c�pia de trabalho do projeto � clonar o reposit�rio 
e usar `Composer` para instalar as depend�ncias usando o comando `composer install`:

    cd Lcg.Rempel/
    git clone git://github.com/RempelOliveira/Lcg.Rempel.git

    cd Lcg.Rempel

    php composer.phar self-update
    php composer.phar install

Download direto e Composer
----------------------------
Caso seja necess�rio, apenas efetue o download diretamente do reposit�rio atrav�s da seguinte url:

	https://github.com/RempelOliveira/Lcg.Rempel/archive/master.zip

    php composer.phar self-update
    php composer.phar install

Importante
----------------
Crie um diret�rio nomeado Lcg.Rempel na raiz do seu localhost e copie os arquivos na raiz deste mesmo diret�rio.
Caso haja necessidade de alterar a localiza��o da aplica��o, � necess�rio que sejam alteradas a constante `BaseUrl` inserida no arquivo `index.php`, localizado no seguinte diret�rio:

	public/

Banco de dados
----------------

Uma c�pia atualizada do banco de dados `database.sql` encontra-se no seguinte diret�rio:

	data/database/

Basta criar o banco de dados nomeando-o `lcg.rempel` e importar para o mesmo,
o arquivo localizado no diret�rio descrito acima.

Para alterar os dados de acesso ao banco de dados, basta alterar as configura��es localizadas no arquivo `local.php`,
localizado no seguinte diret�rio:

	config/autoload/
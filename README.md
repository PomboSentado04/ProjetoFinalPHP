# ProjetoFinalPHP
Repositório remoto do 'Projeto Prático Final' de 'Desenvolvimento de Sistemas'.

Essa é uma aplicação em php que visa deixar os usuários fazerem login e cadastro, podendo registrar as informações das músicas que eles preferirem assim que logados.

Requisitos para rodar a aplicação:

- O usuário deve ter em sua máquina o XAMPP instalado com os módulos do Apache e do MySQL.

- Ao instalar o XAMPP com esses dois módulos o usuário deve clonar esse repositorio na pasta htdocs dentro do diratório do XAMP.

- Para clonar o diretório é preciso ter o Git instalado na máquina. Você apenas tem que abrir qualquer terminal na pasta htdocs e digitar 'git clone (diretório)'.

- Com o diretório clonado na pasta htdocs você abre o painel de controle do XAMPP e inicia Apache e o MySQL.

- Após isso vá em seu navegador e cole esse link na sua URL: http://localhost/phpmyadmin

- Na pagina inicial você clica na opção 'Importar', escolhe o arquivo 'projetofinalphp.sql' na pasta sql presente no diretório da aplicação e clique em 'Importar' no final da página.

- Com isso a base de dados necessária para rodar a aplicação está criada em sua máquina.

- Ainda com o Apache e o MySQL ligados no painel de controle do XAMPP, cole este link em sua URL:
http://localhost/ProjetoFinalPHP/

- Verifique se o diretório da aplicação está dentro da pasta htdocs e que você acesse o diretório da aplicação para rodar ela.

Ao rodar a aplicação:

- Você verá uma tela de login, mas primeiro precisa se cadastrar.

- Ao se cadastrar você será direcionado para a pagina de login, onde poderá logar com suas informações já cadastradas.

- Ao logar você será direcionado para a sua página pessoal para cadastrar e listar as suas músicas.

- Ao clicar em Logout você será deslogado e enviado para a página de login, onde poderá logar com suas informações já cadastradas.

- Na página pessoal você poderá cadastrar as suas músicas.

- Ao cadastra-las você terá acesso a uma listagegem delas.

- Na listagem as informações de cada música serão exibidas para você.

- Também poderá excluir e editar seus registros de músicas.

- Ao escolher editar a sua música você será direcionado para uma página de edição.

- Na página de edição você muda as informações que quer trocar e deixa aquelas que você quer que permaneçam.

Cadastros Teste:

- Usuário: João
- Email: joao09@gmail.com
- Senha: pao1234

- Usuário: Mario
- Email: mario76@gmail.com
- Senha: abelha456

- Usuário: MarioBrega 
- Email: mario76@gmail.com (email repetido, teste deve falhar)
- Senha: abelha456

Registros de Músicas Teste:

- nome: Bohemian Rhapsody
- artista: Queen
- album: A Night at the Opera
- duracao: 05:55
- genero: Rock

- nome: Imagine
- artista: John Lennon
- album: "" (vazio)
- duracao: 03:04
- genero: Pop Rock

- nome: This Is a Very Long Song Name That Tests the Fifty Character Limit
- artista: An Extremely Long Band Name Testing the Character Limit Too
- album: Testing Album Name Limits in the System
- duracao: 10:30
- genero: Progressive Experimental Rock

- nome: 4'33"
- artista: John Cage
- album: 4'33"
- duracao: 00:00 (música experimental sem som)
- genero: Experimental

- nome: São João, Xote e Miudinho
- artista: Luiz Gonzaga
- album: Forró do Rei
- duracao: 03:45
- genero: Forró


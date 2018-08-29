# CRUD em codeigniter com jquery e upload de video 

Desenvolvimento de um pequeno projeto de sistema para upload de videos, com cadastro de autores,categorias. Desenvolvimento com codeigniter utilizando o banco de dados em MySQL.
**NOTA:** É muito bem vindo melhorias e bugs encontrados. :)

### Telas

![Telas](https://media.giphy.com/media/pGjobs37RDoYXKG0gB/giphy.gif)

### Estrutura de pastas

Breve explicação sobre os principais pontos de organização do projeto.

```
application/                    
  config/
  controllers/               
    dashboard/               
      Categorias.php                  --- Controller responsavel por cadastrar,alterar,excluir e editar as categorias.
      Usuarios.php                    --- Controller responsavel por cadastrar,alterar,excluir e editar os usuarios.
      Videos.php                      --- Controller responsavel por cadastrar,alterar,excluir e editar os videos inseridos.
      Home.php     	              --- Controller default que redireciona paga o index do back-end e responsavel por todos os métodos de login.
   models/
     M_categorias.php                 --- Model responsavel por realizar as consultar/inserções/remoção das categorias.
     M_index.php 		      --- Model responsavel por realizar as consultar de número de linhas da tabela para o index.
     M_login.php        	      --- Model responsavel por autenticação do login de acesso.
     M_usuarios.php                   --- Model responsavel por realizar as consultar/inserções/remoção das dos usuarios e trocar a senha.
     M_videos.php        	      --- Model responsavel por realizar as consultar/inserções/remoção dos videos.
   views/
     back-end/
       includes/
         footer.php 		      --- Parte inferior contendo codigos html e scripts do template. 
	 header.php 		      --- Parte superior contendo codigos html e folhas de estilo do template.
	 menu-top.php 	              --- Barra superior com menu dropdown
	 menu.php 		      --- Menu lateral
       modais/	
         categorias/
       	   editar_categorias.php      --- Formulario de edição de categoria
           excluir_categorias.php     --- Confirmação de exclusão e codigo JS enviando via URL o id.
           modal_categorias.php	      --- Formulario para cadastro de categoria
         usuarios/
           modal_cadastrar.php	      --- Formulario de cadastro de usuario
           modal_editar.php           --- Formulario de edição de usuario
           modal_excluir.php          --- Confirmação de exclusão e codigo JS enviando via URL o id.
         videos/
           excluir_videos.php         --- Confirmação de exclusão e codigo JS enviando via URL o id.
           visualizar_videos.php      --- Visualização do video selecionado
         modal_novasenha.php          --- Formulario para edição de senha cadastrada e codigo JS para validação
assets/
  back/
    dist/
      css/
        proprio.css		      --- Folha de estilo com configurações do layout back-end
	site.min.css		      --- Folha de estilo default do template BOOTFLAT-ADMIN
      js/
	proprio.js		      --- Funcionalidades em jquery
  front/			      --- Arquivos do front-end
upload/			              --- Pasta responsavel para armazenar os videos inseridos

```

### NOTA

Projeto em desenvolvimento.


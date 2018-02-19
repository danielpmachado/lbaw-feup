# A1: Technology Store - Tech4U

Este projeto tem como objetivo desenvolver software de forma a implementar uma loja online. Esta loja irá comercializar tecnologia, nomeadamente computadores, componentes, periféricos, armazenamento, etc.

A tecnologia é uma área em constante atualização, como tal, todos os anos se verifica um crescimento neste mercado. Para fazer face a este aumento de procura pretende-se desenvolver um sistema que consiga dar resposta às mais variadas necessidades dos utilizadores. Apesar de já existirem diversas plataformas que comercializam componentes tecnológicos, este projeto promete marcar a diferença através de funcionalidades inovadoras e de um design simples e estético, proporcionando uma experiência ao utilizador muito superior àquela que se consegue obter atualmente.

Nesta plataforma, o cliente, além de poder adquirir um produto, pode consultar o seu histórico de compras e a sua lista de produtos favoritos. Além disso, os produtos possuem uma pontuação atribuída pelos utilizadores, assim como comentários ao produto, o que permite ao cliente reunir mais informação antes de adquirir o produto. Ainda vai ser implementado um sistema de recomendações assim como um sistema de pesquisa. Por fim, irá existir uma plataforma completamente inovadora que permite criar um computador inteiramente personalizado: escolher processador, motherboard, placa gráfica, etc.

Os utilizadores estão separados em grupos diferentes com permissões distintas. O grupo de utilizadores “Administrador” tem autorização para adicionar/remover/editar produtos, apagar comentários e bloquear utilizadores por má conduta. Também deve existir o grupo de utilizadores “Utilizador” que têm acesso às informações dos produtos e podem dar a sua opinião sobre esse, tendo ainda a possibilidade de efetuar transações e alterar as suas informações pessoais.

# A2: Actors and User stories
 
## 1. Actors
 
Os atores e as respetivas descrições da Loja de Tecnologia Online podem ser encontrados respectivamente na Figura 1 e Tabela 1.

![alt text](https://github.com/dolfander/LBAW-53/blob/master/images%20README/actors%20diagram.png)

| Identificador   |      Descrição      |  Exemplo |
|:----------:|:-------------|:------:|
|Utilizador |  Utilizador genérico, tem acesso à informação pública tal como os diversos produtos disponíveis para venda. | n/a |
|Visitante |  Utilizador não autenticado, pode registar-se ou autenticar-se no sistema. | n/a |
|Cliente |  Utilizador autenticado, pode consultar os produtos disponíveis para venda, gerir a sua lista de favoritos, proceder à compra de um produto, consultar o seu histórico de compras, comentar e pontuar um artigo do catálogo.| phruta2000 |
|Administrador |  Utilizador autenticado, que pode alterar os preços dos produtos, adicionar novos artigos ao inventário e gerir os comentários dos utilizadores | admin |
|API’s | API externas que podem ser usadas para efetuar o pagamento da compra. | PayPal |

Tabela 1: Descrição dos Atores

## 2. User Stories
 
Para a Loja de Tecnologia Online devem ser considerados os casos de utilização apresentados de seguida.
 
### 2.1. Visitante

| Identificador   |Nome| Prioridade|      Descrição      |
|:----------:|:-------------:|:-------------:|:------|
|US01 | Log in  | alta |Como Visitante, eu quero autenticar-me no sistema, para poder aceder a informação privilegiada. |
|US02 | Registar  | alta |Como Visitante, eu quero registar-me, para poder autenticar-me no sistema.  |
 
Tabela 2: Casos de Utilização do Visitante


### 2.2. Utilizador

| Identificador   |Nome| Prioridade|      Descrição      |
|:----------:|:-------------:|:-------------:|:------|
|US11 | Pesquisa  | alta |Como Utilizador, eu quero consultar toda a informação pública que se encontra no site, de forma a estar informado acerca dos seus conteúdo.|
|US12 | Pontuações  | alta |Como Utilizador, eu quero ter acesso às pontuações e comentários de cada produto, de forma a informar-se sobre as opiniões de outras pessoas.  |
|US13 | Página Inicial  | alta |Como Utilizador, eu quero aceder à página inicial, para poder ver um breve descrição do site.  |
|US14 | Página “Sobre”  | média |Como Utilizador, eu quero aceder à página “sobre”, para ver um descrição completa do site.  |
|US15 | Catálogo  | alta |Como Utilizador, eu quero aceder à página do catálogo, para poder ver os produtos disponíveis . |
|US16 | FAQ  | média  |Como Utilizador, eu quero aceder à página de FAQ, para poder ver as dúvidas frequentes. |
|US17 | Contactos  | alta |Como Utilizador, eu quero aceder à página de contactos, para que possa ver todos os contactos.  |

Tabela 3: Casos de Utilização do Utilizador
 
### 2.3. Cliente
 
### 2.4. Administrador
 
## A1. Anexos: Requisitos suplementares
 
Este anexo contém as regras de negócio, os requisitos técnicos e outras restrições.
 
### A1.1. Regras de negócio

As regras de negócio definem ou restringem um aspecto do negócio, com a intenção de modelar a estrutura do negócio ou influenciar o seu comportamento.
 
### A1.2. Requisitos técnicos

Os requisitos técnicos estão preocupados com os aspectos técnicos que o sistema deve atender, como problemas relacionados ao desempenho, problemas de confiabilidade e problemas de disponibilidade.
 
### A1.3. Restrições

Não existem restrições que nos limitem em termos de liberdade na procura de uma solução.
 
***

**GROUP1753, 11/02/2018**

>Daniel Pereira Machado - up201506365@fe.up.pt

>David Rafael Silva Falcão - up201506571@fe.up.pt 

>José Pedro Dias de Almeida Machado - up201504779@fe.up.pt

>Sofia Catarina Bahamonde Alves - up201504570@fe.up.pt


# A1: Technology Store - Tech4U

Este projeto tem como objetivo desenvolver software de forma a implementar uma loja online. Esta loja irá comercializar tecnologia, nomeadamente computadores, componentes, periféricos, armazenamento, etc.

A tecnologia é uma área em constante atualização, como tal, todos os anos se verifica um crescimento neste mercado. Para fazer face a este aumento de procura pretende-se desenvolver um sistema que consiga dar resposta às mais variadas necessidades dos utilizadores. Apesar de já existirem diversas plataformas que comercializam componentes tecnológicos, este projeto promete marcar a diferença através de funcionalidades inovadoras e de um design simples e estético, proporcionando uma experiência ao utilizador muito superior àquela que se consegue obter atualmente.

Nesta plataforma, o cliente, além de poder adquirir um produto, pode consultar o seu histórico de compras e a sua lista de produtos favoritos. Além disso, os produtos possuem uma pontuação atribuída pelos utilizadores, assim como comentários ao produto, o que permite ao cliente reunir mais informação antes de adquirir o produto. Ainda vai ser implementado um sistema de recomendações assim como um sistema de pesquisa. Por fim, irá existir uma plataforma completamente inovadora que permite criar um computador inteiramente personalizado: escolher processador, motherboard, placa gráfica, etc.

Os utilizadores estão separados em grupos diferentes com permissões distintas. O grupo de utilizadores “Administrador” tem autorização para adicionar/remover/editar produtos. Editar um produto tanto pode ser relativo ao stock como às suas especificações. Este grupo também pode ter acesso ao histórico de compras dos clientes e remover um comentário ou mesmo ainda remover um utilizador no caso de má conduta. Também deve existir o grupo de utilizadores “Utilizador” que têm acesso às informações dos produtos assim como aos comentários e classificações feitos por outras pessoas, tendo ainda a possibilidade de efetuar transações e alterar as suas informações pessoais. Além disso podem ainda aceder à página “sobre”, às FAQ e aos contactos. Os utilizadores do grupo “Visitantes” estão limitados a fazer login ou a registar-se no site. Por último, os utilizadores do tipo “Cliente” podem efetuar um conjunto de operações relacionadas com a compra em si. Têm autorização para adicionar e remover itens do carrinho e dos favoritos, para comentar e avaliar um produto, e ainda para aceder ao seu perfil e histórico de compras.

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

| Identificador   |Nome| Prioridade|      Descrição      |
|:----------:|:-------------:|:-------------:|:------|
|US21 | Adicionar Carrinho  | alta |Como Cliente, eu quero adicionar um item ao carrinho de compras, de forma a poder proceder à sua compra.|
|US22 | Remover Carrinho  | alta |Como Cliente, eu quero remover um item do carrinho de compras, de forma a retirá-lo da lista de itens que pretendo adquirir.|
|US23 | Comprar  | alta |Como Cliente, eu quero comprar um item, de forma a que possa adquiri-lo.|
|US24 | Adicionar Favoritos  | alta |Como Cliente, eu quero adicionar um item à minha lista de favoritos, de forma a poder vê-lo mais tarde.|
|US25 | Remover Fovoritos  | alta |Como Cliente, eu quero adicionar um item à minha lista de favoritos, de forma a poder esquecê-lo.|
|US26 | Comentar  | alta |Como Cliente, eu quero submeter um comentário, de forma a partilhar a minha opinião.|
|US27 | Avaliar | alta |Como Cliente, eu quero avaliar um artigo, de forma a poder classificá-lo.|
|US28 | Perfil   | alta |Como Cliente, eu quero mudar a minha informação, de forma a mantê-la atualizada.|
|US29 | Histórico  | alta |Como cliente, e quero consultar meu histórico, de forma a saber que artigos comprei.|

 Tabela 4: Casos de Utilização do Cliente
### 2.4. Administrador

| Identificador   |Nome| Prioridade|      Descrição      |
|:----------:|:-------------:|:-------------:|:------|
|US31 | Remover produto  | alta |Como Administrador, eu quero poder remover um produto da loja caso este tenha sido descontinuado ou substituído por um outro.|
|US32 | Stock de um produto  | alta |Como Administrador, eu quero poder alterar a quantidade disponível de um dado artigo.|
|US33 | Especificações de um produto  | média |Como Administrador, eu quero poder alterar a informação disponível acerca de um dado artigo.|
|US34 | Histórico  | média  |Como Administrador, eu quero ter acesso ao histórico de compras dos clientes.|
|US35 | Banir utilizador | baixa |Como Administrador, eu quero poder banir um cliente por má conduta.|
|US36 | Remover comentário  | baixa |Como Administrador, eu quero poder remover um dado comentário num produto feito por um utilizador.|
 
 Tabela 5: Casos de Utilização do Administrador

## A1. Anexos: Requisitos suplementares
 
Este anexo contém as regras de negócio, os requisitos técnicos e outras restrições.
 
### A1.1. Regras de negócio

As regras de negócio definem ou restringem um aspecto do negócio, com a intenção de modelar a estrutura do negócio ou influenciar o seu comportamento.
 
| Identificador   | Nome |     Descrição      |
|:----------:|:-------------:|:------|
|BR01 | Validação da compra |Uma compra só deve ser validada após os dados relativos ao pagamento serem verificados|
|BR02 | Notificação de disponibilidade |Quando um produto não se encontra imediatamente disponível o cliente pode ativar as notificações para ser avisado quando o produto estiver novamente disponível|

Tabela 7: Regras do negócio
 
### A1.2. Requisitos técnicos

Os requisitos técnicos estão preocupados com os aspectos técnicos que o sistema deve atender, como problemas relacionados ao desempenho, problemas de confiabilidade e problemas de disponibilidade.

| Identificador   | Nome |     Descrição      |
|:----------:|:-------------:|:------|
|TR01 | Disponibilidade |A disponibilidade do sistema deve rondar os 100 por cento por cada período de 24 horas|
|TR02 | Acessibilidade |O sistema deve garantir que todos conseguem aceder às páginas independentemente do browser ou do dispositivo utilizado|
|TR03 | Usabilidade |O sistema deve ser simples e intuitivo de usar|
|TR04 | Desempenho |O sistema deve ser potenciado para dar sempre resposta no menor tempo possível|
|TR05 | Aplicação Web |O sistema deve ser implementado como um aplicativo Web com páginas dinâmicas|
|TR06 | Portabilidade |O sistema do lado do servidor deve funcionar em várias plataformas|
|TR07 | Base de Dados |O sistema de gerenciamento de base de dados a usar será SQLite |
|TR08 | Segurança |O sistema deve proteger as informações do acesso não autorizado através do uso de um sistema de autenticação e verificação|
|TR09 | Robustez |O sistema deve estar preparado para lidar com erros durante a execução|
|TR10 | Escalabilidade |O sistema deve estar preparado para lidar com o crescimento do número de usuários e suas ações|
|TR11 | Ética |O sistema deve respeitar a privacidade dos utilizadores, isto é, apenas os próprios devem ter acesso à sua password e informações pessoais|

Tabela 7: Requisitos técnicos

### A1.3. Restrições

Não existem restrições que nos limitem em termos de liberdade na procura de uma solução.
 
***

**GROUP1753, 11/02/2018**

>Daniel Pereira Machado - up201506365@fe.up.pt

>David Rafael Silva Falcão - up201506571@fe.up.pt 

>José Pedro Dias de Almeida Machado - up201504779@fe.up.pt

>Sofia Catarina Bahamonde Alves - up201504570@fe.up.pt


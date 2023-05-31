# Projeto_UnidadeXaxim
O sistema é uma plataforma de gerenciamento de chamados e controle de usuários, projetado para fornecer um ambiente eficiente de suporte. Com uma interface intuitiva e diversos recursos, o sistema oferece aos administradores a capacidade de monitorar chamados registrados, solicitações de peças e gerenciar usuários de forma simplificada.

Com menus organizados, como Painel Principal, Usuários, Alterar Registros, Painel do Usuário, Solicitar Material, Chamados Off, Dashboard, Relatórios e Informações, o sistema permite fácil navegação entre as funcionalidades. Além disso, painéis informativos fornecem estatísticas atualizadas sobre os chamados registrados, facilitando o acompanhamento e análise.

Os usuários têm acesso a um painel personalizado, onde podem visualizar e interagir com os chamados abertos e registrados. A solicitação de material é simplificada, garantindo que todas as informações necessárias sejam preenchidas para uma eficiente abertura do pedido.

Com recursos de relatórios avançados, é possível obter insights valiosos sobre os chamados abertos, registros por requisição, estações e ocorrências. Além disso, o sistema possui um inventário detalhado das máquinas da central, com informações relevantes, como softwares instalados e espaço livre nos HDs.

Em resumo, nosso sistema oferece uma solução completa para o gerenciamento de chamados, controle de usuários e monitoramento de inventário. Com uma interface amigável e recursos avançados, ele proporciona uma experiência eficiente e produtiva, tornando-se uma ferramenta indispensável para equipes de suporte.

Principais funções:

Painel Principal:
O painel principal possui 3 menus no card-header: "Registrar", "Registros" e "Peças". Esses menus permitem que o administrador do sistema monitore os chamados registrados, solicitações de peças e também faça o lançamento de novos chamados. No menu "Registrar", o administrador e o suporte poderão lançar os registros e monitorar os registros abertos em uma tabela ao lado.

Usuários:
Esse menu oferece o controle de usuários, exibindo-os em uma tabela com informações como senha, login, nome completo e tipo de usuário. Há opções para inserir novos usuários, buscar usuários por ID e modificá-los no banco de dados, além de uma opção para excluir usuários.

Alterar Registros:
Ao clicar no botão "Buscar", é possível visualizar a ID de todos os chamados registrados para efetuar modificações usando JavaScript.

Painel do Usuário:
Os chamados abertos são exibidos na cor verde, enquanto os chamados registrados ficam em roxo. Ao clicar no ícone de fechar, se o chamado estiver registrado, uma mensagem informa que ele já está registrado. Se for um chamado aberto, um modal é aberto com todas as informações do chamado para permitir o encerramento do registro. A tabela utiliza o DataTable e possui um botão para exportar todo o conteúdo em CSV.

Solicitar Material:
Ao clicar no botão "Solicitar", um modal é aberto com todas as informações necessárias para a abertura do pedido de material. O pedido só é realizado se todas as informações forem preenchidas corretamente; caso contrário, uma mensagem de erro é exibida. Há um botão de atualização em JavaScript para atualizar a tabela, junto com um ícone de atualização. O DataTable é utilizado na tabela.

Chamados Off:
Essa funcionalidade foi criada para que o suporte 2 possa incluir informações de registros. Há um botão de busca em JavaScript que busca as informações do PHP e as preenche no formulário. Se as informações não forem incluídas corretamente, uma mensagem de erro é exibida.

Dashboard:
O dashboard inclui 4 cards no topo com as seguintes informações: quantidade de chamados no dia atual, quantidade de chamados registrados no mês atual, total de chamados registrados até o momento e a informação que possui o maior número de ocorrências. Abaixo, há um gráfico de pizza com todas as ocorrências até o momento, um gráfico de linha mostrando a quantidade de chamados registrados por mês e um gráfico que apresenta todas as informações das ocorrências (motivos).

Relatórios:
O menu de relatórios oferece 4 tipos de busca: chamados abertos no dia (com a opção de escolher outros dias também), relatórios pela requisição (REQ), relatórios por estação (usando a informação da coluna "et") e relatórios por ocorrência (coluna "motivo"). Essas buscas direcionam para outra página onde são apresentados os valores dos relatórios, com a possibilidade de extração de arquivos em Excel para análises.

Informações:
Existem 2 menus: "Inventário" e "Histórico de Informações de Mudanças". O inventário foi criado para monitorar as máquinas da central, exibindo informações como nomes lógicos, números de série, posição na central, memória, processadores, tamanho dos HDs e a porcentagem de espaço livre nos HDs. Ao clicar no nome lógico, um modal é aberto com todas as informações dos softwares instalados, incluindo nome e versões do sistema, incluindo atualizações do Windows. Essa função utiliza JavaScript para obter informações de dois bancos de dados através de arrays associativas, a fim de incluir as informações dos dois bancos de dados na tabela. Há um DataTable e um botão para exportar o arquivo em Excel para análises e relatórios.

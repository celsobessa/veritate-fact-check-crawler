# Veritate - Fact Check Crawler

> Looking for the english version? [Click here](README.md).

Um plugin do tipo "nos bastidores" para gerenciar o [Índice Público](https://veritatecrawler.wowperations.com.br/) de checagens de fatos da Iniciativa Veritate, **um projeto um projeto experimental sem fins lucrativos de agregador/buscador reunindo artigos diversas agências de <strong>checagem de fatos</strong>**.

## Sobre a Iniciativa Veritate

Idealizado pelo desenvolvedor <a href="https://www.celsobessa.com.br">Celso Bessa</a>, com suporte em hospedagem e infra-estrutura: <a href="https://www.wowperations.com.br">WoWPerations</a>, a Iniciativa Veritate tem como missão fortalecer o jornalismo de checagem de fatos no Brasil:

- Incentivar o consumo de jornalismo de qualidade
- Estimular o compartilhamento de checagens de fatos
- Instigar o senso crítico a respeito de notícias falsas (_Fake News_)
- Fornecer ferramentas que ajude as pessoas a tomar decisões baseadas em informações verídicas
- Pesquisar, experimentar, desenvolver e divulgar tecnologias, algoritmos, padrões de design e melhores práticas para jornalismo digital.


> Para mais informações sobre a Iniciativa Veritate ou para sugerir novos veículos de checagem de fatos, por favor, verifique o **[repositório oficial do projeto no Github](https://github.com/celsobessa/veritate)**. Para reportar bugs ou questões sobre este plugin e sobre a API do Índice Público, por favor, verique o [repositório do plugin](https://github.com/celsobessa/veritate-fact-check-crawler). Para solicitar a remoção de conteúos ou outras dúvidas, por favor, envie mensagem para o email veritate{arroba}wowperations[ponto]com[ponto]br

## Perguntas Frequentes (FAQ - Frequently Asked Questions)

### Quais os veículos que são indexados por esta iniciativa

Neste momento, apenas [Agência Lupa](http://piaui.folha.uol.com.br/lupa/), [Agência Pública](https://apublica.org/checagem/) and [Aos Fatos](https://aosfatos.org).

### Como posso sugerir um veículo ou ter meu veículo adicionado?

Se você quer sugerir algum veículo para ser indexado, abra uma "issue" [no repositório oficial](https://github.com/celsobessa/veritate/issues) com as seguintes informações:

- Nome do Veículo
- URL do veículo
- URL da seção de checagens (se diferente da URL principal)
- Sua relação com o veículo (leitor, autor, editor, publisher, etc)

Você também pode enviar um email para o endereço mencionado acima com as mesmas informações. Nós vamos indexar apenas sites respeitados ou com bom jornalismo, de acordo com nosso conselho editorial. Temos o plano de criar um guia editorial, mas ainda não sabemos quando ele será publicado.

No aspecto tecnológico, nós priorizamos sites usando WordPress e que usem o markup LD+JSON para checagem de fatos. Nosso rastreador e nosso algoritmo privilegia sites rápidos, acessíveis e seguros (usando HTTPS), especialmente os acessíveis facilmente por telefone ou leitores de tela. E se você der permissão expressão para apresentarmos pequenos trechos (entre 140 e 280 caracteres) do artigo de seu site, o conteúdo será rastreado mais rapidamente e terá prioridade ao apresentarmos os resultados

Como regra geral, **se for jornalismo bem feito, tiver boa nota no Google Page Speed Insights** e passar no teste da WCAG2.0, está bom para nós.

### Esta API tira tráfego dos sites de checagem?

Não! Ao contrário, os objetivos são gerar MAIS tráfego e melhorar ao alcance destes sites.

### Esta API atrapalha o SEO deste sites?

Não. Como é uma API, apenas deixa os dados acessíveis, mas não conta como conteúdo para buscadores

### Esta iniciativa tem um objetivo comercial?

Não, é um experimento sem fins lucrativos. Temos a ideia de fazer algo maior, mas provavelmente como fundação, ONG ou algo assim, sem fim lucrativo e transparente.

## Histórico de versões / Changelog

Veja o arquivo [CHANGELOG.md](CHANGELOG.md) no [repositório do plugin no Github](https://github.com/celsobessa/veritate-fact-check-crawler).

## Como ajudar o projeto

Com código, redação de textos e ajuda e wiki, etc. Mais informações em breve.

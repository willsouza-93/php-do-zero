# PHP do zero

Material de estudo sobre PHP e Laravel, organizado em aulas progressivas e práticas.

## Progresso das aulas

### Aula 1 — Fundamentos de PHP e cálculo de transações

Nesta aula, praticamos:

- execução de arquivos PHP pelo terminal com `php nome-do-arquivo.php`;
- variáveis;
- arrays indexados e associativos;
- `foreach`;
- condições com `if`;
- funções;
- parâmetros e tipos de retorno;
- acumuladores com `+=`;
- uso de `count()`;
- formatação de valores com `number_format()`;
- separação entre cálculo, formatação e exibição;
- leitura mental do fluxo antes da execução.

O exercício principal calculou receitas, despesas, saldo e quantidade de transações.

### Aula 2 — Tipos, argumentos, retornos e `strict_types`

Nesta aula, aprofundamos:

- tipos escalares como `string`, `int`, `float` e `bool`;
- contratos de funções: entrada, processamento e saída;
- argumentos posicionais e argumentos nomeados;
- comportamento de `declare(strict_types=1)`;
- diferença entre valores numéricos e strings numéricas;
- captura de erros de tipo com `try`, `catch` e `TypeError`;
- diferença entre calcular um valor e efetivamente armazená-lo ou exibi-lo;
- classificação de saldo como positivo, negativo ou zerado.

Também discutimos como valores hardcoded podem, no futuro, ser substituídos por entradas do usuário, formulários ou dados recebidos por API.

### Aula 3 — Primeira classe PHP e objetos

Nesta aula, transformamos transações antes representadas por arrays em objetos da classe `Transaction`.

Aprendemos:

- diferença entre classe e objeto;
- criação de objetos com `new`;
- funcionamento do método especial `__construct`;
- propriedades tipadas;
- uso de `$this` para representar o objeto atual;
- uso do operador `->` para acessar propriedades e métodos;
- criação de vários objetos a partir da mesma classe;
- uso de um array contendo objetos;
- mudança da estrutura interna sem alterar o comportamento externo do programa.

A classe `Transaction` passou a concentrar os dados de cada transação: descrição, tipo e valor.

### Aula 4 — Comportamento dentro dos objetos

Nesta aula, começamos a mover regras relacionadas à transação para dentro da própria classe.

Aprendemos:

- diferença entre um objeto guardar dados e também oferecer comportamentos;
- criação dos métodos `isIncome()` e `isExpense()`;
- métodos que retornam valores booleanos;
- uso dos métodos do objeto dentro de funções de cálculo;
- redução do conhecimento externo sobre os valores internos de `type`;
- uso do operador ternário para exibir resultados simples;
- princípio de manter próximas as regras e os dados aos quais elas pertencem.

Com isso, as funções de cálculo deixaram de comparar diretamente strings como `income` e `expense` e passaram a perguntar ao objeto qual é o seu tipo.

### Aula 5 — Encapsulamento e acesso controlado aos dados

Nesta aula, protegemos o estado interno da classe `Transaction` e definimos como outras partes do programa podem acessar seus dados.

Aprendemos:

- diferença entre propriedades `public` e `private`;
- encapsulamento;
- promoção de propriedades no construtor;
- criação de métodos getters;
- uso de `getDescription()` e `getAmount()`;
- manutenção dos métodos de comportamento `isIncome()` e `isExpense()`;
- substituição do acesso direto às propriedades por chamadas de métodos;
- importância de controlar como o estado de um objeto é lido e alterado.

O exercício passou a listar cada transação por meio dos getters e continuou calculando receitas, despesas, saldo e quantidade total.

### Aula 6 — Validação e proteção do estado do objeto

Nesta aula, a classe `Transaction` passou a impedir a criação de objetos com dados inválidos.

Aprendemos:

- validação dentro do construtor;
- normalização de texto com `trim()`;
- rejeição de descrições vazias;
- validação dos tipos permitidos com `in_array()` e comparação estrita;
- rejeição de valores menores ou iguais a zero;
- lançamento de exceções com `InvalidArgumentException`;
- importância de garantir que um objeto já nasça em um estado válido.

A regra de negócio deixou de depender apenas de quem cria a transação: a própria classe passou a proteger seus dados.

### Aula 7 — Enum para representar tipos válidos

Nesta aula, substituímos as strings `income` e `expense` pelo enum `TransactionType`.

Aprendemos:

- criação de um `enum` apoiado por `string`;
- declaração dos casos `Income` e `Expense`;
- uso do enum como tipo de uma propriedade e de um parâmetro;
- comparação entre casos de enum;
- retorno de enum pelo getter `getType()`;
- criação do método `label()` com `match`;
- possibilidade de converter dados externos com `TransactionType::tryFrom()`;
- prevenção de valores inválidos por meio do sistema de tipos.

Com o enum, deixamos de depender de strings soltas e passamos a representar explicitamente todas as opções aceitas pelo domínio.

### Aula 8 — Promoção de propriedades e imutabilidade com `readonly`

Nesta aula, refinamos a implementação da classe `Transaction` e tornamos seu estado imutável após a construção.

Aprendemos:

- revisão da promoção de propriedades no construtor;
- uso de propriedades `readonly`;
- diferença entre declarar uma propriedade separadamente e promovê-la;
- motivo para manter `description` fora da promoção, permitindo aplicar `trim()` antes da atribuição final;
- promoção de `type` e `amount` diretamente no construtor;
- manutenção das validações e dos comportamentos já existentes;
- proteção contra alterações posteriores no estado da transação.

A classe passou a deixar explícito que uma transação, depois de criada e validada, não pode ter seus dados substituídos.

### Aula 9 — Separação de arquivos e carregamento manual

Nesta aula, dividimos o exemplo em arquivos com responsabilidades distintas.

Aprendemos:

- separação do enum em `TransactionType.php`;
- separação da classe em `Transaction.php`;
- uso de `index.php` como ponto de entrada e execução;
- carregamento de arquivos com `require_once`;
- uso de `__DIR__` para construir caminhos seguros;
- importância da ordem de carregamento: enum, classe e execução;
- diferença geral entre `require`, `require_once`, `include` e `include_once`;
- uso de `declare(strict_types=1)` em cada arquivo PHP;
- início da organização do código em componentes menores.

O comportamento do programa permaneceu o mesmo, mas a estrutura passou a preparar o projeto para formas mais automáticas de carregamento de classes.

### Aula 10 — Namespaces e organização do domínio

Nesta aula, demos um passo além na organização dos arquivos e passamos a identificar explicitamente as classes do domínio com namespaces.

Aprendemos:

- declaração de namespace com `namespace App\Domain;`;
- importação de classes e enums com `use`;
- diferença entre o nome simples de uma classe e seu nome completo dentro de um namespace;
- organização do código em `src/Domain`;
- uso de `use InvalidArgumentException` dentro da classe de domínio;
- manutenção do carregamento manual com `require_once` enquanto os tipos passam a ter namespace;
- extração das validações para métodos privados como `validateDescription()` e `validateAmount()`;
- separação entre o fluxo principal da aplicação, em `index.php`, e as regras internas da entidade `Transaction`.

O programa continuou produzindo os mesmos cálculos e listando as transações, mas a estrutura passou a representar melhor a ideia de domínio e a preparar o caminho para um carregamento de classes mais automatizado no futuro.

## Estrutura atual

```text
php-do-zero/
├── aula-01.php
├── aula-02.php
├── aula-03.php
├── aula-04.php
├── aula-05.php
├── aula-06.php
├── aula-07.php
├── aula-08.php
├── aula-09/
│   ├── index.php
│   ├── Transaction.php
│   └── TransactionType.php
├── aula-10/
│   ├── index.php
│   └── src/
│       └── Domain/
│           ├── Transaction.php
│           └── TransactionType.php
└── README.md
```

## Executando os exercícios

As aulas 1 a 8 podem ser executadas separadamente pelo terminal:

```bash
php aula-01.php
```

Substitua o número do arquivo pela aula desejada.

As Aulas 9 e 10 possuem um ponto de entrada dentro de suas próprias pastas:

```bash
php aula-09/index.php
php aula-10/index.php
```

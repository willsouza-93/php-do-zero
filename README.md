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

## Estrutura atual

```text
php-do-zero/
├── aula-01.php
├── aula-02.php
├── aula-03.php
├── aula-04.php
├── aula-05.php
└── README.md
```

## Executando os exercícios

Cada aula pode ser executada separadamente pelo terminal:

```bash
php aula-01.php
```

Substitua o número do arquivo pela aula desejada.

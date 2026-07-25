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

## Estrutura atual

```text
php-do-zero/
├── aula-01.php
├── aula-02.php
├── aula-03.php
└── README.md
```

> O arquivo `aula-03.php` pode ainda não estar presente na branch principal enquanto estiver sendo trabalhado localmente.

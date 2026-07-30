<?php

declare(strict_types=1);

class Transaction
{
    public string $description;
    public string $type;
    public float $amount;

    public function __construct(
        string $description,
        string $type,
        float $amount,
    ) {
        $this->description = $description;
        $this->type = $type;
        $this->amount = $amount;
    }

    public function isIncome(): bool
    {
        return $this->type === 'income';
    }

    public function isExpense(): bool
    {
        return $this->type === 'expense';
    }
}

$transactions = [
    new Transaction(
        description: 'Pagamento do cliente',
        type: 'income',
        amount: 3500.00,
    ),
    new Transaction(
        description: 'Internet',
        type: 'expense',
        amount: 120.00,
    ),
    new Transaction(
        description: 'Ferramentas de desenvolvimento',
        type: 'expense',
        amount: 80.00,
    ),
    new Transaction(
        description: 'Manutenção do computador',
        type: 'expense',
        amount: 250.00,
    ),
];

function calculateIncome(array $transactions): float
{
    $income = 0.0;

    foreach ($transactions as $transaction) {
        if ($transaction->isIncome()) {
            $income += $transaction->amount;
        }
    }

    return $income;
}

function calculateExpenses(array $transactions): float
{
    $expenses = 0.0;

    foreach ($transactions as $transaction) {
        if ($transaction->isExpense()) {
            $expenses += $transaction->amount;
        }
    }

    return $expenses;
}

function formatMoney(float $amount): string
{
    return 'R$ ' . number_format(
        num: $amount,
        decimals: 2,
        decimal_separator: ',',
        thousands_separator: '.',
    );
}

echo ($transactions[0]->isIncome() ? 'É receita' : 'Não é receita') . PHP_EOL;
echo ($transactions[1]->isExpense() ? 'É despesa' : 'Não é despesa') . PHP_EOL;

$income = calculateIncome($transactions);
$expenses = calculateExpenses($transactions);
$balance = $income - $expenses;

echo 'Receitas: ' . formatMoney($income) . PHP_EOL;
echo 'Despesas: ' . formatMoney($expenses) . PHP_EOL;
echo 'Saldo: ' . formatMoney($balance) . PHP_EOL;
echo 'Quantidade de transações: ' . count($transactions) . PHP_EOL;

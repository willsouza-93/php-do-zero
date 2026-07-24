<?php

declare(strict_types=1);

$transactions = [
    [
        'description' => 'Pagamento do cliente',
        'type' => 'income',
        'amount' => 3500.00,
    ],
    [
        'description' => 'Internet',
        'type' => 'expense',
        'amount' => 120.00,
    ],
    [
        'description' => 'Ferramentas de desenvolvimento',
        'type' => 'expense',
        'amount' => 80.00,
    ],
    [
        'description' => 'Manutenção do computador',
        'type' => 'expense',
        'amount' => 250.00,
    ],
];

function calculateIncome(array $transactions): float
{
    $income = 0.0;

    foreach ($transactions as $transaction) {
        if ($transaction['type'] === 'income') {
            $income += $transaction['amount'];
        }
    }

    return $income;
}

function calculateExpenses(array $transactions): float
{
    $expenses = 0.0;

    foreach ($transactions as $transaction) {
        if ($transaction['type'] === 'expense') {
            $expenses += $transaction['amount'];
        }
    }

    return $expenses;
}

function formatCurrency(float $value): string
{
    return number_format(
        num: $value,
        decimals: 2,
        decimal_separator: ',',
        thousands_separator: '.',
    );
}

$income = calculateIncome($transactions);
$expenses = calculateExpenses($transactions);
$balance = $income - $expenses;
$transactionCount = count($transactions);

echo 'Receitas: R$ ' . formatCurrency($income) . PHP_EOL;
echo 'Despesas: R$ ' . formatCurrency($expenses) . PHP_EOL;
echo 'Saldo: R$ ' . formatCurrency($balance) . PHP_EOL;
echo 'Quantidade de transações: ' . $transactionCount . PHP_EOL;

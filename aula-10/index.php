<?php

declare(strict_types=1);

use App\Domain\Transaction;
use App\Domain\TransactionType;

require_once __DIR__ . '/src/Domain/TransactionType.php';
require_once __DIR__ . '/src/Domain/Transaction.php';

function calculateIncome(array $transactions): float
{
    $income = 0.0;

    foreach ($transactions as $transaction) {
        if ($transaction->isIncome()) {
            $income += $transaction->getAmount();
        }
    }

    return $income;
}

function calculateExpenses(array $transactions): float
{
    $expenses = 0.0;

    foreach ($transactions as $transaction) {
        if ($transaction->isExpense()) {
            $expenses += $transaction->getAmount();
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


$transactions = [
    new Transaction(
        description: 'Pagamento do cliente',
        type: TransactionType::Income,
        amount: 3500.00,
    ),
    new Transaction(
        description: 'Internet',
        type: TransactionType::Expense,
        amount: 120.00,
    ),
    new Transaction(
        description: 'Ferramentas de desenvolvimento',
        type: TransactionType::Expense,
        amount: 80.00,
    ),
    new Transaction(
        description: 'Manutenção do computador',
        type: TransactionType::Expense,
        amount: 250.00,
    ),
];

$income = calculateIncome($transactions);
$expenses = calculateExpenses($transactions);
$balance = $income - $expenses;

echo 'Receitas: ' . formatMoney($income) . PHP_EOL;
echo 'Despesas: ' . formatMoney($expenses) . PHP_EOL;
echo 'Saldo: ' . formatMoney($balance) . PHP_EOL;
echo 'Quantidade de transações: ' . count($transactions) . PHP_EOL;

echo PHP_EOL;
echo 'Lista de transações:' . PHP_EOL;

foreach ($transactions as $transaction) {
    echo $transaction->getDescription()
        . ' — '
        . $transaction->getType()->label()
        . ' — '
        . formatMoney($transaction->getAmount())
        . PHP_EOL;
}

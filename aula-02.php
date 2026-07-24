<?php

declare(strict_types=1);

function calculateBalance(float $income, float $expenses): float
{
    return $income - $expenses;
}

function getBalanceStatus(float $balance): string
{
    if ($balance > 0) {
        return 'positivo';
    } elseif ($balance < 0) {
        return 'negativo';
    } else {
        return 'zerado';
    }
}

function formatMoney(float $amount): string
{
    return number_format(
        num: $amount,
        decimals: 2,
        decimal_separator: ',',
        thousands_separator: '.',
    );
}

$income = 3500.00;
$expenses = 4000.00;

$balance = calculateBalance(income: $income, expenses: $expenses);
$balanceStatus = getBalanceStatus($balance);

echo 'Saldo: R$ ' . formatMoney($balance) . PHP_EOL;
echo 'Situação: saldo ' . $balanceStatus . PHP_EOL;

try {
    calculateBalance(
        income: 3500.00,
        expenses: 450.00,
    );
} catch (TypeError $error) {
    echo 'Erro de tipo capturado.' . PHP_EOL;
    echo $error->getMessage() . PHP_EOL;
}
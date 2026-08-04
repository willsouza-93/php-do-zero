<?php

declare(strict_types=1);

class Transaction
{
    public function __construct(
        private string $description,
        private string $type,
        private float $amount,
    ) {
        $this->description = trim($this->description);

        if ($this->description === '') {
            throw new InvalidArgumentException('A descrição da transação não pode ficar vazia.');
        }

        if (!in_array($this->type, ['income', 'expense'], true)) {
            throw new InvalidArgumentException('O tipo da transação deve ser "income" ou "expense".');
        }

        if ($this->amount <= 0) {
            throw new InvalidArgumentException('O valor da transação deve ser maior que zero.');
        }
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAmount(): float
    {
        return $this->amount;
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

foreach ($transactions as $transaction) {
    echo $transaction->getDescription()
        . ': '
        . formatMoney($transaction->getAmount())
        . PHP_EOL;
}

$income = calculateIncome($transactions);
$expenses = calculateExpenses($transactions);
$balance = $income - $expenses;

echo 'Receitas: ' . formatMoney($income) . PHP_EOL;
echo 'Despesas: ' . formatMoney($expenses) . PHP_EOL;
echo 'Saldo: ' . formatMoney($balance) . PHP_EOL;
echo 'Quantidade de transações: ' . count($transactions) . PHP_EOL;

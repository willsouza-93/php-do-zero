<?php

declare(strict_types=1);

enum TransactionType: string
{
    case Income = 'income';
    case Expense = 'expense';

    public function label(): string
    {
        return match ($this) {
            self::Income => 'Receita',
            self::Expense => 'Despesa',
        };
    }
}

class Transaction
{
    public function __construct(
        private string $description,
        private TransactionType $type,
        private float $amount,
    ) {
        $this->description = trim($this->description);

        if ($this->description === '') {
            throw new InvalidArgumentException('A descrição da transação não pode ficar vazia.');
        }

        if ($this->amount <= 0) {
            throw new InvalidArgumentException('O valor da transação deve ser maior que zero.');
        }
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getType(): TransactionType
    {
        return $this->type;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function isIncome(): bool
    {
        return $this->type === TransactionType::Income;
    }

    public function isExpense(): bool
    {
        return $this->type === TransactionType::Expense;
    }
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
    echo $transaction->getType()->label()
        . ' — '
        . $transaction->getDescription()
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

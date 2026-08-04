<?php

declare(strict_types=1);

class Transaction
{
    private readonly string $description;

    public function __construct(
        string $description,
        private readonly TransactionType $type,
        private readonly float $amount,
    ) {
        $description = trim($description);

        if ($description === '') {
            throw new InvalidArgumentException('A descrição da transação não pode ficar vazia.');
        }

        if ($this->amount <= 0) {
            throw new InvalidArgumentException('O valor da transação deve ser maior que zero.');
        }

        $this->description = $description;
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

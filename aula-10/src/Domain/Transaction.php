<?php

declare(strict_types=1);

namespace App\Domain;

use InvalidArgumentException;

class Transaction
{
    private readonly string $description;

    public function __construct(
        string $description,
        private readonly TransactionType $type,
        private readonly float $amount,
    ) {
        $description = trim($description);

        $this->validateDescription($description);
        $this->validateAmount($this->amount);

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

    private function validateDescription(string $description): void
    {
        if ($description === '') {
            throw new InvalidArgumentException(
                'A descrição da transação é obrigatória.'
            );
        }
    }

    private function validateAmount(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException(
                'O valor da transação deve ser maior que zero.'
            );
        }
    }
}
<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $income = Transaction::incomes()->sum('amount');
        $expense = Transaction::expenses()->sum('amount');

        return [
            Stat::make('Total Pemasukan', 'Rp. ' . number_format($income, 0, ',', '.')),
            Stat::make('Total Pengeluaran', 'Rp. ' . number_format($expense, 0, ',', '.')),
            Stat::make('Selisih', 'Rp. ' . number_format($income - $expense, 0, ',', '.')),
        ];
    }
}

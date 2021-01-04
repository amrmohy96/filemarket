<?php


namespace App\Http\ViewComposers;


use Carbon\Carbon;
use Illuminate\View\View;

class ProfileStatsComposer
{
    public function compose(View $view)
    {
        $user = auth()->user();
        $files = $user->files()->finished();
        $sales = $user->sales;
        $lifeTimeSale = $user->sales->sum('sales_price');
        $now = Carbon::now();
        $m = $user->sales()->whereBetween('created_at', [
            $now->startOfMonth(),
            $now->copy()->endOfMonth()
        ])->get()->sum('sales_price');
        $view->with([
            'fileCount' => $files->count(),
            'saleCount' => $sales->count(),
            'lifeTimeSale' => $lifeTimeSale,
            'salesThisMonth' => $m
        ]);
    }
}

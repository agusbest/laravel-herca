<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Marketing;
use Illuminate\Support\Facades\DB;

class SalesCommissionController extends Controller
{
    public function calculateCommission(Request $request)
    {
        $commissionRates = [
            ['min' => 0, 'max' => 100000000, 'rate' => 0],
            ['min' => 100000000, 'max' => 200000000, 'rate' => 2.5],
            ['min' => 200000000, 'max' => 500000000, 'rate' => 5],
            ['min' => 500000000, 'max' => PHP_INT_MAX, 'rate' => 10],
        ];

        $commissions = Sale::select(
            'marketings.name as marketing',
            DB::raw("DATE_FORMAT(sales.date, '%M') as month"),
            DB::raw('SUM(sales.grand_total) as omzet')
        )
        ->join('marketings', 'sales.marketing_id', '=', 'marketings.id')
        ->groupBy('month', 'marketings.name')
        ->orderBy('month', 'desc')
        ->get()
        ->map(function ($row) use ($commissionRates) {
            foreach ($commissionRates as $rate) {
                if ($row->omzet >= $rate['min'] && $row->omzet < $rate['max']) {
                    $row->komisi_persen = $rate['rate'];
                    $row->komisi_nominal = ($row->omzet * $rate['rate']) / 100;
                    break;
                }
            }
            return $row;
        });

        // return response()->json($commissions);
        return view('index', compact('commissions'));
    }


    //  private function getCommissionRate($omzet)
    // {
    //     if ($omzet >= 500000000) {
    //         return 10;
    //     } elseif ($omzet >= 200000000) {
    //         return 5;
    //     } elseif ($omzet >= 100000000) {
    //         return 2.5;
    //     }
    //     return 0;
    // }
}

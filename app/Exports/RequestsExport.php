<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Request as Demande;

class RequestsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $requests = Demande::orderBy('created_at', 'desc')->get();

        $data = $requests->map(function ($request) {
            return [
                'Prénom' => (string) $request->fname,
                'Téléphone' => (string) $request->phone,
                'Motorisation' => optional($request->car->motorisation)->name,
                'Generation' => optional($request->car->generation)->name,
                'Modèle' => optional(optional($request->car->motorisation)->modele)->name,
                'Marque' => optional(optional(optional($request->car->motorisation)->modele)->mark)->name,
                'Problème' => optional($request->problem)->name,
                'La date' => $request->created_at
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'Prénom',
            'Téléphone',
            'Motorisation',
            'Generation',
            'Modèle',
            'Marque',
            'Problème',
            'La date'
        ];
    }
    
}

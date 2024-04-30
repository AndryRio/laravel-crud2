<?php

namespace App\Exports;

use App\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ContactExport implements FromCollection, WithColumnFormatting, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::get(['name', 'number', 'created_at']);
    }

    public function map($contact): array
    {
        return [
            $contact->name,
            $contact->number,
            Date::dateTimeToExcel($contact->created_at),
            Date::dateTimeToExcel($contact->created_at)
        ];
    }



    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'D' => NumberFormat::FORMAT_DATE_TIME4,
        ];
    }

}

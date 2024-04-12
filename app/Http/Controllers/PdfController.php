<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function __invoke(Client $record)
    {
        return Pdf::loadView('/site/pdf/customer', ['record' => $record])
            ->download($record->name . '.pdf');
    }
}

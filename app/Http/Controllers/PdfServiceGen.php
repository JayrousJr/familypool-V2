<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfServiceGen extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ServiceRequest $record)
    {
        return Pdf::loadView('/site/pdf/customer', ['record' => $record])
            ->download($record->name . '.pdf');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Equipment;

class EquipmentReportController extends Controller
{
    //
    public function index(Request $request) {
        $equipments = $this -> getReportData($request);
        return view('reports.index', $equipments);
    }

    public function exportPdf(Request $request) {
        // SOMETHING
        $data = $this -> getReportData($request);

        $pdf = Pdf::loadView('reports.pdf', $data)
             -> setPaper('a4', 'portrait');

        // return $pdf -> stream('lalaravel.pdf');
        return $pdf -> download('lalaravel.pdf');
    }

    private function getReportData(Request $request): array {
        $query = Equipment::query();

        if ($request -> filled('availability')) {
            if ($request -> availability == 'available') {
                $query -> where('availability', '1');
            }
            else {
                $query -> where('availability', '0');
            }
        }

        if ($request -> filled('category')) {
            if ($request -> category == 'paddles') {
                $query -> where('Category', 'paddles');
            }
            elseif ($request -> category == 'balls') {
                $query -> where('Category', 'balls');
            }
            elseif ($request -> category == 'nets') {
                $query -> where('Category', 'nets');
            }
            elseif ($request -> category == 'accessories') {
                $query -> where('Category', 'accessories');
            }
        }

        if ($request -> filled('price')) {
            if ($request -> price == 'asc') {
                $query -> orderBy('UnitPrice');
            }
            else {
                $query -> orderByDesc('UnitPrice');
            }
        }

        $equipments = $query -> latest()
                             -> get();

        return [
            'equipments'     => $equipments,
            'user'           => $user_id = $request -> user() -> name,
            'availability'   => $request -> availability,
            'category'       => $request -> category,
            'price'          => $request -> price,
            'equipmentCount' => $equipments -> count()
        ];
    }
} 

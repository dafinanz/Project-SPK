<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\PerbandinganAlternatif;

class MatriksValueController extends Controller
{
    public function index(Request $request)
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();

        $cari = $request->cari;
        $alternatifs = alternatif::where('nama', 'LIKE', "%" . $cari . "%")
            // ->orWhere('kode', 'LIKE', "%" . $cari . "%")
            // ->orWhere('nkk', 'LIKE', "%" . $cari . "%")
            ->orderBy('id', 'asc')->paginate(100);

        return view('matriks_value.matriks_value', compact('kriterias', 'alternatifs'));
    }

    public function updateSelectionWithValues(Request $request)
    {
        $action = $request->input('action');
        
        // Memisahkan action berdasarkan '_'
        $actionParts = explode('_', $action);

        // Memastikan actionParts memiliki dua elemen
        if (count($actionParts) === 2) {
            list($actionType, $alternatifId) = $actionParts;

            $alternatif = Alternatif::findOrFail($alternatifId);

            if ($actionType === 'add') {
                $alternatif->is_selected = true;
                $this->updateBobotValues($alternatif, $request->input('bobot'));
            } elseif ($actionType === 'remove') {
                $alternatif->is_selected = false;
            }

            $alternatif->save();

            return redirect()->route('matriks_value.index')->with('success', 'Alternatif updated successfully.');
        }

        return redirect()->route('matriks_value.index')->with('error', 'Invalid action.');
    }

    private function updateBobotValues($alternatif, $bobotValues)
    {
        if (!empty($bobotValues[$alternatif->kode])) {
            foreach ($bobotValues[$alternatif->kode] as $kriteriaKode => $value) {
                PerbandinganAlternatif::updateOrCreate(
                    [
                        'alternatif_id' => $alternatif->id,
                        'kriteria_id' => $kriteriaKode,
                    ],
                    [
                        'bobot' => $value,
                    ]
                );
            }
        }
    }
}

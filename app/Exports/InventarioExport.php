<?php

namespace App\Exports;

use App\Models\Inventario;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InventarioExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
                    //ruta del archivo a exportar
        return view('inventario/excel',[
            'inventario' => Inventario::all()
        ]);
    }
}

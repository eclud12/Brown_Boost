<?php

namespace App\Exports;

use App\Models\VentasModel;
use App\Models\ProductosModel;
use App\Models\UsuariosModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\BeforeWriting;

use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class VentasRealizadasExport implements FromView, ShouldAutoSize, WithTitle, WithEvents
{
    use RegistersEventListeners;
    
    public function view(): View
    {
        return view('export.venta_realizadas', [
            'ventas' => VentasModel::all(),
            'productos' => ProductosModel::all(),
            'usuarios' => UsuariosModel::all()
        ]);
    }

    public function title(): string
    {
        return 'Mis ventas realizadas';
    }

    public static function beforeWriting(BeforeWriting $event){
        $spreadsheet = $event->getWriter()->getDelegate();
        $spreadsheet->getSecurity()->setLockWindows(true);
        $spreadsheet->getSecurity()->setLockStructure(true);
        $spreadsheet->getSecurity()->setLockRevision(true);
        $spreadsheet->getSecurity()->setWorkbookPassword('123');
        $spreadsheet->getSecurity()->setRevisionsPassword('123');
    }

    public static function afterSheet(AfterSheet $event){
        $protection = $event->getSheet()->getDelegate()->getProtection();

       $protection->setPassword('PhpSpreadsheet');
       $protection->setSheet(true);
       $protection->setSort(true);
       $protection->setInsertRows(true);
       $protection->setFormatCells(true);
    }
}

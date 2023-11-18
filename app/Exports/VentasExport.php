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

use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;



class VentasExport implements FromView, ShouldAutoSize, WithTitle, WithEvents, WithDrawings
{
    use RegistersEventListeners;
    
    public function view(): View
    {
        return view('export.ventas_gen', [
            'ventas' => VentasModel::all(),
            'productos' => ProductosModel::all(),
            'usuarios' => UsuariosModel::all()
        ]);
    }

    public function title(): string
    {
        return 'Mis ventas';
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



    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/logo1.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('G1');

        return $drawing;
    }
}

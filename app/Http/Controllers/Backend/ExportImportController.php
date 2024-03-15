<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PropertyExport;
use App\Http\Controllers\Controller;
use App\Imports\PropertyImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportImportController extends Controller
{
    // ImportProperty
    public function ImportProperty(){
        return view("backend.csv.import_property");
    }
    // Export
    public function Export(){
        return Excel::download(new PropertyExport, 'property.xlsx');
    }
    // Import
    public function Import(Request $request){
        Excel::import(new PropertyImport, $request->file('import_file'));

        $notification = array(
            'message'=> 'Property Imported Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}

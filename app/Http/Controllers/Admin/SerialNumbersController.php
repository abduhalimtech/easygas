<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SerialNumbersImport;
use App\Models\ExcelFiles;

class SerialNumbersController extends Controller
{
    public function create()
    {
        $files = ExcelFiles::all(); // Fetch all files to display in the view
        return view('vendor.voyager.serial-numbers', compact('files'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'excel_file' => 'required|file|mimes:xlsx',
        ]);
        Excel::import(new SerialNumbersImport, $request->file('excel_file'));

        // Get the original name of the uploaded file
        $originalName = $request->file('excel_file')->getClientOriginalName();

        // Store the original name in the ExcelFiles model
        $excelFile = new ExcelFiles();
        $excelFile->name = $originalName;
        $excelFile->save();

        // Import the data from the Excel file

        return redirect()->back()->with('success', 'Ma`lumot muvaffaqqiyatli saqlandi!');
    }
}

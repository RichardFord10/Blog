<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use League\Csv\Statement;
use Illuminate\Support\Facades\Log;


class CsvController extends Controller
{
    public function index()
    {
        return view('csv.upload');
    }

    
    public function upload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);
    
        // Store the uploaded file
        $path = $request->file('csv_file')->store('csv_files');

        // Load the CSV file
        $csv = Reader::createFromPath(Storage::path($path), 'r');
        $csv->setHeaderOffset(0); 
        $headers = $csv->getHeader();
        $data = [];
        $records = $csv->getRecords(); 

        foreach ($records as $record) {
            $data[] = $record;
        }

        // Redirect back with a success message or to another view
        return view('csv.upload', ['data'=>$data, 'headers'=>$headers]);
    }
    

    public function download()
    {
        // Handle CSV download logic here
    }
}


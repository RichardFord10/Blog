<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader; 

class ImportCsvData extends Command
{
    protected $signature = 'import:csv';
    protected $description = 'Import CSV data into the movies table';

    public function handle()
    {
        $path = storage_path('app/csv/imdb.csv');

        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();

        foreach ($records as $record) {
            DB::table('imdbs')->insert([
                'rank' => $record['Rank'],
                'title' => $record['Title'],
                'genre' => $record['Genre'],
                'description' => $record['Description'],
                'director' => $record['Director'],
                'actors' => $record['Actors'],
                'year' => $record['Year'],
                'runtime_minutes' => $record['Runtime (Minutes)'],
                'rating' => $record['Rating'],
                'votes' => $record['Votes'],
                'revenue_millions' => $record['Revenue (Millions)'] === '' ? null : $record['Revenue (Millions)'],
                'metascore' => $record['Metascore'] === '' ? null : $record['Metascore'],
            ]);
        }

        $this->info('CSV data imported successfully.');
    }
}

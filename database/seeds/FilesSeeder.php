<?php

use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class FilesSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // By default, the seeder will process all XLSX files in /database/seeds/*.xlsx (relative to Laravel project base path)
        $this->worksheetTableMapping = ['companies' => 'companies', 'drug_categories' => 'drug_categories'];

        $this->truncate = false;

        parent::run();
    }
}

<?php

use Illuminate\Database\Seeder;
use PHPUnit\Util\Filesystem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            CreateAccountingTypesSeeder::class,
            BalanceTableSeeder::class,
            InvoiceTypesTableSeeder::class,
            FilesSeeder::class
        ]);
    }
}

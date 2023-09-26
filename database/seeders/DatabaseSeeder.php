<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\Disposal;
use App\Models\Employee;
use App\Models\Insurance;
use App\Models\Medicine;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderedDrug;
use App\Models\Prescription;
use App\Models\PrescriptionDrug;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Prescription::factory(20)->create();
        Insurance::factory(20)->create();
        Customer::factory(20)->create();
        PrescriptionDrug::factory(20)->create();
        Order::factory(20)->create();
        Bill::factory(20)->create();
        OrderedDrug::factory(20)->create();
        Employee::factory(20)->create();
        Notification::factory(20)->create();
        Medicine::factory(20)->create();
        Disposal::factory(20)->create();
    }
}

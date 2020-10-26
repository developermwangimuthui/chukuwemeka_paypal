<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\OrderStatusDescription as OrderDescription;
class OrderStatusDescription extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderdescriptions = [
            'Pending',
            'Completed',
            'Cancel',
            'Return',
         ];


         foreach ($orderdescriptions as $orderdescription) {
            OrderDescription::create(['orders_status_name' => $orderdescription,'id'=>Str::uuid()->toString() ]);
         }
    }
}

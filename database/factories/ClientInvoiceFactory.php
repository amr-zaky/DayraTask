<?php



namespace Database\Factories;

use App\Models\ClientInvoice;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientInvoiceFactory extends Factory
{

    protected $model = ClientInvoice::class;

    public function definition()
    {
        return [
            'client_id' =>Client::all()->random()->id,
            'amount'=>$this->faker->numberBetween([100,99999]),
            'invoice_due_date'=>$this->faker->date(now()),
        ];
    }
}

<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory,Notifiable;

    protected $table = 'clients';
    protected $guarded = ["id"];
    protected $fillable = [
        'full_name',
        'email',
        'mobile'
    ];


    public function clientsInvoice()
    {
       return  $this->hasMany(ClientInvoice::class)->orderBy('invoice_due_date');
    }
}

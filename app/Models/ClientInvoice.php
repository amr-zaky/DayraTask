<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ClientInvoice extends Model
{
    use HasFactory ,Notifiable;

    protected $table = 'clients_invoice';
    protected $guarded = ["id"];
    protected $fillable = [
       'client_id',
        'amount',
        'invoice_due_date',
    ];
    protected $hidden=[
        'created_at',
        'updated_at',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

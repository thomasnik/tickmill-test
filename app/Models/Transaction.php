<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Client;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'transaction_date', 'amount'];

     // Relationship: Each transaction belongs to a client
    public function client()
    {
        return $this->belongsTo(Client::class); // The foreign key is client_id
    }
}

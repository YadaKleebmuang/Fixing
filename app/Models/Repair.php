<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $primaryKey = 'id'; // Specify the primary key

    use HasFactory;
    // Specify the table associated with the model
    protected $table = 'repairs';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'customer_id',
        'repair_detail',
        'employee_id',
        'product_id',
        'status_id',
    ];
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
    public function status()
    {
        return $this->belongsTo(User::class, 'status_id');
    }

}

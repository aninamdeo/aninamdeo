<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'budget', 'subject', 'message', 'status', 'ip_address'];
    public function scopeNew($query) { return $query->where('status', 'new'); }
}

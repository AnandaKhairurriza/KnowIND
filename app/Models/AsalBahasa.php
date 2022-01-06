<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AsalBahasa extends Model
{
    protected $table = 'ki_asalbahasa';

    protected $primaryKey = 'asalbahasa_id';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['asalbahasa_nama', 'created_at', 'updated_at'];

    public $timestamps = false;

    public function kosakata()
    {
    	return $this->hasMany('App\Models\Kosakata', 'asalbahasa_id');
    }

    public function kalimat()
    {
    	return $this->hasMany('App\Models\Kalimat', 'asalbahasa_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Kalimat extends Model
{
    protected $table = 'ki_kalimat';

    protected $primaryKey = 'kalimat_id';

    protected $dates = ['kalimat_tgl', 'rev_tgl', 'created_at', 'updated_at'];

    protected $fillable = ['member_id', 'PIC', 'kalimat_no', 'kalimat_tgl', 'kalimat_member', 'asalbahasa_id', 'bahasa_daerah', 'bahasa_indonesia', 'bahasa_inggris', 'rev_no', 'rev_tgl', 'created_at', 'updated_at'];

    public $timestamps = false;

    public function member()
    {
    	return $this->belongsTo('App\Models\Member', 'member_id');
    }

    public function asalbahasa()
    {
    	return $this->belongsTo('App\Models\AsalBahasa', 'asalbahasa_id');
    }
}

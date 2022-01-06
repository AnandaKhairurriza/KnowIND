<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Artikel extends Model
{

	public $timestamps = false;

    protected $table = 'ki_artikel';

    protected $primaryKey = 'artikel_id';

    protected $dates = ['artikel_tgl', 'rev_tgl', 'created_at', 'updated_at'];

    protected $fillable = ['member_id', 'PIC', 'artikel_no', 'artikel_tgl', 'artikel_member', 'artikel_judul', 'artikel_image', 'artikel_desc', 'rev_no', 'rev_tgl', 'created_at', 'updated_at'];

    public function member()
    {
    	return $this->belongsTo('App\Models\Member', 'member_id');
    }
}

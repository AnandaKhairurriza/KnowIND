<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{

	public $timestamps = false;

    protected $table = 'ki_event';

    protected $primaryKey = 'event_id';

    protected $dates = ['event_mulai', 'event_selesai', 'rev_tgl', 'created_at', 'updated_at'];

    protected $fillable = ['member_id', 'PIC', 'event_no', 'event_mulai', 'event_selesai', 'event_nama', 'event_image', 'event_desc', 'rev_no', 'rev_tgl', 'created_at', 'updated_at'];

    public function member()
    {
    	return $this->belongsTo('App\Models\Member', 'member_id');
    }
}

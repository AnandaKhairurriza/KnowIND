<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Hotel extends Model
{

	public $timestamps = false;

    protected $table = 'ki_hotel';

    protected $primaryKey = 'hotel_id';

    protected $dates = ['hotel_tgl', 'rev_tgl', 'created_at', 'updated_at'];

    protected $fillable = ['member_id', 'PIC', 'hotel_no', 'hotel_tgl', 'hotel_member', 'hotel_nama', 'hotel_image', 'hotel_desc', 'hotel_alamat', 'rev_no', 'rev_tgl', 'created_at', 'updated_at'];

    public function member()
    {
    	return $this->belongsTo('App\Models\Member', 'member_id');
    }
}

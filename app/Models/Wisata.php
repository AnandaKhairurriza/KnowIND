<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Wisata extends Model
{

	public $timestamps = false;

    protected $table = 'ki_wisata';

    protected $primaryKey = 'wisata_id';

    protected $dates = ['wisata_tgl', 'rev_tgl', 'created_at', 'updated_at'];

    protected $fillable = ['member_id', 'PIC', 'wisata_no', 'wisata_tgl', 'wisata_member', 'wisata_nama', 'wisata_image', 'wisata_desc', 'wisata_alamat', 'rev_no', 'rev_tgl', 'created_at', 'updated_at'];

    public function member()
    {
    	return $this->belongsTo('App\Models\Member', 'member_id');
    }
}

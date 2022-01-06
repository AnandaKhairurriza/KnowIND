<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Update extends Model
{

	public $timestamps = false;

    protected $table = 'ki_update';

    protected $primaryKey = 'update_id';

    protected $dates = ['created_at', 'updated_at', 'update_tgl'];

    protected $fillable = ['member_id', 'PIC', 'version_no', 'update_no', 'update_tgl', 'update_area', 'update_nama', 'update_image', 'update_desc', 'created_at', 'updated_at'];

    public function member()
    {
    	return $this->belongsTo('App\Models\Member', 'member_id');
    }
}

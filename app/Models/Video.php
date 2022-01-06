<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    protected $table = 'ki_video';

    protected $primaryKey = 'video_id';

    protected $dates = ['video_tgl', 'rev_tgl', 'created_at', 'updated_at'];

    protected $fillable = ['member_id', 'PIC', 'video_no', 'video_tgl', 'video_member', 'video_judul', 'video_image', 'video_desc', 'video_link', 'rev_no', 'rev_tgl', 'created_at', 'updated_at'];

    public $timestamps = false;

    public function member()
    {
    	return $this->belongsTo('App\Models\Member', 'member_id');
    }
}

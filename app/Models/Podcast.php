<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Podcast extends Model
{
    protected $table = 'ki_podcast';

    protected $primaryKey = 'podcast_id';

    protected $dates = ['podcast_tgl', 'rev_tgl', 'created_at', 'updated_at'];

    protected $fillable = ['member_id', 'PIC', 'podcast_no', 'podcast_tgl', 'podcast_member', 'podcast_judul', 'podcast_image', 'podcast_desc', 'podcast_link', 'rev_no', 'rev_tgl', 'created_at', 'updated_at'];

    public $timestamps = false;

    public function member()
    {
    	return $this->belongsTo('App\Models\Member', 'member_id');
    }
}

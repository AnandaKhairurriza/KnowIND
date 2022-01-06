<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Member extends Model
{
    protected $table = 'ki_member';

    protected $primaryKey = 'member_id';

    protected $fillable = [ 'name', 'email', 'password', 'google_id'];

    public function artikel()
    {
    	return $this->hasMany('App\Models\Artikel', 'member_id');
    }

    public function podcast()
    {
    	return $this->hasMany('App\Models\Podcast', 'member_id');
    }

    public function video()
    {
    	return $this->hasMany('App\Models\Video', 'member_id');
    }

    public function event()
    {
        return $this->hasMany('App\Models\Event', 'member_id');
    }

    public function kosakata()
    {
            return $this->hasMany('App\Models\Kosakata', 'member_id');
    }

    public function kalimat()
    {
            return $this->hasMany('App\Models\Kalimat', 'member_id');
    }

    public function updates()
    {
            return $this->hasMany('App\Models\Update', 'member_id');
    }

    public function hotel()
    {
            return $this->hasMany('App\Models\Hotel', 'member_id');
    }

    public function wisata()
    {
            return $this->hasMany('App\Models\Wisata', 'member_id');
    }
}

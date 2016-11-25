<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $fillable = ['member_id', 'phone', 'address', 'qualification', 'notes'];
	
    public function Member()
    {
        return $this->BelongsTo("App\Member");
    }

}

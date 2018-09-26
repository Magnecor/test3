<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

protected $fillable = ['title', 'sort'];

  public function servers()
  {
      return $this->hasMany('App\Server', 'games_id');
  }



    //
}

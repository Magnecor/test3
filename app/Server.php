<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    //
protected $fillable = ['title', 'sort', 'games_id'];

public function game()
{
  return $this->belongsTo('App\Game', 'games_id', 'id'); 
}

}

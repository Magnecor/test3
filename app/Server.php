<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    //
protected $fillable = ['title', 'sort', 'games_id', 'nick',
  'vk_300',
  'vk_500',
  'vk_3000',
  'vk1_300',
  'vk2_500',
  'vk3_3000',
  'vk_3001',
  'vk_5001',
  'vk_30001',
  'vk1_3001',
  'vk2_5001',
  'vk3_30001'];

public function game()
{
  return $this->belongsTo('App\Game', 'games_id', 'id');
}

}

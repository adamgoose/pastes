<?php

class Paste extends Eloquent {

  protected $fillable = ['paste', 'fork_of'];

  public function fork()
  {
    return $this->belongsTo('Paste', 'fork_of');
  }

}
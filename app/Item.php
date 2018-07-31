<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Item extends Model
{
    use \Venturecraft\Revisionable\RevisionableTrait;

    protected $fillable = ['name', 'key'];
    protected $revisionCreationsEnabled = true;
}

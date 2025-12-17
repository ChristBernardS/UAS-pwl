<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBase extends Model
{
    protected $table = 'knowledgebase';
    protected $fillable = ['question', 'answer', 'image'];
}

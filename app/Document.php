<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public $appends = ['document_view_url'];

    public function archive()
    {
        return $this->morphTo();
    }
    public function getDocumentViewUrlAttribute()
    {
        return $this->file_url ? route('get.doc',base64_encode($this->file_url)) : "#";
    }
}

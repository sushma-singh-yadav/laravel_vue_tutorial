<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenuModel extends Model
{
    use HasFactory;

    protected $table = 'sub_menus';

    protected $guarded = [];
}

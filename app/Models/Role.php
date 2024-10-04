<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    const IS_ADMIN = 'admin';

    const IS_BLOGGER = 'blogger';

    const IS_READER = 'reader';

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}

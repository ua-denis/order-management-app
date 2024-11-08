<?php

declare(strict_types=1);

namespace App\Domain\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    protected $fillable = ['id', 'name', 'domain'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}

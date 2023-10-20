<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Tag extends Model
{
    use HasFactory;
    protected $fillable = ["name"];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Post extends Model
{
    use HasFactory;
    protected $fillable = ["title", "body"]; //追加

    //下記も追加
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

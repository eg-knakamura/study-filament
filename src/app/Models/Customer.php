<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 *
 * @property int $id
 * @property string $name_sei
 * @property string $name_mei
 * @property int $mst_item_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Customer extends Model
{
    use HasFactory;

    protected $fillable = ["name_sei", "name_mei", "mst_item_id"]; //追加
}

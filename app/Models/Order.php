<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            $count = self::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count() + 1;

            $id = sprintf('%s-%05d', date('ym'), $count);

            $model->order_id = $id;
        });
    }

    protected $fillable = [
        'order_id',
        'user_id',
        'sticker_id',
        'price',
        'freelance_price',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function sticker(): BelongsTo
    {
        return $this->belongsTo(Sticker::class);
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $appends = ['month', 'day'];

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


    public function month(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->created_at)->isoFormat('MMMM'),
        );
    }

    public function day(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->created_at)->isoFormat('DD MMMM YYYY'),
        );
    }
}

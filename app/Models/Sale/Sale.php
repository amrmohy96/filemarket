<?php

namespace App\Models\Sale;

use App\Models\File\File;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sale\Sale
 *
 * @property int $id
 * @property string $identifier
 * @property int $user_id
 * @property int $file_id
 * @property string $buyer_email
 * @property string $sales_price
 * @property string $sales_commission
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read File $file
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereBuyerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereSalesCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereSalesPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereUserId($value)
 * @mixin \Eloquent
 */
class Sale extends Model
{
    protected $guarded = [];

    public function getRouteKeyName():string
    {
        return 'identifier';
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function file(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(File::class);
    }


}

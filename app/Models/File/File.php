<?php

namespace App\Models\File;

use App\Models\Sale\Sale;
use App\Traits\File\FileCanCreateApproval;
use App\Traits\File\FileHasConst;
use App\Traits\File\FileHasManyApprovals;
use App\Traits\File\FileHasManyUploads;
use App\Traits\File\FileIsApproved;
use App\Traits\File\FileIsBelongsToUser;
use App\Traits\File\FileIsFinished;
use App\Traits\File\FileIsFree;
use App\Traits\File\FileIsNeedApproval;
use App\Traits\File\FileIsRouteByIdentifier;
use App\Traits\File\FileIsVisible;
use App\Traits\Scopes\ModelHasApproval;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;


/**
 * App\Models\File\File
 *
 * @property int $id
 * @property string $identifier
 * @property int $user_id
 * @property string $title
 * @property string $overview_short
 * @property string $overview
 * @property string $price
 * @property bool $live
 * @property bool $approved
 * @property bool $finished
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FileApproval\FileApproval[] $approvals
 * @property-read int|null $approvals_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|File finished()
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Query\Builder|File onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFinished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereLive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereOverviewShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|File withTrashed()
 * @method static \Illuminate\Database\Query\Builder|File withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Upload\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|File approved()
 * @method static \Illuminate\Database\Eloquent\Builder|File unapproved()
 * @property-read \Illuminate\Database\Eloquent\Collection|Sale[] $sales
 * @property-read int|null $sales_count
 */
class File extends Model
{
    use SoftDeletes,
        FileIsFinished,
        FileIsFree,
        FileIsRouteByIdentifier,
        FileIsBelongsToUser,
        FileHasManyApprovals,
        FileIsNeedApproval,
        FileCanCreateApproval,
        FileHasManyUploads,
        ModelHasApproval,
        FileIsApproved,
        FileIsVisible;

    protected $guarded = [];
    const APPROVAL_PROPERTIES = ['title','overview_short','overview'];

    public function mergeApprovalProperties()
    {
        $this->update(Arr::only($this->approvals->first()->toArray(),
            self::APPROVAL_PROPERTIES)
        );
    }

    public function deleteAllApprovals()
    {
        $this->approvals()->delete();
    }

    public function deleteUnapprovedUploads()
    {
        $this->uploads()->unapproved()->delete();
    }


    public function sales(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Sale::class);
    }

    public function calcCommission()
    {
        return (20 / 100) * $this->price;
    }

    public function matchSale(Sale $sale)
    {
        return $this->sales->contains($sale);
    }

    public function getUploadsList(): array
    {
        return $this->uploads()->approved()->get()->pluck('path')->toArray();
    }


}

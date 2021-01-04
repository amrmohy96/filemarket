<?php

namespace App\Models\FileApproval;

use App\Traits\FileApproval\FileApprovalIsBelongsToFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FileApproval\FileApproval
 *
 * @property int $id
 * @property int $file_id
 * @property string $title
 * @property string $overview_short
 * @property string $overview
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\File\File $file
 * @method static \Illuminate\Database\Eloquent\Builder|FileApproval newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileApproval newQuery()
 * @method static \Illuminate\Database\Query\Builder|FileApproval onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FileApproval query()
 * @method static \Illuminate\Database\Eloquent\Builder|FileApproval whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileApproval whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileApproval whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileApproval whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileApproval whereOverview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileApproval whereOverviewShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileApproval whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileApproval whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|FileApproval withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FileApproval withoutTrashed()
 * @mixin \Eloquent
 */
class FileApproval extends Model
{
    use SoftDeletes,FileApprovalIsBelongsToFile;
    protected $table = 'file_approvals';
    protected $guarded = [];
}

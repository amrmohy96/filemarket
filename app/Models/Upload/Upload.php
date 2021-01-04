<?php

namespace App\Models\Upload;

use App\Traits\Scopes\ModelHasApproval;
use App\Traits\Upload\UploadIsBelongsToFile;
use App\Traits\Upload\UploadIsBelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Upload\Upload
 *
 * @property int $id
 * @property int $user_id
 * @property int $file_id
 * @property string $filename
 * @property int $size
 * @property bool $approved
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\File\File $file
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newQuery()
 * @method static \Illuminate\Database\Query\Builder|Upload onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Upload withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Upload withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Upload approved()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload unapproved()
 * @property-read string $path
 */
class Upload extends Model
{
    use SoftDeletes,
        UploadIsBelongsToUser,
        UploadIsBelongsToFile,
        ModelHasApproval;

    protected $guarded = [];

    public function getPathAttribute(): string
    {
        return storage_path('app/files/'.$this->file->identifier.'/'.$this->filename);
    }
}

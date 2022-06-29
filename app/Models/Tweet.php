<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * App\Models\Tweet
 *
 * @property int $id
 * @property int|null $author_id
 * @property int|null $parent_id
 * @property int|null $retweet_id
 * @property string|null $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereRetweetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\User|null $author
 * @property-read Tweet|null $parent
 * @property-read Tweet|null $retweet
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $likes
 * @method static \Illuminate\Database\Eloquent\Builder|Tweet whereLikesCount($value)
 */
class Tweet extends Model
{
    use HasFactory;

    protected $fillable = ['author_id', 'parent_id', 'retweet_id', 'text', 'created_at', 'updated_at'];

    // RELATIONS
    public function parent() : belongsTo
    {
        return $this->belongsTo(Tweet::class, 'parent_id', 'id');
    }

    public function children() : Collection
    {
        return $this->whereParentId($this->id)->get();
    }

    public function retweet() : belongsTo
    {
        return $this->belongsTo(Tweet::class, 'retweet_id', 'id');
    }

    public function author() : belongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function likes() : belongsToMany
    {
        return $this->belongsToMany(User::class, 'tweets_likes');
    }

    // SETTER/GETTER
    public function setLikesCount ($value){
        $this->likes_count = $value;
    }
}

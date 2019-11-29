<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        'tag','title','subtitle','page_image','meta_description','reverse_direction'
    ];


    /**
     * 定义文章与标签之间多对多关系
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag_pivot');
    }

    /**
     * add any tags needed form the list
     *
     * @param  array $tage list of tags to check/add
     */
    public static function addNeededTags(array $tags)
    {
        if(count($tags) === 0){
            return;
        }

        $found = static::whereIn('tag',$tags)->get()->pluck('tag')->all();

        foreach (array_diff($tags,$found) as $tag) {
            static::create([
                'tag' => $tag,
                'title' => $tag,
                'subtitle' => 'Subtitle for'.$tag,
                'page_image' => '',
                'meta_description' => '',
                'reverse_direction' => false,
            ]);
        }
    }

    /**
     * Return the index layout to use for a tag
     * @param  [type] $tag     [description]
     * @param  string $default [description]
     * @return [type]          [description]
     */
    public static function layout($tag,$default = 'blog.index')
    {
        $layout = static::where('tag',$tag)->get()->pluck('layout')->first();

        return $layout ?: $default;
    }
}

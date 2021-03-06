<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;

/**
 *
 */
class PostService
{
    protected $tag;

    /**
     *控制器
     */
    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    public function lists()
    {
        if($this->tag){
            return $this->tagIndexData($this->tag);
        }

        return $this->normalIndexData();
    }

    /**
     * Return data for normal index page
     * [normalIndexData description]
     * @return [type] [description]
     */
    protected function normalIndexData(){
        $posts = Post::with('tags')
        ->where('published_at','<=',Carbon::now())
        ->where('is_draft',0)
        ->orderBy('published_at','desc')
        ->simplePaginate(config('blog.posts_per_page'));

        return [
            'title' => config('blog.title'),
            'subtitle' => config('blog.subtitle'),
            'posts' => $posts,
            'page_image' => config('blog.page_image'),
            'meta_description' => config('blog.description'),
            'reverse_direction' => false,
            'tag' => null
        ];
    }

    /**
     * 返回
     * [tagIndexData description]
     * @param  [type] $tag [description]
     * @return [type]      [description]
     */
    protected function tagIndexData($tag)
    {
        $tag = Tag::where('tag',$tag)->firstOrFail();
        $reverse_direction = (bool)$tag->reverse_direction;

        $posts = Post::where('published_at', '<=',Carbon::now())
        ->whereHas('tag',function($q) use ($tag){
            $q->where('tag','=',$tag->tag);
        })
        ->where('is_draft',0)
        ->orderBy('published_at', $reverse_direction ? 'asc' : 'desc')
        ->simplePageinate(config('blog.posts_per_page'));

        $posts->appends('tag',$tag->tag);

        $page_image = $tag->page_image ? : config('blog.page_image');

        return [
            'title' => $tag->title,
            'subtitle' => $tag->subtitle,
            'posts' => $posts,
            'page_image' => $page_image,
            'tag' => $tag,
            'reverse_direction' => $reverse_direction,
            'meta_description' => $tag->meta_description ?: config('blog.description')
        ];
    }

}

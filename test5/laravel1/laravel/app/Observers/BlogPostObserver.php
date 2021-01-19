<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
class BlogPostObserver
{
    public function creating(BlogPost $blogPost){

        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }
    public function updating(BlogPost $blogPost){
        $this->setPublishedAt($blogPost);

        $this->setSlug($blogPost);
    }
    protected function setPublishedAt(BlogPost $blogPost){
        if (empty($blogPost->published_at)&& $blogPost->is_published){
            $blogPost->published_at=Carbon::now();
        }
    }
    protected function setSlug(BlogPost $blogPost){
        if(empty($blogPost->slug)){
            $blogPost->slug=\Str::slug($blogPost->title);
        }
    }
    protected function setHtml(BlogPost $blogPost){
        if($blogPost->isDirty('content_raw')){
            $blogPost->content_html=$blogPost->content_raw;
        }
    }
    protected function setUser(BlogPost $blogPost){
        $blogPost->user_id=auth()->id() ?? BlogPost::UNKNOWN_USER;
    }
    /**
     * Handle the blog post "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}

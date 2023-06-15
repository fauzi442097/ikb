<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\News;
use App\Models\Comment;
use Log, DB;

class NewsDetail extends Component
{

    public $news;
    public $comment;
    public $slug;
    public $editComment = false;
    public $commentId;

    protected $listeners = [
        'refetchComment' => 'getNewsBySlug',
        'deleteComment' => 'deleteComment',
        'setComment' => 'setComment'
    ];

    public function dehydrate()
    {
        $this->emit('reinit_dropdown_menu');
    }

    public function getNewsBySlug($slug)
    {
        return News::with(['comments' => function($q) {
            $q->orderBy('id', 'DESC')->with('user');
        }, 'category', 'author', 'tags'])
        ->where('slug', $slug)
        ->first();
    }

    public function mount($slug)
    {
        $this->news = $this->getNewsBySlug($slug);
        $this->slug = $slug;
    }

    public function deleteComment($commentId)
    {
        Comment::where('id', $commentId)->delete();
        $this->emit('refetchComment', $this->slug);
        $this->emit('success_delete_comment');
        $this->emit('reinit_dropdown_menu');
    }

    public function setComment($commentId)
    {
        $this->editComment = true;
        $this->commentId = $commentId;
        $this->comment = Comment::find($commentId)->comment;
        $this->emit('reinit_dropdown_menu');
        $this->emit('focus_input_comment');
    }

    public function cancelEditComment()
    {
        $this->editComment = false;
        $this->commentId = '';
        $this->comment = '';
        $this->emit('reinit_dropdown_menu');
    }

    public function storeComment($newsId)
    {
        DB::beginTransaction();
        try {
            Comment::create([
                'news_id' => $newsId,
                'user_id' => auth()->user()->id,
                'comment' => $this->comment,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            $this->emit('refetchComment', $this->slug);
            $this->comment = '';
            DB::commit();
        } catch (\Exception $e ) {
            DB::rollback();
            Log::error($e);
            $this->emit('alert_remove');
            $this->addError('exceptionError', 'Terjadi kesalahan pada server');
        }
    }

    public function updateComment($commentId)
    {
        DB::beginTransaction();
        try {
            Comment::where('id', $commentId)
                ->update([
                    'comment' => $this->comment,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

            $this->emit('refetchComment', $this->slug);
            $this->editComment = false;
            $this->commentId = '';
            $this->comment = '';
            DB::commit();
        } catch (\Exception $e ) {
            DB::rollback();
            Log::error($e);
            $this->emit('alert_remove');
            $this->addError('exceptionError', 'Terjadi kesalahan pada server');
        }
    }

    public function render()
    {
        return view('livewire.guest.news-detail', ['news' => $this->getNewsBySlug($this->slug)]);
    }
}

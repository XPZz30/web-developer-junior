<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Eloquent\Post;

class BlogController extends BaseController
{
    public function index()
    {
        require_once APPPATH . 'Config/Eloquent.php';
        helper('text');

        $termo = $this->request->getGet('q');

        $query = Post::with('user')->orderBy('created_at', 'desc');

        if ($termo) {
            $query->where(function ($q) use ($termo) {
                $q->where('title', 'LIKE', "%{$termo}%")
                  ->orWhere('content', 'LIKE', "%{$termo}%");
            });
        }

        $posts = $query->get();

        return view('blog/index', ['posts' => $posts, 'termo' => $termo]);
    }
}

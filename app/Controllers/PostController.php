<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Eloquent\Post;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        return view('posts/index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $validation = $this->validate([
            'title' => 'required|min_length[3]',
            'image' => 'is_image[image]|max_size[image,2048]',
            'content' => 'required'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $post = new Post();
        $post->title = $this->request->getPost('title');
        $post->content = $this->request->getPost('content');
        $post->user_id = session()->get('usuario_logado')['id'];

        // Upload da imagem
        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid()) {
            $newName = $imageFile->getRandomName();
            $imageFile->move(FCPATH . 'uploads', $newName);
            $post->image = $newName;
        }

        $post->save();

        return redirect()->to('/posts')->with('success', 'Post criado com sucesso!');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            throw new PageNotFoundException("Post não encontrado");
        }

        // Opcional: verificar se o usuário logado é o dono do post
        if ($post->user_id != session()->get('usuario_logado')['id']) {
            return redirect()->to('/posts')->with('erro', 'Você não tem permissão para editar este post.');
        }

        return view('posts/edit', ['post' => $post]);
    }

    public function update($id)
    {
        $post = Post::find($id);
        if (!$post) {
            throw new PageNotFoundException("Post não encontrado");
        }

        $validation = $this->validate([
            'title' => 'required|min_length[3]',
            'image' => 'is_image[image]|max_size[image,2048]',
            'content' => 'required'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $post->title = $this->request->getPost('title');
        $post->content = $this->request->getPost('content');

        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid()) {
            // Opcional: remover imagem antiga
            if ($post->image && file_exists(FCPATH . 'uploads/' . $post->image)) {
                unlink(FCPATH . 'uploads/' . $post->image);
            }

            $newName = $imageFile->getRandomName();
            $imageFile->move(FCPATH . 'uploads', $newName);
            $post->image = $newName;
        }
        $post->save();

        return redirect()->to('/posts')->with('success', 'Post atualizado com sucesso!');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        if (!$post) {
            throw new PageNotFoundException("Post não encontrado");
        }

        // Opcional: verificar dono do post
        if ($post->user_id != session()->get('usuario_logado')['id']) {
            return redirect()->to('/posts')->with('erro', 'Você não tem permissão para deletar este post.');
        }

        // Apagar imagem
        if ($post->image && file_exists(WRITEPATH . 'uploads/' . $post->image)) {
            unlink(WRITEPATH . 'uploads/' . $post->image);
        }

        $post->delete();

        return redirect()->to('/posts')->with('success', 'Post deletado com sucesso!');
    }

    public function show($id)
    {
        $post = Post::with('user')->find($id);
        if (!$post) {
            throw new PageNotFoundException("Post não encontrado");
        }
        return view('posts/show', ['post' => $post]);
    }
}

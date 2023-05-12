<?php

namespace Controllers;

use Models\Entities\Post;
use Models\Entities\User;
use Models\Managers\CommentsManager;
use Models\Managers\PostsManager;

class PostsController extends Controller
{
    private $postManager;
    private $commmentsManager;

    public function __construct()
    {
        parent::__construct();
        $this->postManager = new PostsManager();
        $this->commmentsManager = new CommentsManager;
    }

    public function newPost()
    {
        return $this->render('/posts/new.html.twig');
    }

    public function addPost()
    {
        if (!empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content'])) {
            $title = htmlspecialchars($_POST['title'], ENT_NOQUOTES);
            $chapo = htmlspecialchars($_POST['chapo'], ENT_NOQUOTES);
            $content = htmlspecialchars($_POST['content'], ENT_NOQUOTES);
            $user = new User(['id' => $_SESSION['id']]);
            $post = new Post(['title' => $title, 'chapo' => $chapo, 'content' => $content, 'user' => $user]);
            $this->postManager->addPost($post);
            $redirectTo = "?action=dashboard&message=postadded";
        } else {
            $redirectTo = "?action=newpost&error=1&title=" . $_POST['title'] . "&chapo=" . $_POST['chapo'] . "&content=" . $_POST['content'];
        }
        header("Location: $redirectTo");
        exit;
    }

    public function editPost()
    {
        if (!empty($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
            $post = $this->postManager->findPost($id);
            return $this->render('/posts/edit.html.twig', compact('post'));
        } else {
            $redirectTo = "?action=error&message=Aucun identifiant d'article envoyé";
            header("Location: $redirectTo");
            exit;
        }
    }

    public function savePost()
    {
        if (!empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['chapo']) && !empty($_POST['content'])) {
            $id = intval($_POST['id']);
            $title = htmlspecialchars($_POST['title'], ENT_NOQUOTES);
            $chapo = htmlspecialchars($_POST['chapo'], ENT_NOQUOTES);
            $content = htmlspecialchars($_POST['content'], ENT_NOQUOTES);
            $user = new User(['id' => $_SESSION['id']]);
            $post = new Post(['id' => $id, 'title' => $title, 'chapo' => $chapo, 'content' => $content, 'user' => $user]);
            $this->postManager->savePost($post);
            $redirectTo = "?action=dashboard&message=postsaved";
        } else {
            $redirectTo = "?action=editpost&id=" . $_POST['id']. "&error=1";
        }
        header("Location: $redirectTo");
        exit;
    }

    public function deletePost()
    {
        if (!empty($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
            $this->postManager->deletePost($id);
            $redirectTo = "?action=dashboard&message=postdeleted";
        } else {
            $redirectTo = "?action=error&message=Aucun identifiant d'article envoyé";
        }
        header("Location: $redirectTo");
        exit;
    }

    public function blog()
    {
        $posts = $this->postManager->findAllPost();
        return $this->render('/posts/blog.html.twig', ['posts' => $posts]);
    }

    public function blogpost()
    {
        if (!empty($_GET['id']) && $_GET['id'] > 0) {
            $id = intval($_GET['id']);
            $post = $this->postManager->findPost($id);
            $comments = $this->commmentsManager->findAllCommentsOfBlogPost($id);
            return $this->render('/posts/blogpost.html.twig', compact('post', 'comments'));
        } else {
            $redirectTo = "?action=error&message=Aucun identifiant d'article envoyé";
            header("Location: $redirectTo");
            exit;
        }
    }
}

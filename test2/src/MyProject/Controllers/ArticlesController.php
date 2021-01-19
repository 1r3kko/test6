<?php 
namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Users\User;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\ForbiddenException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\Comments\Comment;

class ArticlesController extends AbstractController
{
    public function view(int $articleId)
    {
        $article=Article::getById($articleId);
        $comments=Comment::findAllByColumn('article_id',$articleId);
        if ($article === null) {
        	throw new NotFoundException();
        }
        $this->view->renderHtml('articles/view.php', [
            'article' => $article,'comments'=>$comments
        ]);
	}
    public function edit(int $articleId):void{
        $article=Article::getById($articleId);

        if($article===null){
            throw new NotFoundException();
        }
        if ($this->user==null){
            throw new UnauthorizedException();
        }
        if(!$this->user->isAdmin()){
            throw new ForbiddenException();
        }
        if (!empty($_POST)){
            try{
                $article->updateFromArray($_POST);
            }catch (InvalidArgumentException $e){
                $this->view->renderHtml('articles/edit.php',['error'=>$e->getMessage(),'article'=>$article]);
                return;
            }
            header('Location:/articles/'.$article->getId(), true,302);
            exit();
        }
        $this->view->renderHtml('articles/edit.php',['article'=>$article]);
    }
    public function add(){
        if ($this->user===null){
            throw new UnauthorizedException();
        }
        if(!$this->user->isAdmin()){
            throw new ForbiddenException();
        }
        if (!empty($_POST)){
            try{
                $article=Article::createFromArray($_POST, $this->user);
            }catch(InvalidArgumentException $e){
                $this->view->renderHtml('articles/add.php', ['error'=>$e->getMessage()]);
                return;
            }
            header('Location: /articles/'.$article->getId(),true,302);
            exit();
        }
        $this->view->renderHtml('articles/add.php');
    }
    public function delete(int $articleId):void{
        $article=Article::getById($articleId);

        if($article===null){
            throw new NotFoundException();
        }

        $article->delete();
        var_dump($article);
    }
    public function comments(int $articleId){
        if (!empty($_POST)){
            try{
                $comment=Comment::createCommentFromArray($_POST, $this->user,$articleId);
            }catch(InvalidArgumentException $e){
                $this->view->renderHtml('errors/405.php', ['error'=>$e->getMessage()]);
                return;
            }
            header('Location: /articles/'.$articleId.'#comment'.$comment->getId(),true,302);
            exit();
        }
        $this->view->renderHtml('articles/view.php');
    }
}
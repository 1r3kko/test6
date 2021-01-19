<?php 
namespace MyProject\Controllers;

use MyProject\Models\Comments\Comment;
use MyProject\Models\Articles\Articles;
use MyProject\Exceptions\InvalidArgumentException;

class CommentsController extends AbstractController{
	public function edit(int $commentId): void{
		$comment=Comment::getById($commentId);
		if (!empty($_POST)){
	        try{
                $comment->updateCommentFromArray($_POST);
            }catch(InvalidArgumentException $e){
                $this->view->renderHtml('errors/405.php', ['error'=>$e->getMessage()]);
                return;
            }
            header('Location: /articles/'.$comment->getArticle(),true,302);
            exit();
        }
	    $this->view->renderHtml('comments/edit.php',['comment'=>$comment]);
	}

}
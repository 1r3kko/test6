<?php 
namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Users\User;
use MyProject\Models\Admins\Admin;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\ForbiddenException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\Comments\Comment;

class AdminsController extends AbstractController
{
    public function view(int $code)
    {
        $admin = Admin::login();
        if (!$this->user->isAdmin()){
            throw new ForbiddenException();
        }
        if ($code==0){
        $this->view->renderHtml('admins/view.php');
        }
        else if($code==1){
        $articles=Article::getLast('created_at','2020-08-15 15:18:01');
        if ($articles === null) {
            throw new NotFoundException();
            }
        $this->view->renderHtml('admins/lastArticles.php', [
            'articles' => $articles]);
        }
        else if($code==2){
         $comments=Comment::getLast('created_at','2020-08-21 15:22:28');
        if ($comments === null) {
            throw new NotFoundException();
            }
        $this->view->renderHtml('admins/lastComments.php', ['comments'=>$comments]);
        }
	}
}
<?php
namespace MyProject\Models\Comments;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Models\Articles\Article;
use MyProject\Exceptions\InvalidArgumentException;

class Comment extends ActiveRecordEntity
{
	protected $id;
    protected $authorId;
    protected $articleId;
    protected $text;
    protected $created_at;

    public function setAuthor(User $author):void{
        $this->authorId=$author->getId();
    }
    public function getAuthor():User{
        return User::getById($this->authorId);
    }
    public function setArticle(int $articleId):void{
        $this->articleId=$articleId;
    }
    public function getArticle():int{
        return $this->articleId;
    }
    public function setText($text)
    {
        $this->text=$text;
    }
    public function getText(): string
    {
        return $this->text;
    }
    public static function createCommentFromArray(array $fields, User $author, int $articleId):Comment{
        if (empty($fields['comment'])){
            throw new InvalidArgumentException('Не передан текст комментария');
        }
        $comment = new Comment();
        $comment->setAuthor($author);
        $comment->setArticle($articleId);
        $comment->setText($fields['comment']);

        $comment->save();
        return $comment;
    }
    public function updateCommentFromArray(array $fields):Comment{
    if (empty($fields['text'])) {
        throw new InvalidArgumentException('Не передан текст комментария');
    }

    $this->setText($fields['text']);

    $this->save();

    return $this;
    }
    protected static function getTableName(): string{
    	return 'comments';
    }
}
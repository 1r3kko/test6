<?php
namespace MyProject\Models\Articles;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Exceptions\InvalidArgumentException;

class Article extends ActiveRecordEntity
{
    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;

    public function getParsedText(): string
    {
    $parser = new \Parsedown();
    return $parser->text($this->getText());
    }
    public function getAuthor():User{
        return User:: getById($this->authorId);
    }
    public function setAuthor(User $author):void{
        $this->authorId=$author->getId();
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name=$name;
    }

    public function getText(): string
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text=$text;
    }
    public static function createFromArray(array $fields, User $author):Article{
        if (empty($fields['name'])){
            throw new InvalidArgumentException('Не передано название статьи');
        }
        if (empty($fields['text'])){
            throw new InvalidArgumentException('Не передан текст статьи');
        }
        $article = new Article();
        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);

        $article->save();
        return $article;
    }
    public function updateFromArray(array $fields): Article{
    if (empty($fields['name'])) {
        throw new InvalidArgumentException('Не передано название статьи');
    }

    if (empty($fields['text'])) {
        throw new InvalidArgumentException('Не передан текст статьи');
    }

    $this->setName($fields['name']);
    $this->setText($fields['text']);

    $this->save();

    return $this;
    }
    protected static function getTableName():string{
        return 'articles';
    }
}
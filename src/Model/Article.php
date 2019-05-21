<?php


namespace App\Model;

class Article
{
    private $id;
    private $title;
    private $category;
    private $slug;
    private $image;
    private $body;
    private $createdAt;
    private $updatedAt;



    public function __construct(int $id, string $title, Category $category, string $slug)
    {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->slug = $slug;
    }


    public function getId():int
    {
        return $this->id;
    }


    public function getTitle():string
    {
        return $this->title;
    }

    public function getCategory():Category
    {
        return $this->category;
    }


    public function getSlug():string
    {
        return $this->slug;
    }

    public function getImage():?string
    {
        return $this->image;
    }


    public function getBody():?string
    {
        return $this->body;
    }

    public function getCreatedAt():?string
    {
        return date('d-m-Y H:i:s', $this->createdAt);
    }


    public function getUpdatedAt():?string
    {
        return date('d-m-Y H:i:s', $this->updatedAt);
    }
}

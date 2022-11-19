<?php

namespace silverorange\DevTest\Model;

use silverorange\DevTest\Repository\AuthorRepository;

class Post extends Model
{
    private string $id;
    private string $title;
    private string $body;
    private string $created_at;
    private string $modified_at;
    private Author $author;

    public function __construct(array $post)
    {
        parent::__construct();

        $this->id = $post['id'];
        $this->title = $post['title'];
        $this->body = $post['body'];
        $this->created_at = $post['created_at'];
        $this->modified_at = $post['modified_at'];

        $authorRepository = new AuthorRepository($this->db);
        $this->author = $authorRepository->getOneById($post['author']);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $timestamp): self
    {
        $this->created_at = $timestamp;
    }

    public function getModifiedAt(): string
    {
        return $this->modified_at;
    }

    public function setModifiedAt(string $timestamp): self
    {
        $this->modified_at = $timestamp;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function setAuthor(Author $author): self
    {
        $this->author = $author;
    }
}

<?php

namespace silverorange\DevTest\Model;

class Author extends Model
{
    private string $id;
    private string $full_name;
    private string $created_at;
    private string $modified_at;

    public function __construct(array $author)
    {
        parent::__construct();

        $this->id = $author['id'];
        $this->full_name = $author['full_name'];
        $this->created_at = $author['created_at'];
        $this->modified_at = $author['modified_at'];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFullName(): string
    {
        return $this->full_name;
    }

    public function setFullName(string $full_name): self
    {
        $this->full_name = $full_name;

        return $this;
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
}

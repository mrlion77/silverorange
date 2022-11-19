<?php

namespace silverorange\DevTest;

class Database
{
    protected ?\PDO $pdo = null;
    protected string $dsn;
    protected string $username;
    protected string $password;

    public function __construct(string $dsn, string $username, string $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
    }

    public function setDSN(string $dsn): self
    {
        if ($this->dsn !== $dsn) {
            $this->dsn = $dsn;
            $this->pdo = null;
        }
        return $this;
    }

    public function getConnection(): \PDO
    {
        if (!$this->pdo instanceof \PDO) {
            // Postgresql
            // $this->pdo = new \PDO($this->dsn);

            // MySQL
            $this->pdo = new \PDO($this->dsn, $this->username, $this->password);
        }

        return $this->pdo;
    }
}

<?php

namespace Wog\Repository;

use Wog\Database\Manager;
use Wog\Model\UserModel;

class UserRepository
{

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param UserModel $user
     * @return void
     *
     * @throws \PDOException for user exists or errors
     */
    public function insert(UserModel $user): void
    {
        $sth = Manager::getConnection()->prepare(
            "INSERT INTO"
            . " `users`("
            . "`email`, `password`, `surname`, `first_name`, `last_name`, `phone`, `adress`, `city`, `zip`, `token`"
            . ")"
            . " VALUES (:email,:password,:surname,:first_name,:last_name,:phone,:adress,:city,:zip,:token)"
        );
        $sth->bindValue(":email", $user->getEmail());
        $sth->bindValue(":password", $user->getPassword());
        $sth->bindValue(":surname", $user->getSurname());
        $sth->bindValue(":first_name", $user->getFirstName());
        $sth->bindValue(":last_name", $user->getLastName());
        $sth->bindValue(":phone", $user->getPhone());
        $sth->bindValue(":adress", $user->getAdress());
        $sth->bindValue(":city", $user->getCity());
        $sth->bindValue(":zip", $user->getZip());
        $sth->bindValue(":token", $user->getToken());
        $sth->execute();
    }

    /**
     * @return array UserModel[]
     */
    public function select(): array
    {
        $sth = Manager::getConnection()->prepare("SELECT * FROM `users`");
        $sth->setFetchMode(\PDO::FETCH_CLASS, UserModel::class);
        $sth->execute();
        return $sth->fetchAll();
    }

    /**
     * @param string $email
     * @return UserModel
     */
    public function selectByEmail(string $email): UserModel
    {
        $sth = Manager::getConnection()->prepare("SELECT * FROM `users` WHERE `email`=:email");
        $sth->setFetchMode(\PDO::FETCH_CLASS, UserModel::class);
        $sth->bindValue(":email", $email);
        $sth->execute();
        return $sth->fetch();
    }

}
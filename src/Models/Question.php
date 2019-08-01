<?php
namespace Quiz\Models;

use PDO;
use Quiz\Model;

class Question extends Model
{
    protected $table = "t_questions";

    public function getByQuizSlug(?string $quizSlug = null){
        $sql = "SELECT que.* FROM ".$this->table." as que";


        if($quizSlug !== null){
            $sql .= " INNER JOIN `t_quizes` as qui ON (qui.id = que.quiz_id AND qui.slug = :quizSlug)";
        }

        $stmt = $this->getConnection()->prepare($sql);


        if($quizSlug !== null){
            $stmt->bindValue("quizSlug", $quizSlug, PDO::PARAM_STR);
        }

        $stmt->execute();

        return $stmt->fetchAll();
    }

}
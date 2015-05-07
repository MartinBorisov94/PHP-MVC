<?php
class HomeModel extends BaseModel {

    public function getAllQuestions() {
        $statement = self::$db->query("
        SELECT questions.id, questions.Title, DateTime, users.Username
         FROM forum_db.questions
         LEFT JOIN forum_db.users
         ON questions.UserId = users.Id
         ORDER BY questions.DateTime DESC, questions.Id DESC");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllCategories(){
        $statement = self::$db->query("
          SELECT Id, Catagory
          FROM forum_db.categories");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
}
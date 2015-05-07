<?php
class QuestionsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM questions");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
       $statement = self::$db->prepare("
         SELECT  questions.Title, questions.DateTime, questions.Question, users.Username
         FROM  forum_db.questions
         JOIN forum_db.users ON questions.UserId = users.Id
         WHERE questions.Id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function findByCategorieId($id) {
        $statement = self::$db->prepare("
        SELECT questions.id, questions.Title, DateTime, users.Username
         FROM forum_db.questions
         LEFT JOIN forum_db.users
         ON questions.UserId = users.Id
         WHERE questions.CategorieId = ?
         ORDER BY questions.DateTime DESC, questions.Id DESC
        ");
        $statement->bind_param("i", $id);
        $statement->execute();;
        return $statement->get_result()->fetch_all();
    }

    public function findAnswers($id){
        $statement = self::$db->prepare("
         SELECT answers.Username, answers.DateTime, answers.Answer
         FROM answers
         WHERE QuestionId= ?
       ");
        $statement->bind_param("i", $id);
        $statement->execute();

        return $statement->get_result()->fetch_all();
    }

    public function create($userId, $title, $question,$dateTime, $categoryId) {
        if ($userId == '' || $title == '' || $question == '' || $categoryId == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO  forum_db.questions  (UserId, Question, Title, DateTime, CategorieId)
            VALUES(?,?,?,?,?)");
        $statement->bind_param("isssi", $userId, $title, $question,  $dateTime, $categoryId);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

}
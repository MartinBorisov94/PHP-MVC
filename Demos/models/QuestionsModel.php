<?php
class QuestionsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM questions");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
       $statement = self::$db->prepare("
         SELECT questions.Id, questions.Title, questions.DateTime, questions.Question, users.Username
         FROM  forum_db.questions
         JOIN forum_db.users ON questions.UserId = users.Id
         WHERE questions.Id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function findByCategorieId($id) {
        $statement = self::$db->prepare("
           SELECT questions.id, questions.Title, DateTime, users.Username, categories.Catagory
         FROM forum_db.questions
         LEFT JOIN forum_db.users ON questions.UserId = users.Id
         JOIN forum_db.categories ON categories.Id =   questions.CategorieId
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
         WHERE QuestionId = ?
         ORDER BY answers.DateTime ASC
       ");
        $statement->bind_param("i", $id);
        $statement->execute();

        return $statement->get_result()->fetch_all();
    }

    public function create($username, $title, $question, $dateTime, $categoryId) {
        if ($username == '' || $title == '' || $question == '' || $categoryId == '') {
            return false;
        }
        $userStatmen = self::$db->prepare(
            "SELECT Id FROM forum_db.users WHERE users.Username =  ?");
        $userStatmen->bind_param("s", $username);
        $userStatmen->execute();
        $userId =  $userStatmen->get_result()->fetch_all()[0][0];

        $statement = self::$db->prepare(
            "INSERT INTO  forum_db.questions  (UserId, Question, Title, DateTime, CategorieId)
            VALUES(?,?,?,?,?)");
        $statement->bind_param("isssi", $userId, $title, $question,  $dateTime, $categoryId);
        $statement->execute();
        return $statement->affected_rows > 0;

//      $statement = self::$db->prepare(
//            "INSERT INTO forum_db.questions (UserId, Question, Title, DateTime, CategorieId)
//          VALUES ((SELECT Id FROM forum_db.users WHERE users.Username =  ?), Question = ?, Title =  ?,  DateTime = ?, CategorieId =  ?)");
//        $statement->bind_param("ssssi",$username, $title, $question,  $dateTime, $dateTime);
//        $statement->execute();
//        return $statement->affected_rows > 0;

    }

    public function addAnswer($answer, $id, $dateTime, $username, $email) {
//        if ($name == '') {
//            return false;
//        }
        var_dump($answer, $id, $dateTime, $username, $email);

        $statement = self::$db->prepare(
            "INSERT INTO forum_db.answers (Answer, QuestionId, DateTime, Username, Email)
            VALUES(?,?,?,?,?)");
        $statement->bind_param("sisss", $answer, $id, $dateTime, $username, $email);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

}
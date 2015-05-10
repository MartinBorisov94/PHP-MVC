<?php

class SearchModel extends BaseModel {

    function search($queryText){
        $queryString = "SELECT questions.Id, questions.Question, questions.Title, questions.DateTime, categories.Catagory, users.Username
                        FROM forum_db.questions
                        JOIN forum_db.categories
                        ON questions.CategorieId = categories.Id
                        JOIN forum_db.users
                        ON questions.UserId = users.Id WHERE";

        $wordsToSearch = preg_split("/[\s,-]+/", $queryText);

        foreach($wordsToSearch as $word){
            $queryString .= " questions.Title LIKE '%".$word."%' AND";
        }
        $queryString .= " 1=1";

        $statement = self::$db->prepare($queryString);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}



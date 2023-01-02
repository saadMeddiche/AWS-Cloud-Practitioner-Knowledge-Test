<?php 

class QuestionsController
{

    public function getAllQuestions(){
        $newQuestion = questions::getAll();
        return $newQuestion;
    }

}
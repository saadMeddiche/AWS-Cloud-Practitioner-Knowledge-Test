<?php 

class questionsController
{

    public function getAllQuestions(){
        $newQuestion = questions::getAll();
        return $newQuestion;
    }

}
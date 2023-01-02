<?php

class AnswersController
{
    public function getAllAnswers()
    {
        $answer = Answers::getAll();
        return $answer;
    }
}

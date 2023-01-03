<?php
class DescriptionController
{

    public function getAllDescriptions()
    {
        $newQuestion = Description::getAll();
        return $newQuestion;
    }
}

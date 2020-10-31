<?php


namespace App;


class Jurgis
{
    public function responds(string $message): string
    {

        $message = trim($message);

        if (!$message) {
            return 'Alio! Kuku?';
        }

        $greeting = $this->checkGreeting($message);
        $shouting = $this->checkShouting($message);
        // $question = $this->checkQuestion();
        
        if ($greeting) {
            return 'Labas!';
        }

        return 'Aha gerai.';

    }

    private function checkGreeting(string $message)
    {
        if (strtolower($message) === 'Sveiki' || strtolower($message) === 'LABAS') {
            return true;
        }
        
        return false;
    }

    private function checkShouting(string $message)
    {
        if (preg_match("/[A-Z]/", $message, $matches)) {
            return true;
        }

        return false;
    }

    
}

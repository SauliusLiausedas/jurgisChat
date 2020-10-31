<?php


namespace App;


class Jurgis
{
    public function responds(string $message): string
    {

        $message = trim($message);
        $answer = 'Aha gerai.';

        if (!$message) {
            $answer = 'Alio! Kuku?';
        }

        $greeting = $this->checkGreeting($message);
        $shouting = $this->checkShouting($message);
        $question = $this->checkQuestion($message);
        
        if ($question) {
            $answer = 'Okis.';
        }
        
        if ($shouting) {
            $answer = 'Oi oi, atvėsk!';
        }

        if ($greeting) {
            $answer = 'Labas!';
        }

        return $answer;
    }

    private function checkGreeting(string $message): bool
    {
        if (strtolower($message) === 'sveiki' || strtolower($message) === 'labas') {
            return true;
        }
        
        return false;
    }

    private function checkShouting(string $message): bool
    {
        $message = preg_replace("/[^A-Za-z]/", '', $message);

        $charactersCount = strlen($message);
        //  If > 75% chars are uppercase - its shouting
        $shoutingCountsAtPerc = 75;
        if (preg_match_all("/[A-Z]/", $message, $uppercaseMatches)) {
            return count($uppercaseMatches[0]) * 100 / $charactersCount >= $shoutingCountsAtPerc;
        }
        
        return false;
    }

    private function checkQuestion(string $message): bool
    {
        echo substr($message, -1) === '?';
        if (substr($message, -1) === '?') {
            return true;
        }

        return false;
    }

    
}

<?php

namespace Hangman\Tests;

use Hangman\Game;
use Hangman\Word;

class GameTest extends \PHPUnit\Framework\TestCase
{
    public function testisLetterFound()
    {
        $game = new Game(new Word('php'));


        // result prend la lettre que l'utilisateur a choisi
        $game->tryLetter('p');

        // permet de verifier si la letttre a ete trouver dans le  mot
        $this->assertTrue($game->isLetterFound('p'));

    }

    public function testIsLetterNotFound()
    {
        $game = new Game(new Word('php'));
        $game->tryLetter('p');

        // permet de verifier si la letttre n'a pas ete trouver dans le  mot
        // la lettre n'a pas ete trouver pcq l'utilisateur a saisie p
        $this->assertFalse($game->isLetterFound('h'));
    }

    public function testGetRemainingAttemptsAreEqualsAtStart()
    {
        $game = new Game(new Word('php'));
        $this->assertEquals($game::MAX_ATTEMPTS, $game->getRemainingAttempts());
    }
}
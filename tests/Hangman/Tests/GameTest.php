<?php

namespace Hangman\Tests;

use Hangman\Game;
use Hangman\Word;

class GameTest extends \PHPUnit\Framework\TestCase
{
    public static $dataGoodLetters = array(
        array('p'),
        array('h'),
        array('p')
    );

    public static $dataBadLetters = array(
        array('e'),
        array('x'),
    );

    private $game;

    public function setUp()
    {
        $this->game = new Game(new Word('php'));
    }

    public function getDataGoodLetters()
    {
        return self::$dataGoodLetters;
    }

    public function getDataBadLetters()
    {
        return self::$dataBadLetters;
    }

    public function testGameHasStart()
    {
        $this->assertFalse($this->game->isWon());

        return $this->game;
    }

    /**
     * @dataProvider getDataGoodLetters
     */
    public function testisLetterFound($lettre)
    {
        // result prend la lettre que l'utilisateur a choisi
        $this->game->tryLetter($lettre);

        // permet de verifier si la letttre a ete trouver dans le  mot
        $this->assertTrue($this->game->isLetterFound($lettre));

    }

    /**
     * @dataProvider getDataBadLetters
     */
    public function testIsLetterNotFound($letter)
    {
        $this->game->tryLetter($letter);

        // permet de verifier si la letttre n'a pas ete trouver dans le  mot
        // la lettre n'a pas ete trouver pcq l'utilisateur a saisie p
        $this->assertFalse($this->game->isLetterFound($letter));
    }

    public function testGetRemainingAttemptsAreEqualsAtStart()
    {
        $this->assertEquals(Game::MAX_ATTEMPTS, $this->game->getRemainingAttempts());
    }
}
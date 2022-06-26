<?php

declare(strict_types=1);

namespace Data;

/**
 * Class Oscar - data o 1 filmu (ženy nebo muži), který získal Oscara
 * @copyright (c) 2022 Rývová
 */
class Oscar
{
    /**
     * Rok udělení Oscara
     *
     * @var int<1928, 2016>
     */
    private int $year;

    /**
     * Název filmu
     *
     * @var string
     */
    private string $movie;

    /**
     * Jméno herce/herečky, který získal Oscara
     *
     * @var string
     */
    private string $starName;

    /**
     * Věk herce/herečky, který získal Oscare
     *
     * @var int<0, 150>
     */
    private int $starAge;

    /**
     * Konstruktor
     *
     * @param int $year Rok udělení Oscare
     * @param string $movie Název filmu
     * @param string $starName Herec/herečka, který získal Oscara
     * @param int $starAge Věk herce/herečky, který získal Oscara
     */
    public function __construct(int $year, string $movie, string $starName, int $starAge)
    {
        $this->year = $year;
        $this->movie = $movie;
        $this->starName = $starName;
        $this->starAge = $starAge;
    } // __construct()

    /**
     * Vrátí hodnotu atributu year
     *
     * @return int<1928, 2016> Rok udělení Oscara
     */
    public function getYear(): int
    {
        return $this->year;
    } // getYear()

    /**
     * Nastaví hodnotu atributu year
     *
     * @param int $year <1928, 2016> Rok udělení Oscara
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    } // setYear()

    /**
     * Vrátí hodnotu atributu movie
     *
     * @return string Název filmu, který získal Oscara
     */
    public function getMovie(): string
    {
        return $this->movie;
    } // getMovie()

    /**
     * Nastaví hodnotu atributu movie
     *
     * @param string $movie Název filmu, který získal Oscara
     */
    public function setMovie(string $movie): void
    {
        $this->movie = $movie;
    } // setMovie()

    /**
     * Vrátí hodnotu atributu starName
     *
     * @return string Jméno herce/herečky, který získal Oscara
     */
    public function getStarName(): string
    {
        return $this->starName;
    } // getStarName()

    /**
     * Nastaví hodnotu atributu starName
     *
     * @param string $starName Jméno herce/herečky, který získal Oscare
     */
    public function setStarName(string $starName): void
    {
        $this->starName = $starName;
    } // setStarName()

    /**
     * Vrátí hodnotu atributu starAge
     *
     * @return int<0, 150> Věk herce/herečky, který získal Oscara
     */
    public function getStarAge(): int
    {
        return $this->starAge;
    } // getStarAge()

    /**
     * Nastaví hodnotu atributu starAge
     *
     * @param int<0, 150> $starAge věk herce/herečky, který získal Oscara
     */
    public function setStarAge(int $starAge): void
    {
        $this->starAge = $starAge;
    } // setStarAge()
} // Oscar

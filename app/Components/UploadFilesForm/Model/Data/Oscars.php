<?php

declare(strict_types=1);

namespace Data;

/**
 * Class Oscars Data o všech filmech (muži i ženy), které získaly Oscara
 * @copyright (c) 2022 Rývová
 */
class Oscars
{
    /**
     * Seznam všech mužských rolí, které získaly Oscara
     *
     * @var array<Oscar>
     */
    private array $maleOscars;

    /**
     * SeZnam všech ženských rolí, které získaly Oscara
     *
     * @var array<Oscar>
     */
    private array $femaleOscars;

    /**
     * Konstruktor
     *
     * @param array<Oscar> $maleOscars   Seznam mužských Oscarů
     * @param array<Oscar> $femaleOscars Seznam ženských Oscarů
     */
    public function __construct(array $maleOscars, array $femaleOscars)
    {
        $this->maleOscars = $maleOscars;
        $this->femaleOscars = $femaleOscars;
    } // __construct()

    /**
     * Vrátí hodnotu atributu maleOscars
     *
     * @return Oscar[] Pole všech mužských Oscarů
     */
    public function getMaleOscars(): array
    {
        return $this->maleOscars;
    } // getMaleOscars()

    /**
     * Nastaví hodnotu atributu maleOscars
      *
     * @param Oscar[] $maleOscars Pole všech mužských Oscarů
     */
    public function setMaleOscars(array $maleOscars): void
    {
        $this->maleOscars = $maleOscars;
    } // setMaleOscars()

    /**
     * Vrátí hodnotu atributu femaleOscars
     *
     * @return Oscar[] Pole všech ženských Oscarů
     */
    public function getFemaleOscars(): array
    {
        return $this->femaleOscars;
    } // getFemaleOscars()

    /**
     * Nastaví hodnotu atributu femaleOscars
     *
     * @param Oscar[] $femaleOscars Pole všech ženských Oscarů
     */
    public function setFemaleOscars(array $femaleOscars): void
    {
        $this->femaleOscars = $femaleOscars;
    } // setFemaleOscars()
} // Oscars

<?php

declare(strict_types=1);

namespace Fork\Service;

use Fork\Renderer\Output;

interface Game
{
    public function run(): Output;
}
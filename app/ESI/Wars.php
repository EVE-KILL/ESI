<?php

namespace EK\ESI;

use EK\Api\Abstracts\ESIInterface;

class Wars extends ESIInterface
{
    public function __construct(

        protected EsiFetcher $esiFetcher
    ) {
        parent::__construct($esiFetcher);
    }

    public function getWars(int $maxWarId): array
    {
        return $this->esiFetcher->fetch('/latest/wars', 'GET', ['max_war_id' => $maxWarId]);
    }

    public function getWar(int $warId): array
    {
        return $this->esiFetcher->fetch("/latest/wars/{$warId}");
    }

    public function getWarKills(int $warId): array
    {
        return $this->esiFetcher->fetch("/latest/wars/{$warId}/killmails");
    }
}
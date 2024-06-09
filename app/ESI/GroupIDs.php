<?php

namespace EK\ESI;

class GroupIDs
{
    public function __construct(
        protected \EK\Models\GroupIDs $groupIDs,
        protected EsiFetcher $esiFetcher
    ) {
    }

    public function getGroupInfo(int $group_id): ?array
    {
        $result = $this->esiFetcher->fetch('/latest/universe/groups/' . $group_id);
        ksort($result);
        $this->groupIDs->setData($result);
        $this->groupIDs->save();

        return $result;
    }
}

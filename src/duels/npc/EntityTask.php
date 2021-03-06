<?php

declare(strict_types=1);

namespace duels\npc;

use duels\Duels;
use pocketmine\scheduler\Task;

use function count;

class EntityTask extends Task
{

    public function onRun($currentTick)
    {
        if(EntityManager::getMax() === 0 && count(Duels::getMain()->getServer()->getDefaultLevel()->getPlayers()) > 0)
        {
            EntityManager::add();
        }
        foreach(Duels::getMain()->getServer()->getDefaultLevel()->getEntities() as $entity)
        {
            if($entity instanceof DuelEntity)
            {
                $version = Duels::getMain()->getDescription()->getVersion();
                $entity->setNameTag('§bClassic Duels §7[v'.$version.']'."\n".'§e'.Duels::getArena()->getPlaying().' Players'."\n".'§l§aCLICK TO PLAY');
            }
        }
    }
}
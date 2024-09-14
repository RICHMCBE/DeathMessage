<?php

declare(strict_types=1);

namespace RoMo\DeathMessage;

use pocketmine\event\EventPriority;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\plugin\PluginBase;

class DeathMessage extends PluginBase{
    protected function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvent(PlayerDeathEvent::class, function(PlayerDeathEvent $event) : void{
            $message = $event->getDeathMessage()->prefix("§g§l 월드 │ §r§f");
            foreach($event->getPlayer()->getWorld()->getPlayers() as $worldPlayer){
                $worldPlayer->sendMessage($message);
            }
            $event->setDeathMessage("");
        }, EventPriority::NORMAL, $this);
    }
}
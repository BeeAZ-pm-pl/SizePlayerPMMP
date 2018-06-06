<?php
namespace SizePLayer;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Entity;
use pocketmine\Server;
use pocketmine\Player;
class SizePLayer extends PluginBase{
    
    public $size = array();
    public function onEnable(){
        $this->getLogger()->info("§aEnabling plugin...");
        $this->getLogger()->notice("§bSizePlayer v1 succesfully enabled!!");
        $this->getServer()->getCommandMap()->register("size", new SizePLayerCommand($this));
    }
    
    public function respawn(PlayerRespawnEvent $event){
        $player = $event->getPlayer();
        if(!empty($this->size[$player->getName()])){
            $size = $this->size[$player->getName()];
            $player->setScale($size);
        }
    }
}

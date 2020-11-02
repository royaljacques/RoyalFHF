<?php
namespace royal;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use royal\commandes\Feed;
use royal\commandes\FeedHeal;
use royal\commandes\Furnace;
use royal\commandes\Heal;

class Main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
        $this->getServer()->getCommandMap()->register("commandes", new Feed("feed", $this));
        $this->getServer()->getCommandMap()->register("commandes", new Heal("heal", $this));
        $this->getServer()->getCommandMap()->register("commandes", new Furnace("furnace", $this));
        $this->getServer()->getCommandMap()->register("commandes", new FeedHeal("feedheal", $this));

    }
}

<?php


namespace royal\commandes;


use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use royal\Main;

class Heal extends PluginCommand
{
    public function __construct(string $name, Main $owner)
    {
        parent::__construct($name, $owner);
        $this->setDescription("/heal");
        $this->setUsage("/heal");
        $this->setAliases(["hl"]);
        $this->setPermission("heal.royal");
        $this->plugin = $owner;
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        if (!$this->testPermission($sender)){
            return true;
        }
        if (!$sender instanceof Player){
            $sender->sendMessage(TextFormat::GOLD . "tu ne peux pas utiliser le /heal de la console ");
            return true;
        }
        if($sender instanceof Player){
            if(!$sender->hasPermission("heal.royal")) {
                $sender->sendMessage("Tu n'as pas la permission de te guerris");
            }else{
                $sender->setHealth(20);
                $sender->sendMessage("§bTu as bien été §4guerris");
                return true;
            }

            return true;
        }
        return true;
    }
}
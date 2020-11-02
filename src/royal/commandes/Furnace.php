<?php
namespace royal\commandes;

use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\command\PluginCommand;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use royal\Main;

class Furnace extends PluginCommand implements Listener
{
    public function __construct(string $name, Main $owner)
    {
        parent::__construct($name, $owner);
        $this->setDescription("/furnace");
        $this->setUsage("/furnace");
        $this->setAliases(["fe"]);
        $this->setPermission("furnace.royal");
        $this->plugin = $owner;
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool
    {
        if (!$this->testPermission($sender)){
            return true;
        }
        if (!$sender instanceof Player){
            $sender->sendMessage(TextFormat::GOLD . "tu ne peux pas utiliser le /furnace de la console ");
            return true;
        }
        if($sender instanceof Player) {
            $item = $sender->getInventory()->getItemInHand();

            if($item->getId() == ITEM::DIAMOND_ORE){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::DIAMOND,0,$item->getCount()));
            }elseif($item->getId() == ITEM::IRON_ORE){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::IRON_INGOT,0,$item->getCount()));
            }elseif($item->getId() == ITEM::GOLD_ORE){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::GOLD_INGOT,0,$item->getCount()));
            }elseif($item->getId() == ITEM::QUARTZ_ORE){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::QUARTZ,0,$item->getCount()));
            }elseif($item->getId() == ITEM::COBBLESTONE){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::STONE,0,$item->getCount()));
            }elseif($item->getId() == ITEM::CLAY_BALL){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::BRICK,0,$item->getCount()));
            }elseif($item->getId() == ITEM::NETHERRACK){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::NETHERBRICK,0,$item->getCount()));
            }elseif($item->getId() == ITEM::SAND){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::GLASS,0,$item->getCount()));
            }elseif($item->getId() == ITEM::REDSTONE_ORE){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::REDSTONE,0,$item->getCount()));
            }elseif($item->getId() == ITEM::EMERALD_ORE){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::EMERALD,0,$item->getCount()));
            }elseif($item->getId() == ITEM::RAW_RABBIT) {
                $sender->getInventory()->setItemInHand(Item::get(ITEM::COOKED_RABBIT, 0, $item->getCount()));
            }elseif($item->getId() == ITEM::COAL_ORE){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::COAL,0,$item->getCount()));
            }elseif($item->getId() == ITEM::LOG) {
                $sender->getInventory()->setItemInHand(Item::get(ITEM::COAL, 0, $item->getCount()));
            }elseif($item->getId() == ITEM::RAW_PORKCHOP){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::COOKED_PORKCHOP,0,$item->getCount()));
            }elseif($item->getId() == ITEM::RAW_CHICKEN){
                $sender->getInventory()->setItemInHand(Item::get(ITEM::COOKED_CHICKEN,0,$item->getCount()));
            }else{
                $sender->sendMessage("Tu n'as pas un des items requis pour le /furnace ");
                return false;
            }
            $sender->sendMessage("tu vient de cuire ". $item->getCount(). "Items");
            return true;
        }
        return true;
    }

}
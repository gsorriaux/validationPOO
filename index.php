<?php

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

// $player1 = new Warrior('Guerrier');
// $player2 = new Mage('Magicien');
$player1 = new Mage('Magicien');
$player2 = new Archer('Archer');

// Characters attacking while both alive
while ($player1->isAlive() && $player2->isAlive()) {
    // First Character attacking the 2nd
    echo $player1->action($player2);
    // Check if target is alive
    if (!$player2->isAlive()) {
        echo '<br>';
        echo "$player2->pseudo est KO!";
        break;
    };
    echo '<br>';

    // Second Character attaking the first
    echo $player2->action($player1);
    // Check if target is alive
    if (!$player1->isAlive()) {
        echo '<br>';
        echo "$player1->pseudo est KO!";
        break;
    };
    echo '<br>';
    echo '<br>';
}

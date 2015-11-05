<?php

# This file is part of Shib DSCAN Tool.
#
# It uses a heavily modified version of DScan Reporter.
# it under the terms of the GNU Affero General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# DScan Reporter and Shib DSCAN Tool is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.
#



if (!defined('IN_DSCAN'))
{
    die('You should not be here.');    
}

// Create array of EVE ships as follows
//$ships = array('ship_name' => array('ship_type','ship_class'));
$ships = array('Bantam' => array('Frigate','Tackle'),
'Armageddon Navy Issue' => array('Battleship','Damage'),
'Dominix Navy Issue' => array('Battleship','Damage'),
'Megathron Navy Issue' => array('Battleship','Damage'),
'Raven Navy Issue' => array('Battleship','Damage'),
'Scorpion Navy Issue' => array('Battleship','Damage'),
'Tempest Fleet Issue' => array('Battleship','Damage'),
'Typhoon Fleet Issue' => array('Battleship','Damage'),
'Barghest' => array('Battleship','Damage'),
'Prospect' => array('Frigate','Miner'),
'Police Pursuit Comet' => array('Frigate','Tackle'),
'Astero' => array('Frigate','Support'),
'Punisher Kador Edition' => array('Frigate','Tackle'),
'Punisher Tash-Murkon Edition' => array('Frigate','Tackle'),
'Merlin Nugoeihuvi Edition' => array('Frigate','Tackle'),
'Merlin Wiyrkomi Edition' => array('Frigate','Tackle'),
'Incursus Aliastra Edition' => array('Frigate','Tackle'),
'Incursus Inner Zone Shipping Edition' => array('Frigate','Tackle'),
'Tristan Quafe Edition' => array('Frigate','Tackle'),
'Rifter Krusual Edition' => array('Frigate','Tackle'),
'Rifter Nefantar Edition' => array('Frigate','Tackle'),
'Mackinaw ORE Development Edition' => array('Exhumer','Miner'),
'Cambion' => array('Frigate','!BLINGY!'),
'Freki' => array('Frigate','!BLINGY!'),
'Malice' => array('Frigate','!BLINGY!'),
'Utu' => array('Frigate','!BLINGY!'),
'Gnosis' => array('Battlecruiser','Damage'),
'Chermoas' => array('Frigate','!BLINGY!'),
'Aliastra Catalyst' => array('Destroyer','Damage'),
'Inner Zone Shipping Catalyst' => array('Destroyer','Damage'),
'Intaki Syndicate Catalyst' => array('Destroyer','Damage'),
'InterBus Catalyst' => array('Destroyer','Damage'),
'Nefantar Thrasher' => array('Destroyer','Damage'),
'Quafe Catalyst' => array('Destroyer','Damage'),
'Inner Zone Shipping Imicus' => array('Frigate','Damage'),
'Sarum Magnate' => array('Frigate','Prober'),
'Silver Magnate' => array('Frigate','Prober'),
'Sukuuvestaa Heron' => array('Frigate','Prober'),
'Tash-Murkon Magnate' => array('Frigate','Prober'),
'Vherokior Probe' => array('Frigate','Prober'),
'Adrestia' => array('HAC','!BLINGY!'),
'Mimir' => array('HAC','!BLINGY!'),
'Vangel' => array('HAC','!BLINGY!'),
'Miasmos Amastris Edition' => array('Industrial','Hauler'),
'Miasmos Quafe Ultra Edition' => array('Industrial','Hauler'),
'Miasmos Quafe Ultramarine Edition' => array('Industrial','Hauler'),
'Whiptail' => array('Interceptor','!BLINGY!'),
'Etana' => array('Logistics','!BLINGY!'),
'Chameleon' => array('Recon','!BLINGY!'),
'Moracha' => array('Recon','!BLINGY!'),
'Council Diplomatic Shuttle' => array('Shuttle','Trash'),
'Interbus Shuttle' => array('Shuttle','Trash'),
'Leopard' => array('Shuttle','Trash'),
'Hecate' => array('Tactical Destroyer','Damage'),
'Jackdaw' => array('Tactical Destroyer','Damage'),);?>
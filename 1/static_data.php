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
//$ships = array('ship_name' => array('ship_type', 'ship_class'));
$ships = array('Bantam' => array('Frigate', 'Tackle'), 'Griffin' => array('Frigate', 'EWAR'), 'Epithal' => array('Industrial', 'Hauler'), 'Procurer' => array('Mining Barge', 'Miner'), 'Heron' => array('Frigate', 'Tackle'), 'Buzzard' => array('Covert Ops', 'Prober'), 'Rook' => array('Combat Recon', 'EWAR'), 'Nemesis' => array('S. Bomber', 'Bomber'), 'Tayra' => array('Industrial', 'Hauler'), 'Sabre' => array('Interdictor', 'Bubbler'), 'Iteron Mark V' => array('Industrial', 'Hauler'), 'Kryos' => array('Industrial', 'Hauler'), 'Raven' => array('Battleship', 'Damage'), 'Augoror Navy Issue' => array('Cruiser', 'Damage'), 'Slasher' => array('Frigate', 'Tackle'), 'Apocalypse' => array('Battleship', 'Damage'), 'Enyo' => array('Assault Frig.', 'Tackle'), 'Charon' => array('Freighter', 'Freighter'), 'Panther' => array('Black Ops', 'Black Ops'), 'Gila' => array('Cruiser', 'Damage'), 'Hulk' => array('Exhumer', 'Miner'), 'Vengeance' => array('Assault Frig.', 'Tackle'), 'Basilisk' => array('Logistics', 'Logistics'), 'Manticore' => array('S. Bomber', 'Bomber'), 'Crane' => array('Transport', 'Blockade Runner'), 'Succubus' => array('Frigate', 'Tackle'), 'Rupture' => array('Cruiser', 'Damage'), 'Lachesis' => array('Combat Recon', 'Heavy Tackle'), 'Dominix' => array('Battleship', 'Damage'), 'Anshar' => array('Jump Freighter', 'Jump Freighter'), 'Skiff' => array('Exhumer', 'Miner'), 'Pilgrim' => array('Force Recon', 'Support'), 'Thanatos' => array('Carrier', 'Carrier'), 'Drake' => array('Battlecruiser', 'Damage'), 'Impel' => array('Transport', 'Deep Space Transport'), 'Abaddon' => array('Battleship', 'Damage'), 'Wolf' => array('Assault Frig.', 'Tackle'), 'Ishkur' => array('Assault Frig.', 'Tackle'), 'Blackbird' => array('Cruiser', 'EWAR'), 'Executioner' => array('Frigate', 'Tackle'), 'Oneiros' => array('Logistics', 'Logistics'), 'Reaper' => array('Frigate', 'Trash'), 'Purifier' => array('S. Bomber', 'Bomber'), 'Tormentor' => array('Frigate', 'Tackle'), 'Echelon' => array('Frigate', 'Trash'), 'Nighthawk' => array('Cmd. Ship', 'Damage'), 'Stiletto' => array('Interceptor', 'Tackle'), 'Scythe Fleet Issue' => array('Cruiser', 'Damage'), 'Arazu' => array('Force Recon', 'Heavy Tackle'), 'Damnation' => array('Cmd. Ship', 'Booster'), 'Exequror' => array('Cruiser', 'T1 Logi'), 'Sentinel' => array('EWAR Frig.', 'Neuts'), 'Ark' => array('Jump Freighter', 'Jump Freighter'), 'Tempest' => array('Battleship', 'Damage'), 'Badger' => array('Industrial', 'Hauler'), 'Golem' => array('Marauder', 'Damage'), 'Punisher' => array('Frigate', 'Tackle'), 'Curse' => array('Combat Recon', 'Neuts'), 'Incursus' => array('Frigate', 'Tackle'), 'Scimitar' => array('Logistics', 'Logistics'), 'Nightmare' => array('Battleship', 'Damage'), 'Phobos' => array('Hictor', 'Bubbler'), 'Claymore' => array('Cmd. Ship', 'Booster'), 'Anathema' => array('Covert Ops', 'Prober'), 'Adrestia' => array('Cruiser', 'Damage'), 'Zealot' => array('HAC', 'Damage'), 'Ares' => array('Interceptor', 'Tackle'), 'Occator' => array('Transport', 'Deep Space Transport'), 'Kitsune' => array('EWAR Frig.', 'EWAR'), 'Cyclone' => array('Battlecruiser', 'Damage'), 'Jaguar' => array('Assault Frig.', 'Tackle'), 'Caracal' => array('Cruiser', 'Damage'), 'Vexor' => array('Cruiser', 'Damage'), 'Cerberus' => array('HAC', 'Damage'), 'Helios' => array('Covert Ops', 'Prober'), 'Paladin' => array('Marauder', 'Damage'), 'Broadsword' => array('Hictor', 'Bubbler'), 'Zephyr' => array('Shuttle', 'Trash'), 'Machariel' => array('Battleship', 'Damage'), 'Vigilant' => array('Cruiser', 'Damage'), 'Proteus' => array('Strat. Cruiser', 'Heavy Tackle'), 'Huginn' => array('Combat Recon', 'Heavy Tackle'), 'Crucifier' => array('Frigate', 'Tackle'), 'Augoror' => array('Cruiser', 'T1 Logi'), 'Ferox' => array('Battlecruiser', 'Damage'), 'Retribution' => array('Assault Frig.', 'Tackle'), 'Naga' => array('Battlecruiser', 'Damage'), 'Rokh' => array('Battleship', 'Damage'), 'Worm' => array('Frigate', 'Tackle'), 'Bustard' => array('Transport', 'Deep Space Transport'), 'Mackinaw' => array('Exhumer', 'Miner'), 'Coercer' => array('Destroyer', 'Tackle'), 'Redeemer' => array('Black Ops', 'Black Ops'), 'Claw' => array('Interceptor', 'Tackle'), 'Hyperion' => array('Battleship', 'Damage'), 'Cruor' => array('Frigate', 'Tackle'), 'Eos' => array('Cmd. Ship', 'Booster'), 'Hound' => array('S. Bomber', 'Bomber'), 'Bhaalgorn' => array('Battleship', 'Damage'), 'Talos' => array('Battlecruiser', 'Damage'), 'Eris' => array('Interdictor', 'Bubbler'), 'Miasmos' => array('Industrial', 'Hauler'), 'Kestrel' => array('Frigate', 'Tackle'), 'Ishtar' => array('HAC', 'Damage'), 'Scorpion' => array('Battleship', 'Damage'), 'Freki' => array('Frigate', 'Tackle'), 'Prowler' => array('Transport', 'Blockade Runner'), 'Astarte' => array('Cmd. Ship', 'Support'), 'Maller' => array('Cruiser', 'Damage'), 'Vulture' => array('Cmd. Ship', 'Booster'), 'Nyx' => array('Supercarrier', 'Supercap'), 'Sacrilege' => array('HAC', 'Damage'), 'Providence' => array('Freighter', 'Freighter'), 'Merlin' => array('Frigate', 'Tackle'), 'Devoter' => array('Hictor', 'Bubbler'), 'Exequror Navy Issue' => array('Cruiser', 'T1 Logi'), 'Hel' => array('Supercarrier', 'Supercap'), 'Rorqual' => array('Cap. Ind.', 'Capital'), 'Impairor' => array('Frigate', 'Tackle'), 'Noctis' => array('Salvaging', 'Trash'), 'Taranis' => array('Interceptor', 'Tackle'), 'Republic Fleet Firetail' => array('Frigate', 'Tackle'), 'Myrmidon' => array('Battlecruiser', 'Damage'), 'Obelisk' => array('Freighter', 'Freighter'), 'Guardian' => array('Logistics', 'Logistics'), 'Naglfar' => array('Dreadnought', 'Dread'), 'Keres' => array('EWAR Frig.', 'Tackle'), 'Stabber' => array('Cruiser', 'Damage'), 'Talwar' => array('Destroyer', 'Support'), 'Ibis' => array('Frigate', 'Trash'), 'Scythe' => array('Cruiser', 'T1 Logi'), 'Covetor' => array('Mining Barge', 'Miner'), 'Kronos' => array('Marauder', 'Damage'), 'Revelation' => array('Dreadnought', 'Dread'), 'Nomad' => array('Jump Freighter', 'Jump Freighter'), 'Hawk' => array('Assault Frig.', 'Tackle'), 'Phantasm' => array('Cruiser', 'Support'), 'Aeon' => array('Supercarrier', 'Supercap'), 'Raptor' => array('Interceptor', 'Tackle'), 'Heretic' => array('Interdictor', 'Bubbler'), 'Cynabal' => array('Cruiser', 'Damage'), 'Fenrir' => array('Freighter', 'Freighter'), 'Algos' => array('Destroyer', 'Support'), 'Thrasher' => array('Destroyer', 'Support'), 'Revenant' => array('Supercarrier', 'Supercap'), 'Muninn' => array('HAC', 'Damage'), 'Bestower' => array('Industrial', 'Hauler'), 'Leviathan' => array('Titan', 'Titan'), 'Venture' => array('Mining Frigate', 'Miner'), 'Utu' => array('Frigate', 'Damage'), 'Oracle' => array('Battlecruiser', 'Damage'), 'Deimos' => array('HAC', 'Damage'), 'Moa' => array('Cruiser', 'Damage'), 'Widow' => array('Black Ops', 'Black Ops'), 'Osprey Navy Issue' => array('Cruiser', 'Damage'), 'Nereus' => array('Industrial', 'Hauler'), 'Wyvern' => array('Supercarrier', 'Supercap'), 'Burst' => array('Frigate', 'Tackle'), 'Tengu' => array('Strat. Cruiser', 'Damage'), 'Caldari Navy Hookbill' => array('Frigate', 'Tackle'), 'Navitas' => array('Frigate', 'Tackle'), 'Imicus' => array('Frigate', 'Tackle'), 'Breacher' => array('Frigate', 'Tackle'), 'Erebus' => array('Titan', 'Titan'), 'Nidhoggur' => array('Carrier', 'Carrier'), 'Brutix' => array('Battlecruiser', 'Damage'), 'Imperial Navy Slicer' => array('Frigate', 'Tackle'), 'Chimera' => array('Carrier', 'Carrier'), 'Thorax' => array('Cruiser', 'Damage'), 'Omen' => array('Cruiser', 'Damage'), 'Flycatcher' => array('Interdictor', 'Bubbler'), 'Vagabond' => array('HAC', 'Damage'), 'Archon' => array('Carrier', 'Carrier'), 'Absolution' => array('Cmd. Ship', 'Damage'), 'Legion' => array('Strat. Cruiser', 'Damage'), 'Moros' => array('Dreadnought', 'Dread'), 'Ship Name' => array('Ship Type', 'Ship Class'), 'Typhoon' => array('Battleship', 'Damage'), 'Hoarder' => array('Industrial', 'Hauler'), 'Condor' => array('Frigate', 'Tackle'), 'Hurricane' => array('Battlecruiser', 'Damage'), 'Viator' => array('Transport', 'Blockade Runner'), 'Bellicose' => array('Cruiser', 'T1 Logi'), 'Rhea' => array('Jump Freighter', 'Jump Freighter'), 'Arbitrator' => array('Cruiser', 'Damage'), 'Harbinger' => array('Battlecruiser', 'Damage'), 'Atron' => array('Frigate', 'Tackle'), 'Prorator' => array('Transport', 'Blockade Runner'), 'Celestis' => array('Cruiser', 'Support'), 'Cheetah' => array('Covert Ops', 'Prober'), 'Sin' => array('Black Ops', 'Black Ops'), 'Mastodon' => array('Transport', 'Deep Space Transport'), 'Eagle' => array('HAC', 'Damage'), 'Sleipnir' => array('Cmd. Ship', 'Damage'), 'Phoenix' => array('Dreadnought', 'Dread'), 'Vargur' => array('Marauder', 'Damage'), 'Tornado' => array('Battlecruiser', 'Damage'), 'Onyx' => array('Hictor', 'Bubbler'), 'Sigil' => array('Industrial', 'Hauler'), 'Malediction' => array('Interceptor', 'Tackle'), 'Dragoon' => array('Destroyer', 'Support'), 'Catalyst' => array('Destroyer', 'Support'), 'Vigil' => array('Frigate', 'Tackle'), 'Falcon' => array('Force Recon', 'EWAR'), 'Prophecy' => array('Battlecruiser', 'Damage'), 'Osprey' => array('Cruiser', 'T1 Logi'), 'Retriever' => array('Mining Barge', 'Miner'), 'Rattlesnake' => array('Battleship', 'Damage'), 'Primae' => array('Industrial', 'Trash'), 'Megathron' => array('Battleship', 'Damage'), 'Mimir' => array('Cruiser', 'Damage'), 'Cormorant' => array('Destroyer', 'Support'), 'Ashimmu' => array('Cruiser', 'Support'), 'Rifter' => array('Frigate', 'Tackle'), 'Federation Navy Comet' => array('Frigate', 'Tackle'), 'Harpy' => array('Assault Frig.', 'Tackle'), 'Wreathe' => array('Industrial', 'Hauler'), 'Maulus' => array('Frigate', 'Tackle'), 'Hyena' => array('EWAR Frig.', 'Tackle'), 'Daredevil' => array('Frigate', 'Tackle'), 'Mammoth' => array('Industrial', 'Hauler'), 'Avatar' => array('Titan', 'Titan'), 'Vindicator' => array('Battleship', 'Damage'), 'Tristan' => array('Frigate', 'Tackle'), 'Ragnarok' => array('Titan', 'Titan'), 'Corax' => array('Destroyer', 'Support'), 'Orca' => array('Ind. Cmd.', 'Ind. Cmd.'), 'Crusader' => array('Interceptor', 'Tackle'), 'Velator' => array('Frigate', 'Trash'), 'Magnate' => array('Frigate', 'Tackle'), 'Crow' => array('Interceptor', 'Tackle'), 'Probe' => array('Frigate', 'Tackle'), 'Inquisitor' => array('Frigate', 'Tackle'), 'Apotheosis' => array('Shuttle', 'Trash'), 'Rapier' => array('Force Recon', 'Heavy Tackle'), 'Loki' => array('Strat. Cruiser', 'Heavy Tackle'), 'Maelstrom' => array('Battleship', 'Damage'), 'Armageddon' => array('Battleship', 'Damage'), 'Dramiel' => array('Frigate', 'Tackle'), 'Nestor' => array('Battleship', 'Support'), 'Confessor' => array('Tactical Destroyer', 'Damage'), 'Orthrus' => array('Cruiser', 'Damage'), 'Garmur' => array('Frigate', 'Tackle'), 'Svipul' => array('Tactical Destroyer', 'Damage'), 'Bowhead' => array('Transport', 'Hauler'), 'Brutix Navy Issue' => array('Battlecruiser', 'Damage'), 'Drake Navy Issue' => array('Battlecruiser', 'Damage'), 'Harbinger Navy Issue' => array('Battlecruiser', 'Damage'), 'Hurricane Fleet Issue' => array('Battlecruiser', 'Damage'), 'Prophecy Blood Raiders Addition' => array('Battlecruiser', 'Damage'), 'Ferox Guristas Edition' => array('Battlecruiser', 'Damage'), 'Brutix Serpentis Edition' => array('Battlecruiser', 'Damage'), 'Cyclone Thukker Tribe Edition' => array('Battlecruiser', 'Damage'), 
'Apocalypse Navy Issue' => array('Battleship', 'Damage'),
'Armageddon Navy Issue' => array('Battleship', 'Damage'),
'Dominix Navy Issue' => array('Battleship', 'Damage'),
'Megathron Navy Issue' => array('Battleship', 'Damage'),
'Raven Navy Issue' => array('Battleship', 'Damage'),
'Scorpion Navy Issue' => array('Battleship', 'Damage'),
'Tempest Fleet Issue' => array('Battleship', 'Damage'),
'Typhoon Fleet Issue' => array('Battleship', 'Damage'),
'Barghest' => array('Battleship', 'Damage'),
'Rattlesnake Victory Edition' => array('Battleship', 'Damage'),
'Abaddon Kador Edition' => array('Battleship', 'Damage'),
'Abaddon Tash-Murkon Edition' => array('Battleship', 'Damage'),
'Rokh Nugoeihuvi Edition' => array('Battleship', 'Damage'),
'Rokh Wiyrkomi Edition' => array('Battleship', 'Damage'),
'Dominix Quafe Edition' => array('Battleship', 'Damage'),
'Hyperion Aliastra Edition' => array('Battleship', 'Damage'),
'Hyperion Inner Zone Shipping Edition' => array('Battleship', 'Damage'),
'Megathron Quafe Edition' => array('Battleship', 'Damage'),
'Maelstrom Krusual Edition' => array('Battleship', 'Damage'),
'Maelstrom Nefantar Edition' => array('Battleship', 'Damage'),
'Orca ORE Development Edition' => array('Cap Indy.', 'Capital'),
'Rorqual ORE Development Edition' => array('Cap Indy.', 'Capital'),
'Revelation Sarum Edition' => array('Dreadnought', 'Capital'),
'Phoenix Wiyrkomi Edition' => array('Dreadnought', 'Capital'),
'Moros Interbus Edition' => array('Dreadnought', 'Capital'),
'Naglfar Justice Edition' => array('Dreadnought', 'Capital'),
'Omen Kador Edition' => array('Cruiser', 'Damage'),
'Omen Tash-Murkon Edition' => array('Cruiser', 'Damage'),
'Caracal Nugoeihuvi Edition' => array('Cruiser', 'Damage'),
'Caracal Wiyrkomi Edition' => array('Cruiser', 'Damage'),
'Thorax Aliastra Edition' => array('Cruiser', 'Damage'),
'Thorax Inner Zone Shipping Edition' => array('Cruiser', 'Damage'),
'Vexor Quafe Edition' => array('Cruiser', 'Damage'),
'Stabber Krusual Edition' => array('Cruiser', 'Damage'),
'Stabber Nefantar Edition' => array('Cruiser', 'Damage'),
'Coercer Blood Raiders Edition' => array('Destroyer', 'Damage'),
'Cormorant Guristas Edition' => array('Destroyer', 'Damage'),
'Catalyst Serpentis Edition' => array('Destroyer', 'Damage'),
'Thrasher Thukker Tribe Edition' => array('Destroyer', 'Damage'),
'Prospect' => array('Frigate', 'Miner'),
'Police Pursuit Comet' => array('Frigate', 'Tackle'),
'Astero' => array('Frigate', 'Support'),
'Punisher Kador Edition' => array('Frigate', 'Tackle'),
'Punisher Tash-Murkon Edition' => array('Frigate', 'Tackle'),
'Merlin Nugoeihuvi Edition' => array('Frigate', 'Tackle'),
'Merlin Wiyrkomi Edition' => array('Frigate', 'Tackle'),
'Incursus Aliastra Edition' => array('Frigate', 'Tackle'),
'Incursus Inner Zone Shipping Edition' => array('Frigate', 'Tackle'),
'Tristan Quafe Edition' => array('Frigate', 'Tackle'),
'Rifter Krusual Edition' => array('Frigate', 'Tackle'),
'Rifter Nefantar Edition' => array('Frigate', 'Tackle'),
'Mackinaw ORE Development Edition' => array('Exhumer', 'Miner'),
'Cambion' => array('Frigate', '!BLINGY!'),
'Freki' => array('Frigate', '!BLINGY!'),
'Malice' => array('Frigate', '!BLINGY!'),
'Utu' => array('Frigate', '!BLINGY!'),
'Gnosis' => array('Battlecruiser', 'Damage'),
'Chermoas' => array('Frigate', '!BLINGY!'),
'Aliastra Catalyst' => array('Destroyer', 'Damage'),
'Inner Zone Shipping Catalyst' => array('Destroyer', 'Damage'),
'Intaki Syndicate Catalyst' => array('Destroyer', 'Damage'),
'InterBus Catalyst' => array('Destroyer', 'Damage'),
'Nefantar Thrasher' => array('Destroyer', 'Damage'),
'Quafe Catalyst' => array('Destroyer', 'Damage'),
'Inner Zone Shipping Imicus' => array('Frigate', 'Damage'),
'Sarum Magnate' => array('Frigate', 'Prober'),
'Silver Magnate' => array('Frigate', 'Prober'),
'Sukuuvestaa Heron' => array('Frigate', 'Prober'),
'Tash-Murkon Magnate' => array('Frigate', 'Prober'),
'Vherokior Probe' => array('Frigate', 'Prober'),
'Adrestia' => array('HAC', '!BLINGY!'),
'Mimir' => array('HAC', '!BLINGY!'),
'Vangel' => array('HAC', '!BLINGY!'),
'Miasmos Amastris Edition' => array('Industrial', 'Hauler'),
'Miasmos Quafe Ultra Edition' => array('Industrial', 'Hauler'),
'Miasmos Quafe Ultramarine Edition' => array('Industrial', 'Hauler'),
'Whiptail' => array('Interceptor', '!BLINGY!'),
'Etana' => array('Logistics', '!BLINGY!'),
'Chameleon' => array('Recon', '!BLINGY!'),
'Moracha' => array('Recon', '!BLINGY!'),
'Council Diplomatic Shuttle' => array('Shuttle', 'Trash'),
'Interbus Shuttle' => array('Shuttle', 'Trash'),
'Leopard' => array('Shuttle', 'Trash'),);?>
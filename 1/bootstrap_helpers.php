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

function get_badge_class($count, $total)
{        
    $badge_class = null;
	
    $percent = ((float)$count)/$total;	
    
    if ($percent >= 0.50)
    {
        $badge_class = "badge-important";
    }                        
    else if ($percent >= 0.25)
    {		
        $badge_class = "badge-warning";                                       
    }
    else
    {		
        $badge_class = "badge-info";                        
    }
	
	return $badge_class;
}

?>
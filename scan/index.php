<?php
# This file is part of MAMBA Dscan Tool.
#
# DScan Reporter is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# DScan Reporter is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with DScan Reporter.  If not, see <http://www.gnu.org/licenses/>.
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MAMBA D-Scan Tool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
  </head> 
  
  <?php
  function rnatsort(&$a){
    natsort($a);
    $a = array_reverse($a, true);
}
function bitly_url_shorten($long_url, $access_token, $domain)
{
  $url = 'https://api-ssl.bitly.com/v3/shorten?access_token='.$access_token.'&longUrl='.urlencode($long_url).'&domain='.$domain;
  try {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 4);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $output = json_decode(curl_exec($ch));
  } catch (Exception $e) {
  }
  if(isset($output)){return $output->data->url;}
}
		//tinyurl 1.0
        define("IN_DSCAN", true);  
        // DB settings
        include 'config.php';
        
        // Extra functions
        include 'bootstrap_helpers.php';  
  
        // Page level "globals"
        // $ship_classes = array('ship_class' => count);
        // $ship_types = array('ship_type' => count);
        // $ship_names = array('ship_name' => count);          
        $ship_classes = array();
        $ship_types = array();
        $ship_names = array();
        $ship_total = 0;
        $igb_data = null;
        $dateReported = null;
        
        // Default mode is to view the submit form
        $isView = false;    
        
        // Are we trusted by the IGB?        
        if (array_key_exists('HTTP_EVE_TRUSTED', $_SERVER))
        {
            if ($_SERVER['HTTP_EVE_TRUSTED'] != 'Yes')
            { 
		
		
				
					
                // No, tell the user
                //die ('Please Use The IGB With Trust Enabled For All The Features');
            }

        }
        //else
        //{
			//die ('Please Use The IGB With Trust Enabled For All The Features');
            // No, tell the user
            // Echo "<p align='center'> <font color=Black  size='8pt'>Please Use The IGB With Trust Enabled For All The Features</font> </p>";
        //}     
        
        // Connect to the database
        $mysqli = new mysqli($CONFIG['db_host'], $CONFIG['db_user'], $CONFIG['db_passwd'], $CONFIG['db_name']);        
        if (mysqli_connect_errno())
        {
            die('Database error.');
        }        
        
        // Are we handling a dscan submission?
        if (isset($_POST['formSubmit']) && $_POST['formSubmit'] == "Submit")
        {        
            // Create array of EVE ships as follows
            // $ships = array('ship_name' => array('ship_type', 'ship_class'));          
            include 'static_data.php';
            
            // Get the dscan results and scrape out any HTML garbage
            $dscan = explode("\n", str_replace("\r", "", htmlspecialchars($_POST['inputDScan'])));            
            
            // Parse the DScan
            foreach ($dscan as $line)
            {
                // Line Format: playerGivenShipName [tab] shipName [tab] distFromScanner
                
                $tmp = explode("\t", $line);
                $shipName = $tmp[1];
                if (array_key_exists($shipName, $ships))
                {   
                    $ship_total++;
                    // Create ship type if it doesn't exist                    
                    if (array_key_exists($ships[$shipName][0], $ship_types))
                    {
                       // Increment it
                       $ship_types[$ships[$shipName][0]]++;                        
                    }
                    else
                    {
                        $ship_types[$ships[$shipName][0]] = 1;                        
                    }
                     
                    // Create class if it doesn't exist            
                    if (array_key_exists($ships[$shipName][1], $ship_classes))
                    {
                       // Increment it
                       $ship_classes[$ships[$shipName][1]]++;                     
                    }
                    else
                    {
                        $ship_classes[$ships[$shipName][1]] = 1;                        
                    }
                    
                    // Create name if it doesn't exist            
                    if (array_key_exists($shipName, $ship_names))
                    {
                       // Increment it
                       $ship_names[$shipName]++;
                    }
                    else
                    {
                        $ship_names[$shipName] = 1;
                    }
                }
            }
            // There has to be at least one ship in the dscan
            if ($ship_total <= 0)
            {
                Echo("You must have at least one ship on DScan.");
            }            
            
            // Sort the ship arrays
			rnatsort($ship_names);
			rnatsort($ship_types);
			rnatsort($ship_classes);
            
            // Convert ship arrays to JSON
            $ship_names_json = json_encode($ship_names);
            $ship_types_json = json_encode($ship_types);
            $ship_classes_json = json_encode($ship_classes);
            // Create the unique ID
            $sid = uniqid("", false);
             
            // Get ready to insert the data
            $stmt = $mysqli->prepare("INSERT INTO tbl_dscans (sid, ship_names, ship_types, ship_classes, igb_data, reportedAt, ship_total) ".
                                     "VALUES (?, ?, ?, ?, ?, ?, ?);");            
            $stmt->bind_param("sssssii", $sid, $ship_names_json, $ship_types_json, $ship_classes_json, $igb_json, time(), $ship_total);
           
            // Insert the dscan
            if ($stmt->execute())
            {
                // Redirect to display results    currentPage?id=uniqueID     
                header('Location: '.$_SERVER['PHP_SELF'].'?sid='.$sid);
                
                // Clean up
                $stmt->close(); 
                die();
            }
            else
            {
                // Clean up
                $stmt->close(); 
                die("Database error.");            
            }
        }
        
        // We're viewing a dscan result
        else if(isset($_GET['sid']) && $_GET['sid'] != null)
        {
            $isView = true;
			
			// Get the dscan info from the database
			$sid = $mysqli->real_escape_string($_GET['sid']);
            $res = $mysqli->query("SELECT ship_names, ship_types, ship_classes, igb_data, reportedAt, ship_total ".
                                  "FROM tbl_dscans ".
                                  "WHERE sid = '".$sid."';");
                 
			// Was the query successful?
            if ($res)
            {
				// Make sure we really got a result
                $dscanInfo = $res->fetch_array();				
				if ($dscanInfo)
				{                
					// Get the dscan info into arrays
					$ship_names = json_decode($dscanInfo[0]);                    				
					$ship_types = json_decode($dscanInfo[1]);
					$ship_classes = json_decode($dscanInfo[2]);
					$igb_data = json_decode($dscanInfo[3]);
					$dateReported = $dscanInfo[4];
                    $ship_total = $dscanInfo[5];
					
					// We're done                    
					$res->free();
				}
				else
				{
					$res->free();
					die("Database error."); 
				}
            }
            else
            {                    
                $res->free();
                die("Database error.");                
            }          
        }  
  ?>

  <body>

    <div class="navbar  navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php if ($isView) { echo $_SERVER['PHP_SELF']; } else { echo '#'; } ?>">
          <?php if ($isView) { echo ''; } else { echo 'MAMBA Scan Tool'; } ?>
          </a> 
          
          <!-- BEGIN: Hide if not in display mode -->  
            
            <p class="navbar-text" <?php if (!$isView) { echo ' style="display:none" '; }?>>At <?php echo gmdate("H:i", $dateReported);?> EVE Time</p>            
                   
            <!-- END: Hide if not in display mode -->     
             
        </div>
      </div>
    </div>    
       

    <div class="container">
    
    <!-- BEGIN: Submit form --> 
    <div class="row" <?php if ($isView) { echo ' style="display:none" '; }?>>
	
	<div align="center", width="100%">
	  <p align="center"><strong>Directions</strong></p>
	  <p align="center">Open Your D-Scan Window, Hit Ctrl+A To Select All, Hit Crtl+C To Copy, Paste Into The Box Below. </p>
	</div>
	<div class="span12">    
      <form class="form-horizontal" method="post">
              <div class="control-group">            
                <div class="controls">
                  <textarea id="inputDScan" name="inputDScan" rows="15" class="span8" placeholder="Paste your DScan here..."></textarea>
                </div>
              </div>          
              <div class="control-group">
                <div class="controls">              
                  <button type="submit" name="formSubmit" value="Submit" class="btn btn-primary btn-large">Submit</button>
                </div>
              </div>
            </form>
        </div>
    </div>
    
    <!-- END: Submit form -->

      <!-- BEGIN: Display DScan from DB -->
     
      <div class="row" <?php if (!$isView) { echo ' style="display:none" '; }?>>
	  <div align="center">
		<?php
		$actualurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		
		//gets the data from a URL  
function get_tiny_url($url)  {  
	$ch = curl_init();  
	$timeout = 5;  
	curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
	$data = curl_exec($ch);  
	curl_close($ch);  
	return $data;  
}

//test it out!
$new_url = get_tiny_url($actualurl);

//returns http://tinyurl.com/65gqpp
echo "   <button type='button' class='list-group-item'><a href='$new_url'>Copy the TinyUrl For This Scan</a></button>"
?>
	   </div>
		<div class="span4" color="#333333">
          <h2 align="center">Ships</h2>
            <div class="row">
                <table class="table span4 table-striped well">
                
                <?php
                    
                    foreach ($ship_names as $ship_name => $count)
                    {                               
                        echo '<tr><td class="span4"><b>'.$ship_name.'</b></td><td><span class="badge '.get_badge_class($count, $ship_total).'">'.
                             $count.'</span></td></tr>';                    
                    }     
                
                ?>
               
                </table> 
            </div>
          </div>
        <div class="span4">
          <h2 align="center">Classes</h2>
            <div class="row">   
                <table class="table span4 table-striped well">  
                <?php
                
                    foreach ($ship_types as $ship_type => $count)
                    {       
                        echo '<tr><td class="span4"><b>'.$ship_type.'</b></td><td><span class="badge '.get_badge_class($count, $ship_total).'">'.
                             $count.'</span></td></tr>';                    
                    }
                    
                ?>                
               </table> 
            </div>
       </div>
        <div class="span4">
          <h2 align="center">Summary</h2>        
           <div class="row">   
                <table class="table span4 table-striped well">
                
                <?php
                
                    foreach ($ship_classes as $ship_class => $count)
                    {  
                        echo '<tr><td class="span4"><b>'.$ship_class.'</b></td><td><span class="badge '.get_badge_class($count, $ship_total).'">'.
                             $count.'</span></td></tr>';                    
                    }
                    
                ?>  
                
               </table> 
            </div>
        </div>
		 </div>
		
     
      
     <!--  END: Display DScan from DB -->
      
      <hr>
       <footer>
        <p>&copy; 2015 <a onclick="CCPEVE.showInfo(1377,759440135)" href="#">Mr Twinkie</a>, <a onclick="CCPEVE.showInfo(2,875512489)" href="#">Black Serpent Technologies</a>. <br/>ISK Donations Accepted.<br/><a class="brand" href="<?php if ($isView) { echo $_SERVER['PHP_SELF']; } else { echo '#'; } ?>">
          <?php if ($isView) { echo 'Submit a New Scan'; } else { echo 'Shibdib Scan Tool'; } ?>
          </a> </p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>
<?php

/**
 * @author Chethan.N
 * @copyright 2013
 */

// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('UTC');

//event start time ( needs to be changed to required date ).
//give valid dates for proper results.
$startHour = 0;
$startMinute = 0;
$startSecond = 0;
$startMonth = 07;
$startDay = 12;
$startYear = 2014;

//event end time ( needs to be changed to required date ).
$endHour = 0;
$endMinute = 0;
$endSecond = 0;
$endMonth = 07;
$endDay = 12;
$endYear = 2015;

$start = mktime($startHour,$startMinute,$startSecond,$startMonth,$startDay,$startYear);
$end = mktime($endHour,$endMinute,$endSecond,$endMonth,$endDay,$endYear);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="MESMERiZE" />

	<title>Countdown Timer</title>
    <script>		
		today  = new Date();
		var starttime=today.getTime();
		var d = <?php
                $now = time();

                if ($now < $start)
                {
                    $dif = $start - $now;
                    echo $dif;
                }
                if ($now > $start)
                {
                    $dif = $end - $now;
                    echo $dif;
                }
                ?> *1000;
                
		function countdown (){
				today  = new Date();
				time = today.getTime();
				diff =  d + starttime - time;
				daysLeft = Math.floor(((diff) / (60*60*24)) / 1000);
				hoursLeft = Math.floor( diff / (1000*60*60) );
				minsLeft  = Math.floor( diff / (1000*60) );
				secsLeft  = Math.floor( diff / 1000 );
				
                dd = daysLeft;
				hh = hoursLeft - daysLeft  * 24;
				mm = minsLeft  - hoursLeft * 60;
				ss = secsLeft  - minsLeft  * 60;

                        cc =
                            dd + 'D: ' +
							hh + 'H: ' +
							mm + 'M: ' +
							ss + 'S' ;
                            if (dd == 0 && hh == 0 && mm  == 0 && ss ==0)
                            {
                                //edit this part to change the event that needs to be triggered when the event starts or ends.
                                //By default the page just reloads.
                            	window.location = document.URL;
                           	}
                            
				document.getElementById("date_div").innerHTML = cc;
                if ( dd < 0 )
                {
                    window.location = document.URL;
                }                      
}

        </script>
    
    
</head>

<body>
    <div style =" text-align:center;">
        <?php
        
        if ($now < $start)
        {   
            
        ?>
                <div style = " font-size: 60px;">The event starts in</div>
                <div id="date_div" style = "color:green; font-size: 80px;">
                    <script> countdown(); setInterval('countdown()',1000); </script>
                </div>
            
        <?php
        }
        else if ($now > $start && $now < $end)
        {
            
        ?>
                <div style = " font-size: 60px;">The event ends in</div>
                <div id="date_div" style = "color:red; font-size: 80px;">
                    <script> countdown(); setInterval('countdown()',1000); </script> 
                </div>
        
        
        
        <?php
        }
        else if ( $now > $end)
        {
        ?>
        
            <div style = " font-size: 60px;">The event ended on <?php echo date('Y-m-d H:i:s',$end); ?></div>
        <?php
        }
        else
        {
            echo"An error accured while during execution!!!";
        }
        ?>
    </div>
</body>
</html>

<?php
	$db = mysql_connect("localhost", "root", "");
	mysql_select_db("reservation" ,$db);
?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="calendar.css" media="all"/>
	<script>
			function goLastMonth(month, year){
				if(month == 1){
					--year;
					month = 13;
				}
				--month
				var monthstring = ""+month+"";
				var monthlength = monthstring.length;
				if(monthlength <= 1){
					monthstring = "0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
			}
			
			function goNextMonth(month, year){
				if(month == 12){
					++year;
					month = 0;
				}
				++month
				var monthstring = ""+month+"";
				var monthlength = monthstring.length;
				if(monthlength <= 1){
					monthstring = "0"+monthstring;
				}
				document.location.href = "<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
			}
		</script>
	</head>
	<body>
		<?php
		if(isset($_GET['day'])){
			$day = $_GET['day']; 
		}else{
			$day = date("j");
		}
		
		if(isset($_GET['month'])){
			$month = $_GET['month'];
		}else{
			$month = date("n");
		}
		
		if(isset($_GET['year'])){
			$year = $_GET['year'];
		}else{
			$year = date("Y");
		}
				
			$currentTimeStamp = strtotime("$year-$month-$day");
			$monthName = date("F", $currentTimeStamp);
			$numDays = date("t", $currentTimeStamp);
			$counter = 0;
		?>
		<?php
		if(isset($_GET['add'])){
			$title = $_POST['title'];
			$detail = $_POST['detail'];
			
			$eventdate = $month."/".$day."/".$year;
			
			$queryInsert = "INSERT INTO eventcalendar (title, detail, eventDate, dateAdded) values ('".$title."','".$detail."','".$eventdate."',now())";
			$resultInsert = mysql_query($queryInsert);
			if($resultInsert){
				echo "Event was added to Calendar.";
			}else{
				echo "Event failed to be added.";
			}
		}
		?>
		<table border='1'>
			<tr>
				<td>
	<input type='button' value='Prev' name='previousbutton' onclick="goLastMonth(<?php echo $month.",".$year?>)">
				</td>
				<td colspan='5'><?php echo $monthName.", ".$year; ?></td></td>
				<td>
	<input type='button' value='Next' name='nextbutton' onclick="goNextMonth(<?php echo $month.",".$year?>)">
				</td>
			</tr>
			
			<tr>
				<td width='50px'>Sun</td>
				<td width='50px'>Mon</td>
				<td width='50px'>Tue</td>
				<td width='50px'>Wed</td>
				<td width='50px'>Thu</td>
				<td width='50px'>Fri</td>
				<td width='50px'>Sat</td>
			</tr>
			<?php
				echo "<tr>";
				
				for($i = 1; $i < $numDays+1; $i++, $counter++){
					$timeStamp = strtotime("$year-$month-$i");
					if($i == 1){
						$firstDay = date("w", $timeStamp);
						for($j = 0; $j < $firstDay; $j++, $counter++){
							echo "<td>&nbsp;</td>";
						}//for($j = 0; $j < $firstDay; $j++, $counter++)
					}//if($i == 1)
					if($counter % 7 == 0){
						echo "</tr><tr>";
					}//if($counter % 7 == 0)
					$monthstring = $month;
					$monthlength = strlen($monthstring);
					$daystring = $i;
					$daylength = strlen($daystring);
					if($monthlength <= 1){
						$monthstring = "0".$monthstring;
					}
					if($daylength <= 1){
						$daystring = "0".$daystring;
					}
					$todaysDate = date("m/d/Y");
					$dateToCompare = $monthstring.'/'.$daystring.'/'.$year;
					echo "<td align='center' ";
					
					//highlighting today's date'
					if($todaysDate == $dateToCompare){
						echo "class='today'";
					}else{
						$sqlCount = "SELECT * FROM eventcalendar WHERE eventDate='".$dateToCompare."'";
						$eventNum = mysql_num_rows(mysql_query($sqlCount));
						if($eventNum >= 1){
							echo "class='event'";
						}
					}
					
					echo "><a title='View Event' href='".$_SERVER['PHP_SELF']."?month=".$monthstring."&day=".$daystring."&year=".$year."&v=true'>".$i."</a></td>";
				}//for($i = 1; $i < $numDays+1; $i++, $counter++)
				
				echo "</tr>";
			?>
		</table>
		<?php
		if(isset($_GET['v'])){
			echo "<a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'>Add Event</a>";
			if(isset($_GET['f'])){
				include ("eventform.php");
			}
			$sqlEvent = "SELECT * FROM eventcalendar WHERE eventDate='".$year."/".$day."/".$month."'";
			$resultEvent = mysql_query($sqlEvent);
			echo "<hr />";
			while($events = mysql_fetch_array($resultEvent)){
				echo "Title : ".$events['title']."<br />";
				echo "Detail : ".$events['detail']."<br />";
			}
		}
		?>
	</body>
</html>
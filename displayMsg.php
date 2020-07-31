<?php
	include 'dbcon.php';
	
	date_default_timezone_set("Asia/Kolkata");//time zone
    $date = date('d/m/Y h:i:s a', time());//current date and time
	
    $text1 = $_POST['text1'];//getting current session unique value from index page
	
		$query="select * from msg order by id asc"; //select query to select all data from the table msg
		$run=$con->query($query);
		while ($row=$run->fetch_array()):
	?>  
	<!-- display table data -->
		<div class="received <?php echo $row['username'] ?>">
			<span style="color: #fff;"><?php echo $row['username'] ?></span><br>
			<span style="font-size:10px;color:#fff;"><?php echo $row['sent'] ?></span><br><br>
			<span style="color: #fff;"><?php echo $row['msg'] ?></span>
			
		</div>
		<script type="text/javascript">
           var1 = "<?php echo $text1;?>"; //passing php value to javascript variable
        </script>
		<!-- Script for dynamic element css -->
		<script type="text/javascript">
          var x = document.getElementsByClassName(var1);
          var i;
          for (i = 0; i < x.length; i++) {
          x[i].style.backgroundColor = "#0974B0";
	      x[i].style.float = "right";
          }
        </script>	
		
<?php endwhile; ?>
	

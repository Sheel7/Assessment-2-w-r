<?php
  session_start();
  if(!$_SESSION["username"]){
    header("location: home.php");
  }
  $r = $_SESSION["username"]; // getting current session unique value
  include 'dbcon.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Group Chat</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<link  href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> <!--font awesome plugin for icons -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
<!-- Ajax to pass value without reloading every time -->
      <script>
       function auto_load(){
		  var val1 = $('#text1').val(); 
        $.ajax({
			type: 'POST',
          url: "displayMsg.php",
		  data: { text1: val1 },
          success: function(response){
            console.log(response);
             $("#chat-area").html(response);
             setTimeout(function(){
              auto_load();
             },1000);
          } 
        });
    }



    </script>

</head>
<body class="ng-scope"  onload="auto_load()">
<div class="wrapper">
    <div class="container">
	
	
        <div class="left">
            <div class="top">
              <span>Group Members</span>
            </div>
            <div class="peopleContainer">
                <ul class="people">
                <?php
                    $query="select * from users"; //selecting list of users registered for group chat
                    $run=$con->query($query);
                    while ($row=$run->fetch_array()) :
                ?>
                    <li class="person ">
                        <span class="name"><?php echo $row['username'] ?></span>
                    </li>
                <?php endwhile; ?>
                </ul>
				<div style="margin:30px 0px;padding:0px 10%;">
				  <a style="color:#CE2232;text-decoration:none;" href="logout.php">
            	   <i class="fa fa-sign-out"></i> LOGOUT
                  </a>
			    </div>
            </div>   
        </div>

        <div class="right">
            <div class="top">
			  <img src="images/yaali_logo.png" style="width:40px;margin-bottom:-12px;"><span> Yaali Group Chat</span>
			    <a style="float:right;color:#fff;text-decoration:none;margin-top:10px;" href="logout.php">
            	<i class="fa fa-user"></i>&nbsp; Welcome &nbsp;<?php echo $r; ?> ,</a>
			</div>
			  <input type="hidden" id="text1"  value="<?php echo $r; ?>"> <!-- hidden field that holds unique session value need to be passed via ajax to another page -->
              <div class="chat-area" id="chat-area">
			
               
				<div class="received"></div>
              
              </div>
              <div class="client-text">
                <form method="POST" accept="index.php">
                   <input class="msgBox" name='msgBox' type="text" placeholder="Type here..."/> <!-- message typing input field -->
                   <input class="submitbtn" name="submitbtn" type="submit" value=""/> <!-- send message button -->
                </form>
                <?php 
				
				//on submit inserting data to the table
                  if(isset($_POST['submitbtn'])){
					  date_default_timezone_set("Asia/Kolkata");//time zone
                      $date = date('d/m/Y h:i:s a', time()); // current time
                    $username=$_SESSION["username"];
                    $msg=$_POST['msgBox'];

                    $query="insert into msg(username,msg,sent) values('$username','$msg','$date')";
                    $run=$con->query($query);
                  }
                ?>
              </div>
        </div>

    </div>
</div>


<!-- Script to place the overflow chat scroll bar at the bottom until user scrolls -->
<script type='text/javascript'>
var scrolled = false;
function updateScroll(){
    if(!scrolled){
        var element = document.getElementById("chat-area");
        element.scrollTop = element.scrollHeight;
    }
	
}
setInterval(updateScroll,100);
$("#chat-area").on('scroll', function(){
    scrolled=true;
});
</script>

</body>
</html>




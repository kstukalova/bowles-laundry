<!DOCTYPE html>
<head>
	<title>Bowles Laundry</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="icon" href="images/bowles_icon.png">

<style>
td {
    padding: 5px;
}
</style>
</head>

<body>
<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
	/*if (!isset($_SESSION)) {
        header('Location: error.php');
		die();
	}*/
	#get credentials for login
	$credentials = parse_ini_file("/etc/config.ini");
	# connect to database
	$link = mysqli_connect("blaundry.cfhs23ywwxpw.us-west-1.rds.amazonaws.com", 'laundromat', 'bowleshalllaundry', 'blaundry');
	$user = 'katya';
	#$user = $_SESSION['user'];
	if ($link === false) {
		?> window.stop(); <?php
	}
	$query_string = "SELECT `user`, `time`, `current` FROM `machine_queue` WHERE `machine_name`=";

?>
<div style="float:right;margin-top:5px; margin-right:5px">
<a href="popupex.html" onclick="return popitup('help.html')">
<img src="images/question_mark.png" alt="Help"></div></a>
	<div class="header">
  <h1>Want to do laundry?</h1>
  <p>Check what machines are free first!</p>
  </div>

  <div class="container-fluid">
  <div class="row">
    <div class="col-sm-6"><h3>Washers</h3>
    	<div class="row">
    		<div class="col-sm-6">Left Washer
    			<table>
    			<?php
    				$current_query = $query_string . "'lwasher' ORDER BY `time` ASC;";
    				$result = mysqli_query($link, $current_query);
                    $first = 1;
    				while($current = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        if ($current[2]) {
                            $first -=1;
                            print("<tr>" . "<td><img src='images/wash.png'></td>"
                                . "<td>" . $current[0] . "</td>"
                                ."<td><img onclick='javascript:delete_user(`lwasher`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>"
                                ."</tr>");
                        }
                        else if ($first==1) {
                            $first -= 1;
                            print("<tr>" . "<td><img src='images/wash.png' style='visibility:hidden'></td>"
                                . "<td>" . $current[0] . "</td>"
                                ."<td><img onclick='javascript:delete_user(`lwasher`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>"
                                ."<td><img onclick='javascript:make_current(`lwasher`, `"
                                .$current[0]."`,`".$user."`)' style='cursor:pointer;' src='images/go.png'></td>"
                                ."</tr>");
                        }
                        else {
                            print("<tr>" . "<td><img src='images/wash.png' style='visibility:hidden'></td>"
                                . "<td>" . $current[0] . "</td>" 
                                ."<td><img onclick='javascript:delete_user(`lwasher`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>".
                                "</tr>");
                        }
    				}
    			?>
    			</table>
    		</div>
    		<div class="col-sm-6">Right Washer
    			<table>
                <?php
                    $current_query = $query_string . "'rwasher' ORDER BY `time` ASC;";
                    $result = mysqli_query($link, $current_query);
                    $first = 1;
                    while($current = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        if ($current[2]) {
                            $first -=1;
                            print("<tr>" . "<td><img src='images/wash.png'></td>"
                                . "<td>" . $current[0] . "</td>"
                                ."<td><img onclick='javascript:delete_user(`rwasher`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>"
                                ."<td></td>"
                                ."</tr>");
                        }
                        else if ($first==1) {
                            $first -= 1;
                            print("<tr>" . "<td><img src='images/wash.png' style='visibility:hidden'></td>"
                                . "<td>" . $current[0] . "</td>"
                                ."<td><img onclick='javascript:delete_user(`rwasher`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>"
                                ."<td><img onclick='javascript:make_current(`rwasher`, `"
                                .$current[0]."`,`".$user."`)' style='cursor:pointer;' src='images/go.png'></td>"
                                ."</tr>");
                        }
                        else {
                            print("<tr>" ."<td><img src='images/wash.png' style='visibility:hidden'></td>"
                                . "<td>" . $current[0] . "</td>" 
                                ."<td><img onclick='javascript:delete_user(`rwasher`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>"
                                ."<td></td>"
                                ."</tr>");
                        }
                    }
                ?>
                </table>
    		</div>
    	</div>
    </div>
    <div class="col-sm-6"><h3>Dryers</h3>
    	<div class="row">
		    <div class="col-sm-6">Left Dryer
		    	<table>
                <?php
                    $current_query = $query_string . "'ldryer' ORDER BY `time` ASC;";
                    $result = mysqli_query($link, $current_query);
                    $first = 1;
                    while($current = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        $first -=1;

                        if ($current[2]) {
                            $first -=1;
                            print("<tr>" . "<td><img src='images/wash.png'></td>"
                                . "<td>" . $current[0] . "</td>"
                                ."<td><img onclick='javascript:delete_user(`ldryer`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>"
                                ."</tr>");
                        }
                        else if ($first==1) {
                            $first -= 1;
                            print("<tr>" . "<td><img src='images/wash.png' style='visibility:hidden'></td>"
                                . "<td>" . $current[0] . "</td>"
                                ."<td><img onclick='javascript:delete_user(`ldryer`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>"
                                ."<td><img onclick='javascript:make_current(`ldryer`, `"
                                .$current[0]."`,`".$user."`)' style='cursor:pointer;' src='images/go.png'></td>"
                                ."</tr>");
                        }
                        else {
                            print("<tr>"."<td><img src='images/wash.png' style='visibility:hidden'></td>"
                                ."<td>" . $current[0] . "</td>"
                                ."<td><img onclick='javascript:delete_user(`ldryer`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>".
                                "</tr>");
                        }
                    }
                ?>
                </table>
		    </div>
		    <div class="col-sm-6">Right Dryer
		    	<table>
                <?php
                    $current_query = $query_string . "'rdryer' ORDER BY `time` ASC;";
                    $result = mysqli_query($link, $current_query);
                    $first = 1;
                    while($current = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        if ($current[2]) {
                            print("<tr>" . "<td><img src='images/wash.png'></td>"
                                . "<td>" . $current[0] . "</td>"
                                ."<td><img onclick='javascript:delete_user(`rdryer`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>"
                                ."</tr>");
                        }
                        else if ($first==1) {
                            $first -= 1;
                            print("<tr>" . "<td><img src='images/wash.png' style='visibility:hidden'></td>"
                                . "<td>" . $current[0] . "</td>"
                                ."<td><img onclick='javascript:delete_user(`rdryer`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>"
                                ."<td><img onclick='javascript:make_current(`rdryer`, `"
                                .$current[0]."`,`".$user."`)' style='cursor:pointer;' src='images/go.png'></td>"
                                ."</tr>");
                        }
                        else {
                            print("<tr>" . "<td><img src='images/wash.png' style='visibility:hidden'></td>"
                                ."<td></td>". "<td>" . $current[0] . "</td>" .
                                "<td><img onclick='javascript:delete_user(`rdryer`, `"
                                .$current[0]."`,`".$user."`,`".$current[2]."`)' style='cursor:pointer;' src='images/x.png'></td>".
                                "</tr>");
                        }
                    }
                ?>
                </table>
		    </div>
	  	</div>
    </div>
  </div>
  </div>
  
<script>
	function popitup(url) {
		newwindow=window.open(url,'name','height=500,width=450');
		if (window.focus) {newwindow.focus()}
		return false;
	}
	function delete_user(washer, user_to_delete, current_user, current) {
		if (user_to_delete != current_user) {
			alert("You can't delete someone else! :(");
		}
		else {
			if (!window.confirm("Are you sure you want to remove yourself from the queue?")) {
				return false;
			}
			$.ajax({
				type: 'POST',
				url: 'delete_from_list.php',
				data: {user : user_to_delete, machine: washer, current: current},
				success: function(e){
					console.log(e);
				}
			});
		}
	}
    function make_current(washer, make_current, current_user) {
        if (make_current != current_user) {
            alert("You can't put someone else's clothes in!");
        }
        else {
            if (!window.confirm("Are you sure your clothes are in?")) {
                return false;
            }
            $.ajax({
                type: 'POST',
                url: 'make_current.php',
                data: {user : make_current, machine: washer, current: current_user},
                success: function(e){
                    location.reload();
                },
            });
        }
    }
</script>
</body>

</html>
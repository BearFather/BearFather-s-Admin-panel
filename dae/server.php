<?php

require('lib/function.php');
require('lib/MinecraftRcon.class.php');
require('settings.php');
if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0))) {
        $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
echo "Socket created \n"; // Bind the source address if
$bind=0;
while ($bind < 10){
if(!socket_bind($sock, MQ_SERVER_ADDR , 5000) ) {
	if ($bind==9){die("Could not bind socket : [$errorcode] $errormsg \n");}
        $errorcode = socket_last_error();
	$errormsg = socket_strerror($errorcode);
	echo "sleeping for bind. Count: $bind \n";
	sleep(10);
$bind++;}
else{echo "Socket bind OK \n";$bind=11;}
}

if(!socket_listen ($sock , 10)) {
        $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Could not listen on socket : [$errorcode] $errormsg \n");
}
echo "Socket listen OK \n";
echo "Waiting for incoming connections...\n";
while (true) {
//Accept incoming connection - This is a blocking call $client =
$client=socket_accept($sock);

//display information about the client who is connected
if(socket_getpeername($client , $address , $port)) {
        echo "Client $address : $port is now connected to us.\n";
}

//read data from the incoming socket
$input = socket_read($client, 1024000);
$list=explode(":",$input);
if ($list[0]!=$psw){echo "bad password\n";swrite("Bad Password");scl();}
else{
  if ($list[1] == "quit"){
	socket_write($client,"Closing");
	echo "goodbye";
	socket_close($client);
	socket_close($sock);
	break;
  }
  elseif (is_callable($list[1])) {
	if ($list[1]=="update"){$list[2]=substr($input,12);}
	$list[1]($list[2]);
  }
  else{
	$response = "can't find function $input";
	echo "tried: $list[0]\n";
	// Display output  back to client
	socket_write($client, $response);
	socket_close($client);
  }
}
}
?>


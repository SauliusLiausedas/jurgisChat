<?php

use App\Jurgis;
// use App\Messages;
require '../vendor/autoload.php';
require '../Messages.php';

$jurgis = new Jurgis();

if (isset($_GET['userMessage'])) {
    $messages = new Messages();
    $messages->saveMessage($_GET['userMessage']);
    $response = $jurgis->responds($_GET['userMessage']);
    echo json_encode(['message' => $response]);
    $messages->saveMessage($response);
    return;
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurgis Chat</title>
    <link href="./style/style.css" type="text/css" rel="stylesheet" />
    <script src="./js/script.js"></script>
</head>
<body>
    <div class="chatbox">
        <div id="chatMessages"></div>
        <div class="chatInputs">
            <input type="text" id="messageInput" />
            <button id="messageSubmit"> Siųsti </button>
        </div>
    </div>
</body>
</html>
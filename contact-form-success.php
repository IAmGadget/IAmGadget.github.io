<?php


echo $_POST['name'];

//=======================================================================================================
// Create new webhook in your Discord channel settings and copy&paste URL
//=======================================================================================================

$webhookurl = "https://discord.com/api/webhooks/759837924077469787/unDo-uiO-AkFLDZdGHeM-fP65g5gSBe1Jq9FN9PvnuR7aNkFTQUR0VOb_MGMBfoeeDE-";

//=======================================================================================================
// Compose message. You can use Markdown
// Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
//========================================================================================================

$timestamp = date("c", strtotime("now"));

$json_data = json_encode([
    // Message
    "content" => "Hello World! This is message line ;) And here is the mention, use userID <@12341234123412341>",
    
    // Username
    "username" => "Website",

    // Avatar URL.
    // Uncoment to replace image set in webhook
    //"avatar_url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=512",

    // Text-to-speech
    "tts" => false,

    // File upload
    // "file" => "",

    // Embeds Array
    "embeds" => [
        [
            // Embed Title
            "title" => "Form information",

            // Embed Type
            "type" => "rich",

            // Embed Description
            "description" => "A user has sent a contact form!",

            // URL of title link
            "url" => "https://iamgadget.tk",

            // Timestamp of embed must be formatted as ISO8601
            "timestamp" => $timestamp,

            // Embed left border color in HEX
            "color" => hexdec( "3366ff" ),

            // Footer
            "footer" => [
                "text" => "GitHub.com/Mo45",
                "icon_url" => "https://iamgadget.tk/kittens.png"
            ],

            // Image to send
            "image" => [
                "url" => ""
            ],

            // Thumbnail
            //"thumbnail" => [
            //    "url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=400"
            //],

            // Author
            "author" => [
                "name" => "Gadget",
                "url" => "https://iamgadget.tk"
            ],

            // Additional Fields array
            "fields" => [
                // Field 1
                [
                    "name" => $email,
                    "value" => $message,
                    "inline" => false
                ]//,
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
echo $response;
curl_close( $ch );


<?php
    session_start();

    $config = require 'config.php';
    $redirect_uri = $config['redirect_uri'];
    $discord_client_id = $config['discord_client_id'];
    $discord_client_secret = $config['discord_client_secret'];
    $discord_redirect_uri = $config['discord_redirect_uri'];

    
    
    $data = [
        'client_id' => $discord_client_id,
        'client_secret' => $discord_client_secret,
        'grant_type' => 'authorization_code',
        'code' => $_GET['code'],
        'redirect_uri' => $discord_redirect_uri,
        'scope' => 'identify%20guids',
    ]; 

    $data_string = http_build_query($data);
    $discord_token = 'https://discord.com/api/oauth2/token';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $discord_token);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $response = json_decode(curl_exec($ch), true);
    


    $access_token = $response['access_token'];
    $discord_users_uri = "https://discord.com/api/users/@me";
    $header = array("Authorization: Bearer $access_token", "Content-type: application/x-www-form-urlencoded");

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_URL, $discord_users_uri);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $response = json_decode(curl_exec($ch), true);

    

    $_SESSION["Login"] = $response['username'];
    header('Location: '.$redirect_uri);
    exit();

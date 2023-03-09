# Simple Discord OAuth

<img src="https://img.shields.io/badge/stabel-1.0-blue"/> <img src="https://img.shields.io/badge/PHP->=5.6-blue"/> <img src="https://img.shields.io/badge/license-MIT-green"/>

## Requirements
* PHP >= 5.6

## Installation

You can install this library with git:

`git clone https://github.com/AnvilM/Discord-auth-PHP.git`


## Preset

* **Discord Application** 

	First you need to create a new Discord Application or select an existing one
	`https://discord.com/developers/applications/`

* **Copy**

	Next you need to go to you't Discord Application settings and copy `client_id` , `client_secret`
	
	And add new Reqeust `http://you'r_site/DiscordAuth/Auth.php`


* **Config**


	Next, you should in the file `config.php` replace *discord_client_id*, *discord_client_secret*, *discord_redirect_uri*

	And install ANY *redirect_uri*


* **Example**
```php
<?php
return [
	'redirect_uri' => '/account.php',
	'discord_client_id' => '123456789',
	'discord_client_secret' => '3jowAIJwa3giONNAOwndvs',
	'discord_redirect_uri' => 'http://localhost/DiscordAuth/Auth.php',
	];
?>
```



Using
---------

```html
<a href="https://discord.com/oauth2/authorize?client_id=YUOR_DISCORD_CLIENT_ID&redirect_uri=YOR_DISCORD_REDIRECT_URI&response_type=code&scope=identify%20guilds">SignUp</a>
```

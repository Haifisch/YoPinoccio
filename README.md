Yo, Pinoccio
==========

This is what happens when you find out Yo has an API.

What it does
============

When you set this up, you will be able to send a "Yo" to a Yo id and it will toggle your assigned scout's LED or execute any ScoutScript command you want, the if all goes well on the Pinoccio API side, it will Yo you back as confirmation of the executed command. (Note; we are rate limited to 1 Yo per minute, I believe.)

This is written in PHP, but should probably written in nodejs, cause PHP isn't exactly user friendly.


How to setup
============

1. Clone this repo and put the PHP files onto a PHP server accessible outside your own network
2. Login to the dev center with Yo, http://dev.justyo.co/
3. Create a new API account setting the callback URL to the "yo.php" file on your server
4. Open the "yo.php" file and put your API account's token in the token variable, along with your Pinoccio login and troop/scout ids
5. Send a Yo to your API account

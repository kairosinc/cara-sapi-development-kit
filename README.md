Start Here
==========

Cara Developer's Kit is a complete Symfony2 component PHP project with tools, libraries, documentation and console
utilities to make it easy for any developer, tinkerer or innovator to start building amazing products using Cara.
Cara technology is powerful, but it isn't just for PhD's. Cara was created for the everyday inventor and innovator
that wants to make something amazing. Our approach is in taking complex algorithms and technology locked away in
research universities and making it universally accessible to everyone. The Cara Developer's Kit is easy to use and
is a one stop you can hook it directly into your existing PHP application.


Installation Instructions
=========================

Step 1. - Install Cara Developer's Kit

    ~ Open Terminal Application
    ~ git clone https://github.com/immersivelabs/sapi-devkit.git
    ~ cd sapi-devkit

Step 2. Download PHP Composer

    ~ curl -s https://getcomposer.org/installer | php

Step 3. Install Composer

If installer times out just run the same command again.

    ~ php composer.phar install
    or
    ~ php composer update nothing

Step 4. You are ready. For a list of available commands run:

    ~ bin/console list

CARA Developers Kit Commands
============================

With the CARA Developers Kit installed you can interact with our API directly.
To run the devkit type:

    ~ bin/console [COMMAND] [ARGUMENTS]

    Available commands:
      help                     Displays help for a command
      list                     Lists commands
    analytics
      analytics:get_raw        Get raw impressions
    camera
      camera:get_all           Get list of cameras
      camera:get_by_key        Find camera by key
      camera:update            Update camera information
    user
      user:get_access_token    Get an access token
      user:get_info            Get info for current user
		

user:get_access_token
=====================

    user:get_access_token [--clientId="..."] [--clientSecret="..."] [--username="..."] [--password="..."] [--scopes="..."]

		Options:
		 --clientId            Provided on the website. Once you sign up as a developer, this information appears on your profile.
		 --clientSecret        Provided on the website. Once you sign up as a developer, this information appears on your profile.
		 --username            Email address for your account
		 --password            Password
		 --scopes              Can be "app", "user", "analytic" or a combination of those.
		 --help (-h)           Display this help message.
		 --quiet (-q)          Do not output any message.
		 --verbose (-v)        Increase verbosity of messages.
		 --version (-V)        Display this application version.
		 --ansi                Force ANSI output.
		 --no-ansi             Disable ANSI output.
		 --no-interaction (-n) Do not ask any interactive question.

user:get_info
=============

    user:get_info [--clientId="..."] [--clientSecret="..."] [--username="..."] [--password="..."]

		Options:
		 --clientId            Client ID
		 --clientSecret        Client Secret
		 --username            Username
		 --password            Password
		 --help (-h)           Display this help message.
		 --quiet (-q)          Do not output any message.
		 --verbose (-v)        Increase verbosity of messages.
		 --version (-V)        Display this application version.
		 --ansi                Force ANSI output.
		 --no-ansi             Disable ANSI output.
		 --no-interaction (-n) Do not ask any interactive question.

camera:get_all
==============
    camera:get_all [--clientId="..."] [--clientSecret="..."] [--username="..."] [--password="..."]

		Options:
		 --clientId            Client ID
		 --clientSecret        Client Secret
		 --username            Username
		 --password            Password
		 --help (-h)           Display this help message.
		 --quiet (-q)          Do not output any message.
		 --verbose (-v)        Increase verbosity of messages.
		 --version (-V)        Display this application version.
		 --ansi                Force ANSI output.
		 --no-ansi             Disable ANSI output.
		 --no-interaction (-n) Do not ask any interactive question.	 

camera:get_by_key
=================

    camera:get_by_key [--clientId="..."] [--clientSecret="..."] [--username="..."] [--password="..."] [--cameraKey="..."]

		Options:
		 --clientId            Client ID
		 --clientSecret        Client Secret
		 --username            Username
		 --password            Password
		 --cameraKey           Camera Key
		 --help (-h)           Display this help message.
		 --quiet (-q)          Do not output any message.
		 --verbose (-v)        Increase verbosity of messages.
		 --version (-V)        Display this application version.
		 --ansi                Force ANSI output.
		 --no-ansi             Disable ANSI output.
		 --no-interaction (-n) Do not ask any interactive question.

camera:update
=============

    camera:update [--clientId="..."] [--clientSecret="..."] [--username="..."] [--password="..."] [--cameraKey="..."] [--deviceId="..."] [--cameraPath="..."] [--displayName="..."] [--extraDescription="..."] [--host="..."]

		Options:
		 --clientId            Client ID
		 --clientSecret        Client Secret
		 --username            Username
		 --password            Password
		 --cameraKey           Camera Key
		 --deviceId            Camera device id to use
		 --cameraPath          Camera Path
		 --displayName         Display Name
		 --extraDescription    Extra Description
		 --host                Host
		 --help (-h)           Display this help message.
		 --quiet (-q)          Do not output any message.
		 --verbose (-v)        Increase verbosity of messages.
		 --version (-V)        Display this application version.
		 --ansi                Force ANSI output.
		 --no-ansi             Disable ANSI output.
		 --no-interaction (-n) Do not ask any interactive question.


analytics:get_raw
=================

    analytics:get_raw [--clientId="..."] [--clientSecret="..."] [--username="..."] [--password="..."] [--cameraKey="..."] [--from="..."] [--to="..."] [--gender="..."] [--age="..."] [--page="..."]


		Options:
		 --clientId            Client ID
		 --clientSecret        Client Secret
		 --username            Username
		 --password            Password
		 --cameraKey           Camera Key
		 --from                Date From (YYYY-MM-DD HH:MM:SS) - Defaults to 1 week from now (default: "2013-03-08 18:14:47")
		 --to                  Date To (YYYY-MM-DD HH:MM:SS) - Defaults to NOW (default: "2013-03-15 18:14:47")
		 --gender              Gender unknown, male, female
		 --age                 Age unknown, child, young adult, adult, senior
		 --page                Request pagination
		 --help (-h)           Display this help message.
		 --quiet (-q)          Do not output any message.
		 --verbose (-v)        Increase verbosity of messages.
		 --version (-V)        Display this application version.
		 --ansi                Force ANSI output.
		 --no-ansi             Disable ANSI output.
		 --no-interaction (-n) Do not ask any interactive question.

Smarty Leopard System
=============

* * *
*  [What is a Leopard?](#what-is-a-Leopard "What is a Leopard?")
*  [How Leopards work on this script?](#how-Leopards-work-on-this-script "How Leopards work on this script?")
*  [How to create my first plugin?](#how-to-create-my-first-plugin "How to create my first plugin?")
*  [How to create new Leopard?](#how-to-create-new-Leopard "How to create new Leopard?")
* * *

### What is a Leopard? ###

> In computer programming, the term Leoparding covers a range of techniques used to alter or augment the behavior of an operating system, of applications, or of other software components by intercepting function calls or messages or events passed between software components. Code that handles such intercepted function calls, events or messages is called a “Leopard”.

### How Leopards work on this script? ###

The Leopard system work into two parts:

        Leopard

        The Leopards can trigger an Leopard function to a precise location of the site
        Leopard function

        what are the possible action that can be run for each Leopard

### How to create my first plugin? ###

All plugins are found in the /plugins folder, which is at the root of the script main folder.
Each modules has its own sub-folder inside the /plugins folder: /paypal, /newpage, etc.

The name of the php file of the plugin should be like this: *.plugin.php
Exemple: /plugins/newpage/myplugin.plugin.php

This example allows you to create a new page:

<?php

/*
Plugin Name: My first plugin
Alias: first-plugin
Plugin URI: http://your-url.com/your-plugin.html
Description: This is the short description of your plugin
Version: 1.0
Author: Your Name
Author URI: http://www.your-website.com/
*/

//set plugin id as file name of plugin
$plugin_id = basename(__FILE__);

//some plugin data
$data['name'] = "My first plugin";
$data['author'] = "Your Name";
$data['url'] = "http://www.your-website.com/";

//register plugin data
register_plugin($plugin_id, $data);


This completes the example of creation of plugin.
Obviously, it will write all the other Leopards to make your script interesting

### How to create new Leopard? ###

All Leopards are declared in the file: /libs/startup.php
To create a new Leopard, you must add it to the array of $Leopard->set_Leopards function.
Exemple:

$leo->set_leos(
	array(
		'action',  
		'new_page',
		'my_new_leo' // My new leo
	));


Once the Leopard state, you can add the condition test your Leopard to the desired location, like this:

if ($leo->leo_exist('my_new_leo'))
	$leo->execute_leo('my_new_leo');


### Using the Leopard in a plugin ###

add_leo('new_page','plugin_function');

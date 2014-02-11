<?php
/*
* Script: index.php
* 	Main controller file for Smarty Leopard System
*
* License:
*	 GPL v3 or above
*/

error_reporting(E_ALL);
ini_set("display_errors", 1);

$language = null;

####

$path = dirname(__FILE__);

require($path.'/libs/startup.php');

$smarty->assign("Name","Grid System",true);

//Leopard assign
$leo->add_nav('home', 'Home', '?p=home', 4);
$leo->add_nav('documentation', 'Documentation', '?p=documentation', 6,
  array(
    'leos' => array(
      'title' => 'Leopard',
      'url' => '?p=documentation&section=leos'
    ),
    'leos_functions' => array(
      'title' => 'Leopard functions',
      'url' => '?p=documentation&section=leo-functions'
    )
  ));

$leo->add_nav_right('settings', 'Settings', '?p=admin', 7);

$leo->add_sidebar('main_links', 'Main links', '/', 5);
$leo->add_sidebar('other_links', 'Other links', '/', 6);

$leo->enqueue_style('bootstrap','bootstrap.min.css',5);
$leo->enqueue_style('style','style.css',6);

$leo->enqueue_script('jquerymin','http://code.jquery.com/jquery-1.8.3.min.js',5);
$leo->enqueue_script('bootstrap','bootstrap.min.js',6);

if ($leo->leo_exist('action')) {
  $leo->execute_leo('action'); 
}

switch (isset($_GET["p"])?$_GET["p"]:"") {
  case 'admin':
    require($path.'/pages/admin.main.php');
    $smarty->display('admin.main.html');
  break;

  case 'documentation':
    require($path.'/pages/doc.php');
    $smarty->display('doc.html');
  break;

  case '':  
  case 'home': 
    require($path.'/pages/main.php');
    $smarty->display('index.html');
  break;

  default:
    if ($leo->leo_exist('new_page')) {
      $leo->execute_leo('new_page'); 
		} else {
			die('404');
    }
  break;	
}

?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'baasu.db.elephantsql.com',
	'username' => 'viaalxpp',
	'password' => 'Ny2VVo5FsVgFyUIjJUfPRqxOoeOd_xCX',
	'database' => 'viaalxpp',
	'dbdriver' => 'postgre',
	'dbprefix' => 'openfoodfacts.',
	'pconnect' => FALSE,
	'db_debug' =>(ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
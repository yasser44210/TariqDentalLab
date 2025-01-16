<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array();
$autoload['drivers'] = array();
$autoload['helper'] = array();
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array();
$autoload['helper'] = array('url');

$autoload['libraries'] = array('database', 'session', 'form_validation');
$autoload['helper'] = array('url', 'form', 'html');




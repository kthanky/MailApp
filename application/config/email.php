<?php
/**
 * Created by PhpStorm.
 * User: Kunal
 * Date: 8/12/2016
 * Time: 7:57 PM
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.mailgun.org';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'postmaster@sandbox48dd0e75d3c84d96a4e92fe5e628f159.mailgun.org';
$config['smtp_pass'] = '13623286a824da327705275f679ceef3';
$config['smtp_timeout'] = '4';
$config['crlf'] = '\n';
$config['newline'] = '\r\n';
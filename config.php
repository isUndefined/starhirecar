<?php
$config['page']['index'] = 'index';
$config['page']['cars'] = 'cars';
$config['page']['error'] = 'error';
$config['page']['login'] = 'login';
$config['page']['image'] = 'image';
$config['page']['about'] = 'about';
$config['page']['contacts'] = 'contacts';
$config['page']['faq'] = 'faq';
$config['page']['offers'] = 'offers';
$config['page']['article'] = 'article';

$config['page']['default'] = 'index';


$config['default_site_name'] = 'Test page';
$config['path_root_web'] = 'http://starhirecar';
$config['path_root_server'] = 'E:\WebServer\home\starhirecar\www';

$config['security_key'] = "1amSup3rH3r0C@R"; //super secret key

$config['cars_per_page_by_category'] = 4;
$config['cars_limit_for_each_category'] = 2;
$config['period_between_message_send'] = 180; // seconds
$config['offers_per_page'] = 6;

// * SQL
$config['sql']['server'] = "localhost";
$config['sql']['user'] = "root";
$config['sql']['password'] = "";
$config['sql']['db_name'] = "starhirecar";

// * SMTP
$config['send_to']       = 'simon.smith.g@gmail.com'; // ���� ���������� ��� ������ �� ���������� �����
$config['smtp_username'] = 'monitorul@fisc.md';  //������� �� ��� ������ ��������� �����.
$config['smtp_port']     = '25'; // ���� ������. �� �������, ���� �� �������.
$config['smtp_host']     = 'mail.fisc.md';  //������ ��� �������� �����(��� ����� �������� ������ �� ���������)
$config['smtp_password'] = 'l79659669';  //�������� ������
$config['smtp_debug']    = true;  //���� �� ������ ������ ��������� ������, ������� true ������ false
$config['smtp_charset']  = 'Windows-1251';   //��������� ���������. (��� UTF-8, ���)
$config['smtp_from']     = 'noreply'; //���� ��� - ��� ��� ������ �����. ����� ���������� ��� ��������� � ���� "�� ����"



return $config;


?>
README
======

CONSTANTS USED IN PROJECT
=========================

In application/Bootstrap.php:
    Email sending:
        # fix for Windows-based local development server
        # write here your internet IP:
        define('LOCALHOST', "12.34.56.78");

        # Admin email. Used to recieve notifications
        define('ADMIN_EMAIL', "skachkov@guns.ru");

    Shell execute:
        # Define path to programs directory:
        define('SHELL_PATH', "/home/vlad/nsc2010/public/shell/");

VARIABLES USED IN PROJECT
=========================
$_SESSION['logined_user_info'] # contains list of driver status


CUSTOM HELPERS USED IN PROJECT
=========================
VIEW HELPERS:

    Convert phone/fax nubmer string 1234567890 to (123) 456-7890 format:
    Custom_View_Helper_Transformation::convertNumber($this->driverInfo['d_Fax']);



Setting Up Your VHOST
=====================

The following is a sample VHOST you might want to consider for your project.

<VirtualHost *:80>
   DocumentRoot "C:/AppServ/www/studyzend/tipulitonline/public"
   ServerName tipulitonline.local

   # This should be omitted in the production environment
   SetEnv APPLICATION_ENV development
    
   <Directory "C:/AppServ/www/studyzend/tipulitonline/public">
       Options Indexes MultiViews FollowSymLinks
       AllowOverride All
       Order allow,deny
       Allow from all
   </Directory>
    
</VirtualHost>

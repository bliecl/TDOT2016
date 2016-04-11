307-mvc
=======

PHP 5.3 MVC framework with formbuilder.

Windows installation
--------------------

Install xampp according to the booklet on your share. Clone this repo into any desired folder and select your branch.

    D:\dev\web> git clone https://github.com/ICT-BBC/307-mvc.git
    D:\dev\web> cd 307-mvc
    D:\dev\web\307-mvc> git pull origin controller

Setting up your apache2 vhosts with the following changes:

1. Edit the `C:\xampp\apache\conf\extra\httpd-vhosts.conf` file
  * Comment in the `NameVirtualHost` directive 
  * Copy the content of `vhost.txt` into it
  * If necessary change the `ServerName`, `ServerAlias` and your project path
2. Add your domain to your `C:\Windows\System32\drivers\etc\hosts` file 
3. Restart apache; try it or die tryin'

License
-------

This framework is under the MIT license. See the complete license in the file:

    LICENSE

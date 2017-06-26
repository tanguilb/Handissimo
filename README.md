handissimo
==========

A Symfony project created on November 16, 2016, 10:57 am.

1-Installation of project

- Copy the source code to the server.
- Create the database.
<pre>
    app/console doctrine:database:create
</pre>
- Do a composer install to add dependencies and assets
- Create the tables of database
<pre>
    app/console doctrine:schema:update --force
</pre>
- Add in the folder bundles (the path is web/bundle/ivoryckeditor/plugins) the plugins.<br>
  The plugins are:<br>
   - confighelper: http://ckeditor.com/addon/confighelper
   - notification: http://ckeditor.com/addon/notification
   - wordcount : http://ckeditor.com/addon/wordcount
- if your mysql version is 5.7, and you may have problem of compatibily with Doctrine.
  For resolve it, you have to add a line in mysqld.cnf file. <br />
  The access path to find the file is :
  /etc/mysql/mysql.conf.d/mysqld.conf<br>
  You have to add at the end of file : sql-mode=""
- Install if the library GD does not exist on the server
<pre>
    apt install php7.0-gd
</pre>
- Install if it does not exist, the intl extension
<pre>
    apt install php7.0-intl
</pre>
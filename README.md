Handissimo
==========

A Symfony project created on November 16, 2016, 10:57 am.

### 1-Source Code

The source code is on gitlab account. The owner is david.ducruet74. david.ducruet74 and tangui can manage the right to invite a guess and recovers the source code.

### 2-Build process

- Database mysql:
  - version: 14.04
  - distribution: 5.7.18
  - engine: InnoDB
  - table collation: utf8_unicode_ci
- Php v7.0.15
- Framework Symfony version 2.8
- Develop on ubuntu 16.04
- Production server : ubuntu 16.04
- Apache2 : v2.4.18

### 3-Installation of project

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
- Add in the folder bundles (the path is web/bundle/ivoryckeditor/plugins) these plugins:<br>
   - confighelper: http://ckeditor.com/addon/confighelper
   - notification: http://ckeditor.com/addon/notification
   - wordcount : http://ckeditor.com/addon/wordcount
- if your mysql version is 5.7, you may have compatibilty's problem with Doctrine.
  To solve it, you need add a line in mysqld.cnf file. <br />
  The access path to find the file is :
  /etc/mysql/mysql.conf.d/mysqld.conf<br>
  You must add at the end of file : sql-mode=""
- If the library GD does not exist on the server install it
<pre>
    apt install php7.0-gd
</pre>
- If the intl extension does not exist on the server install it
<pre>
    apt install php7.0-intl
</pre>

### 4-Server

The server is hosting by Ressourcial. You can acces by ssh. To have the rights you need to contact antoine.prisset@fondation-ove.fr.

### 5-People in the project

- Project manager Ségolène Frandon
- Assistant Marion Pineau
- Developer: David Ducruet and Tangui Le Bourdonnec
- Consultant: Pierre Alexandre Koffron

### 6-List of used bundles

- SonataAdmin: 3.13
- SonataUserBundle: ^ 1.3
- friendsofsymfony/user-bundle: ^ 1.3
- SonataEasyExtendBundle: ^ 2.1
- knppaginator: ^ 2.5
- google/recaptcha: ^ 1.1
- jsroutingBundle: ^ 1.6
- vich/uploaderBundle: 1.5.3
- berbelei/DoctrineExtensionBundle: ^ 1.0
- simplethings/entity-audit-bundle: ^ 1.0
- helios-ag/fm-elfinder-bundle: ^ 6.2

### 7-Project architecture

The project is write in object-oriented programming with the model MVC. They are two bundle:
- ApplicationSonataUserBundle to manage all the users
- HandissimoBundle to manage all the rest of the project.
- We have added SonataAdminBundle to manage the superAdmin BackOffice with all rights.
- All the views are in the folder 'app/Resources'

### 8-List of known bugs

- Can not modify entries of library tables when they are linked to an organization in sonata.

### 9-List of weakness

- The services SortSearch with path "src/HandissimoBundle/Services/Search/SortSearch.php" allows to sort the result by distance, filling rate and by search item's correspondence. It is write in php and it will be better to write it in SQL. 
- The services RevertVersion with path "src/HandissimoBundle/Services/Recorder/RevertVersion.php" test all of array key. it will be better to refactor to simplify it. 

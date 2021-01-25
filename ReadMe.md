## CMS Manager PHP

## Features

Navigation menu for pages

Reading pages

Login to admin zone

IN ADMIN ZONE:

- Create page

- Update page

- Delete page

# Installation

1. Download repository and upload to localhost folder

- for example: \_C:\Program Files\Ampps\www\_

2. Open MySQL Workbench connect to localhost connection or create one

- with username "_root_"

- password will be "_mysql_"

3. Now import sql file given in repository

- Server--->Data Import

- In Import Options Select "_Import from Self-Contained File"_

4. Press Start Import

- It will create database called "_cms-project_" with needed data

5. Open Command line inside project directory, write:

- composer install

**IMPORTANT !!!!!**

If project repository is not directly in _C:\Program Files\Ampps\www_ folder,

- you need to change **$rootPath** variable in: _CmsProjectPHP\index.php_

- for example: **\*$rootPath** ="/Projects/CmsProjectPHP/"\*

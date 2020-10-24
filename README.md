MajPanel : Admin Panel + Blog integrate ( React & Symfony )
=====================
Symfony Powerful Dashboard & Admin. Developed with Symfony  framework.

No changes were made to the symfony structure, the current directory structure is used. A custom namespace for Admin has been created. This field is used for all administrator operations.

The interface is designed to be responsive using Twitter Bootstrap and limenius/react-bundle for integrate react in Twig template . The least possible dependency was tried to be used.

you can use React and Symfony together ,In Addition you can use command line for Convert Entity to  API and make React Grid for manage Database Tabel . 

Why MajPanel
===========
MajPanel Generate crud (Create, read, update and delete ) DataBase Operation automatically trough Rest API and also create React Tabel in order to Manage your DataBase Tabel .
you can generate automatically  React Grid and API For your Entity  . 


Some Packages that were used in MajPanel : 
 - [Symfony Authentication](https://symfony.com/doc/current/security.html)
 - [Symfony Validation](https://symfony.com/doc/current/validation.html)
 - [Symfony React Sandbox](https://github.com/Limenius/symfony-react-sandbox)
 - [React Grid](https://devexpress.github.io/devextreme-reactive/react/grid/)
 - [React Hook Form](https://react-hook-form.com/)
 - [React material-ui](https://material-ui.com/) 

Documentation
=====================
 - [Installation](#installation)
 - [How to add new Entity](#how-to-add-new-entity-)
 - [How to reinstall Entity](#how-to-reinstall-entity-)
 - [How to delete Entity](#how-to-delete-entity-)
 - [API PATH](#api-path)
 - [Config Entity](#config-entity-)
 - [Config Symfony Validation](#config-symfony-validation-)
 - [Config React Validation](#config-symfony-validation-)
 - [How To add React Component in Twig ](#how-to-add-react-component-in-twig-)

Installation :
=====================

Requirements: you need a recent version of node, and Webpack installed (you can install it with `npm install -g webpack webpack-dev-server`).

1- Download Package 

2- install Package symfony & React 

    composer install & npm install 
    
3- Configure your database editing `.env` and setting your database name, user and password. Then, create the schema .  

 - php bin/console doctrine:database:create
 - php bin/console make:migration
 - php bin/console d:mig:mig
 
4- load fixtures:

 - php bin/console doctrine:fixtures:load

5-  prepering register component react  
    npm run webpack-serverside

6- run symfony server and webpack as same Time in 2 Command Prompt.
 - symfony server:start
 - npm run webpack-dev
 
 After this, visit [http://127.0.0.1:8000](http://127.0.0.1:8000).

7- Admin Panel :
    username : admin@example.com 
    password : 123456




How to add new Entity :
=============
make  (React Grid Tabel + API + Config file + Twig Template )

    1- php bin/console majpanel EntityName install 
    2- php bin/console cache:clear


How to reinstall Entity : 
=============
Note : remove EntityName.yaml and regenerate all files again 
```
php bin/console majpanel EntityName reinstall
```



How to delete Entity : 
=============
```
php bin/console majpanel EntityName delete 
```


API PATH
=============
    - majpanel/api/EntityName/getid/{type}/{id}/                    //GET
    - majpanel/api/EntityName/search/{field}/{value}                //GET
    - majpanel/api/EntityName/del/                                  //DELETE
    - majpanel/api/EntityName/update/                               //PUT
    - majpanel/api/EntityName/insert/                               //POST
    - majpanel/api/EntityName/getfiles/{id}                         //GET
    - majpanel/api/EntityName/delfile/                              //DELETE




How it works
============
These actions act as an API and will be used by the client-side React code to retrieve data as needed when navigating to other pages without reloading the pages.



Config Entity :
===========
Note : after change config you should run install command in order to configure new files .
Configure Entity : config/MajPanel/EntityName.yaml

   - ColumnsGrid    : Config React Grid
   - SetFiledDetail : Config which property  You Want to Show in Detail Dialog Box
   - SetFiledEdit   : Config which property  You Want to Show in Edit Dialog Box
   

Config Symfony Validation :
===========

 - src/Form/MajPanel/EntityName/EditFormValidateCity.php
 - src/Form/MajPanel/EntityName/InsertFormValidateCity.php


Configure React Validation : 
===========

 - assets/js/MajPanel/Grid/EntityName/Config/ConfigEditForm.jsx
 - assets/js/MajPanel/Grid/EntityName/Config/ConfigInsertForm.jsx


Example React Validation
===========
Configure your Validation custom  ConfigEditForm.jsx & ConfigInsertForm.jsx
```
    export const ValidateFields={
    	
    				"email" :
    					{
    			            required: "Enter your e-mail",
                            pattern: {
                              value: /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i,
                              message: "Enter a valid e-mail address",
                            },
    					} ,
    				"postcode" :
    					{
            				required: "Postcode required" ,
            				pattern: {
                              value: /[0-9]{10}/,
                              message: "Enter number Postcode ",
                            },
    					}
    };
```					


How To add React Component in Twig : 
===========

Take a look at the assets/js/entryPoint.js file:

First of all you should register your Component : 


``` 
{{ react_component('RouterAdminBlog', {'props': props}) }}
```
Configure React BASE-URL : 
===========

 - assets/js/MajPanel/Config/init.jsx

Configure React BASE-URL : 
===========
``` 
        yarn encore production
``` 

Blog example
=============
this future an example for manage a blog 

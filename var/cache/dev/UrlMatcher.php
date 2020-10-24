<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/majpanel/api/autor/datagrid' => [[['_route' => 'majpanel_api_autor_getall_grid', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController::getAllDataGrid'], null, ['GET' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/autor/getalldata' => [[['_route' => 'majpanel_api_autor_getall', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController::getAllData'], null, ['GET' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/autor/del' => [[['_route' => 'majpanel_api_autor_del_fields', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController::doDelete'], null, ['DELETE' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/autor/update' => [[['_route' => 'majpanel_api_autor_update_field', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController::doUpdate'], null, ['PUT' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/autor/insert' => [[['_route' => 'majpanel_api_autor_insert_field', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController::doInsert'], null, ['POST' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/autor/upload' => [[['_route' => 'majpanel_api_autor_upload', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController::doUpload'], null, ['POST' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/autor/delfile' => [[['_route' => 'majpanel_api_autor_delfile', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController::getDelFile'], null, ['POST' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/blog/datagrid' => [[['_route' => 'majpanel_api_blog_getall_grid', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Blog\\CrudControllerBlog::getAllDataGrid'], null, ['GET' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/blog/getalldata' => [[['_route' => 'majpanel_api_blog_getall', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Blog\\CrudControllerBlog::getAllData'], null, ['GET' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/blog/del' => [[['_route' => 'majpanel_api_blog_del_fields', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Blog\\CrudControllerBlog::doDelete'], null, ['DELETE' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/blog/update' => [[['_route' => 'majpanel_api_blog_update_field', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Blog\\CrudControllerBlog::doUpdate'], null, ['PUT' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/blog/insert' => [[['_route' => 'majpanel_api_blog_insert_field', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Blog\\CrudControllerBlog::doInsert'], null, ['POST' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/blog/upload' => [[['_route' => 'majpanel_api_blog_upload', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Blog\\CrudControllerBlog::doUpload'], null, ['POST' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/blog/delfile' => [[['_route' => 'majpanel_api_blog_delfile', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Blog\\CrudControllerBlog::getDelFile'], null, ['POST' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/book/datagrid' => [[['_route' => 'majpanel_api_book_getall_grid', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Book\\BookCrudController::getAllDataGrid'], null, ['GET' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/book/getalldata' => [[['_route' => 'majpanel_api_book_getall', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Book\\BookCrudController::getAllData'], null, ['GET' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/book/del' => [[['_route' => 'majpanel_api_book_del_fields', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Book\\BookCrudController::doDelete'], null, ['DELETE' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/book/update' => [[['_route' => 'majpanel_api_book_update_field', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Book\\BookCrudController::doUpdate'], null, ['PUT' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/book/insert' => [[['_route' => 'majpanel_api_book_insert_field', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Book\\BookCrudController::doInsert'], null, ['POST' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/book/upload' => [[['_route' => 'majpanel_api_book_upload', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Book\\BookCrudController::doUpload'], null, ['POST' => 0, 'HEAD' => 1], null, true, false, null]],
        '/majpanel/api/book/delfile' => [[['_route' => 'majpanel_api_book_delfile', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Book\\BookCrudController::getDelFile'], null, ['POST' => 0, 'HEAD' => 1], null, true, false, null]],
        '/admin/majpanel/autor/home' => [[['_route' => 'admin_majpanel_grid_autor_home', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Grid\\Autor\\HomeController::index'], null, null, null, false, false, null]],
        '/admin/majpanel/blog/home' => [[['_route' => 'admin_majpanel_grid_blog_home', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Grid\\Blog\\HomeController::index'], null, null, null, false, false, null]],
        '/admin/majpanel/book/home' => [[['_route' => 'admin_majpanel_grid_book_home', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Grid\\Book\\HomeController::index'], null, null, null, false, false, null]],
        '/admin/majpanel/home' => [[['_route' => 'majpanel_home', '_controller' => 'App\\Controller\\Admin\\MajPanel\\HomeController::index'], null, null, null, false, false, null]],
        '/admin/majpanel/getstart' => [[['_route' => 'majpanel_getstart', '_controller' => 'App\\Controller\\Admin\\MajPanel\\HomeController::getStart'], null, null, null, false, false, null]],
        '/' => [
            [['_route' => 'blog_home', '_controller' => 'App\\Controller\\Blog\\BlogHomeController::index'], null, null, null, false, false, null],
            [['_route' => 'index', '_controller' => 'App\\Controller\\DefaultController::index'], null, null, null, false, false, null],
        ],
        '/login' => [
            [['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null],
            [['_route' => 'admin_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, ['GET' => 0, 'POST' => 1], null, false, false, null],
        ],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/api/login_check' => [[['_route' => 'api_login_check', '_controller' => 'App\\Controller\\SecurityController::getJwtTokenUser'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/majpanel/api/(?'
                    .'|autor/(?'
                        .'|get(?'
                            .'|id/([^/]++)/([^/]++)(*:94)'
                            .'|/([^/]++)(*:110)'
                            .'|files/([^/]++)(*:132)'
                        .')'
                        .'|search/([^/]++)/([^/]++)(*:165)'
                    .')'
                    .'|b(?'
                        .'|log/(?'
                            .'|get(?'
                                .'|id/([^/]++)/([^/]++)(*:211)'
                                .'|files/([^/]++)(*:233)'
                            .')'
                            .'|search/([^/]++)/([^/]++)(*:266)'
                        .')'
                        .'|ook/(?'
                            .'|get(?'
                                .'|id/([^/]++)/([^/]++)(*:308)'
                                .'|/([^/]++)(*:325)'
                                .'|files/([^/]++)(*:347)'
                            .')'
                            .'|search/([^/]++)/([^/]++)(*:380)'
                        .')'
                    .')'
                .')'
                .'|/blog/([^/]++)(*:405)'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        94 => [[['_route' => 'majpanel_api_autor_getid', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController::getId'], ['type', 'id'], ['GET' => 0, 'HEAD' => 1], null, true, true, null]],
        110 => [[['_route' => 'majpanel_api_autor_get', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController::getById'], ['id'], ['GET' => 0, 'HEAD' => 1], null, true, true, null]],
        132 => [[['_route' => 'majpanel_api_autor_getfiles', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController::getFileDir'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        165 => [[['_route' => 'majpanel_api_autor_search_field', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Autor\\AutorCrudController::doSearch'], ['field', 'value'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        211 => [[['_route' => 'majpanel_api_blog_getid', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Blog\\CrudControllerBlog::getId'], ['type', 'id'], ['GET' => 0, 'HEAD' => 1], null, true, true, null]],
        233 => [[['_route' => 'majpanel_api_blog_getfiles', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Blog\\CrudControllerBlog::getFileDir'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        266 => [[['_route' => 'majpanel_api_blog_search_field', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Blog\\CrudControllerBlog::doSearch'], ['field', 'value'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        308 => [[['_route' => 'majpanel_api_book_getid', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Book\\BookCrudController::getId'], ['type', 'id'], ['GET' => 0, 'HEAD' => 1], null, true, true, null]],
        325 => [[['_route' => 'majpanel_api_book_get', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Book\\BookCrudController::getById'], ['id'], ['GET' => 0, 'HEAD' => 1], null, true, true, null]],
        347 => [[['_route' => 'majpanel_api_book_getfiles', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Book\\BookCrudController::getFileDir'], ['id'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        380 => [[['_route' => 'majpanel_api_book_search_field', '_controller' => 'App\\Controller\\Admin\\MajPanel\\Api\\Book\\BookCrudController::doSearch'], ['field', 'value'], ['GET' => 0, 'HEAD' => 1], null, false, true, null]],
        405 => [
            [['_route' => 'blog_show', '_controller' => 'App\\Controller\\Blog\\BlogHomeController::showcontent'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

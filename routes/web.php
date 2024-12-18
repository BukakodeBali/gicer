<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', [ 'as' => 'home', 'uses' => 'Web\HomeController@index']);
$router->get('/tentang-kami', [ 'as' => 'about', 'uses'=> 'Web\AboutController@index']);
$router->get('/alur-sertifikasi', [ 'as' => 'certification-process', 'uses'=> 'Web\CertificationProcessController@index']);
$router->get('/layanan/{link}', [ 'as' => 'layanan', 'uses' => 'Web\ServiceController@index']);
$router->get('/kontak', [ 'as' => 'contact', 'uses'=> 'Web\ContactController@index']);
$router->get('/berita/{link}', [ 'uses'=> 'Web\ArticleController@show']);
$router->get('/berita', [ 'as' => 'article', 'uses'=> 'Web\ArticleController@index']);
$router->get('/kategori/{link}', [ 'as' => 'category', 'uses'=> 'Web\ArticleController@category']);


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/login', 'AuthController@login');
    $router->get('/logout', 'AuthController@logout');
    $router->post('/client_login', 'AuthController@clientLogin');

    $router->group(['middleware' => 'jwt.auth'], function () use ($router) {
        $router->get('/me', 'UserController@me');

        $router->group(['prefix' => '/users'], function() use ($router) {
            $router->get('/', 'UserController@index');
            $router->post('/', 'UserController@store');
            $router->get('/{id}', 'UserController@edit');
            $router->put('/{id}', 'UserController@update');
            $router->delete('/{id}', 'UserController@destroy');
        });

        $router->group(['prefix' => '/roles'], function () use ($router) {
            $router->get('/', 'RolePermissionController@showRoles');
            $router->post('/', 'RolePermissionController@addRole');
            $router->get('/{id}', 'RolePermissionController@getRoleWithPermissionsById');
            $router->put('/{id}', 'RolePermissionController@updateRole');
            $router->delete('/{id}', 'RolePermissionController@deleteRole');
        });

        $router->group(['prefix' => '/permissions'], function () use ($router) {
            $router->get('/', 'RolePermissionController@showPermissions');
            $router->post('/', 'RolePermissionController@addPermission');
            $router->put('/{id}', 'RolePermissionController@updatePermission');
            $router->delete('/{id}', 'RolePermissionController@deletePermission');
        });

        $router->group(['prefix' => 'clients'], function () use ($router) {
            $router->get('/', 'ClientController@index');
            $router->post('/', 'ClientController@store');
            $router->get('/{id}', 'ClientController@edit');
            $router->put('/{id}', 'ClientController@update');
            $router->delete('/{id}', 'ClientController@destroy');

            $router->get('/generate/code', 'ClientController@generateCode');
            $router->get('/{id}/with-certificates', 'ClientController@getDetailWithCertificates');
            $router->get('/get/certificates', 'ClientController@clientCertificates');
        });

        $router->group(['prefix' => '/scopes'], function () use ($router) {
            $router->get('/', 'ScopeController@index');
            $router->post('/', 'ScopeController@store');
            $router->get('/{id}', 'ScopeController@edit');
            $router->put('/{id}', 'ScopeController@update');
            $router->delete('/{id}', 'ScopeController@destroy');
        });

        $router->group(['prefix' => '/status'], function () use ($router) {
            $router->get('/', 'StatusController@index');
            $router->post('/', 'StatusController@store');
            $router->get('/{id}', 'StatusController@edit');
            $router->put('/{id}', 'StatusController@update');
            $router->delete('/{id}', 'StatusController@destroy');
        });

        $router->group(['prefix' => '/products'], function () use ($router) {
            $router->get('/', 'ProductController@index');
            $router->post('/', 'ProductController@store');
            $router->get('/{id}', 'ProductController@edit');
            $router->put('/{id}', 'ProductController@update');
            $router->delete('/{id}', 'ProductController@destroy');
        });

        $router->group(['prefix' => '/certificates'], function () use ($router) {
            $router->get('/', 'CertificateController@index');
            $router->put('/{id}', 'CertificateController@update');
            $router->post('/', 'CertificateController@store');
            $router->delete('/{id}', 'CertificateController@destroy');
            $router->post('/update-issue-date-detail', 'CertificateController@updateIssueDateDetail');
            $router->put('/{id}/password', 'CertificateController@updatePassword');

            $router->get('/dashboard/count', 'CertificateController@dashboard');
            $router->get('/dashboard/will-expired', 'CertificateController@willExpired');
            $router->get('/dashboard/expired', 'CertificateController@expired');
            $router->get('/download/excel', 'CertificateController@generateExcel');
        });

        $router->group(['prefix' => '/feedbacks'], function () use ($router) {
            $router->get('/', 'FeedBackController@index');
            $router->post('/', 'FeedBackController@store');
            $router->delete('/{id}', 'FeedBackController@destroy');
        });

        $router->group(['prefix' => '/categories'], function () use ($router) {
            $router->get('/', 'CategoryController@index');
            $router->post('/', 'CategoryController@store');
            $router->get('/{id}', 'CategoryController@edit');
            $router->post('/{id}', 'CategoryController@update');
            $router->delete('/{id}', 'CategoryController@destroy');

            $router->get('/get/list', 'CategoryController@list');
            $router->get('/get/list/subcategory', 'CategoryController@listWithSubcategory');
        });

        $router->group(['prefix' => 'articles'], function () use ($router) {
            $router->get('/', 'ArticleController@index');
            $router->post('/', 'ArticleController@store');
            $router->get('/{id}', 'ArticleController@edit');
            $router->post('/{id}', 'ArticleController@update');
            $router->delete('/{id}', 'ArticleController@destroy');
        });

        $router->group(['prefix' => 'services'], function () use ($router) {
            $router->get('/', 'ServiceController@index');
            $router->post('/', 'ServiceController@store');
            $router->get('/{id}', 'ServiceController@edit');
            $router->post('/{id}', 'ServiceController@update');
            $router->delete('/{id}', 'ServiceController@destroy');
        });
    });

    $router->post('/contact', 'PublicController@contact');
    $router->get('/get_hash/certificates', 'PublicController@getCertificatesByHash');
    $router->get('/get_hash/certificate', 'PublicController@getCertificateByHash');
});


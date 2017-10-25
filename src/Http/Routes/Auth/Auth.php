<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015, 2016, 2017  Leon Jacobs
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

Route::get('login', [
    'as'   => 'auth.login',
    'uses' => 'LoginController@showLoginForm',
]);
Route::post('login', [
    'as'   => 'auth.login.post',
    'uses' => 'LoginController@login',
]);
Route::any('logout', [
    'as'   => 'auth.logout',
    'uses' => 'LoginController@logout',
]);

Route::group([
    'middleware' => 'registration.status',
    'prefix'     => 'register',
], function () {

    // Registration routes
    Route::get('/', [
        'as'   => 'auth.register',
        'uses' => 'RegisterController@showRegistrationForm',
    ]);
    Route::post('/', [
        'as'   => 'auth.register.post',
        'uses' => 'RegisterController@register',
    ]);

});

Route::get('unauthorized', [
    'as'   => 'auth.unauthorized',
    'uses' => 'AuthorizationController@getUnauthorized',
]);

Route::get('disabled', [
    'as'   => 'auth.disabled',
    'uses' => 'AuthorizationController@getDisabledAccount',
]);
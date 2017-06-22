import { BrowserModule } from '@angular/platform-browser';
import { Http, HttpModule, XHRBackend } from "@angular/http";
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';

import { Facebook } from "@ionic-native/facebook";
import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { IonicStorageModule, Storage } from "@ionic/storage";
import { DefaultXHRBackend } from "../providers/default-xhr-backend";

import { MyApp } from './app.component';
import { Test } from "../components/test/test";

import { Auth } from "../providers/auth";
import { JwtClient } from "../providers/jwt-client";
import { AuthConfig, AuthHttp, JwtHelper } from "angular2-jwt";
import { Redirector } from "../providers/redirector";

import { HomePage } from '../pages/home/home';
import { ListPage } from '../pages/list/list';
import { MySettingsPage } from '../pages/my-settings/my-settings';
import { LoginPage } from "../pages/login/login";
import { Env } from "../models/env";
import { UserResource } from "../providers/resources/user-resource";


declare var ENV: Env;

@NgModule( {
    declarations   : [
        HomePage,
        ListPage,
        LoginPage,
        MyApp,
        MySettingsPage,
        Test
    ],
    imports        : [
        BrowserModule,
        HttpModule,
        IonicModule.forRoot( MyApp, {}, {
            links: [
                { component: LoginPage, name: 'LoginPage', segment: 'login' },
                { component: HomePage, name: 'HomePage', segment: 'home' },
                { component: Test, name: 'TestPage', segment: 'test/:id/:name' },
                { component: MySettingsPage, name: 'MySettingsPage', segment: 'my-settings'}
            ]
        } ),
        IonicStorageModule.forRoot( {
            driverOrder: ['localstorage']
        } )
    ],
    bootstrap      : [IonicApp],
    entryComponents: [
        HomePage,
        ListPage,
        MySettingsPage,
        LoginPage,
        Test
    ],
    providers      : [
        Auth,
        Facebook,
        JwtClient,
        JwtHelper,
        Redirector,
        StatusBar,
        SplashScreen,
        UserResource,
        { provide: ErrorHandler, useClass: IonicErrorHandler },
        {
            provide: AuthHttp,
            deps   : [Http, Storage],
            useFactory( http, storage ){
                let authConfig = new AuthConfig( {
                    headerPrefix : 'Bearer',
                    noJwtError   : true,
                    noClientCheck: true,
                    tokenGetter  : (() => storage.get( ENV.TOKEN_NAME ))
                } );
                return new AuthHttp( authConfig, http )
            }
        },
        { provide: XHRBackend, useClass: DefaultXHRBackend },
    ]
} )
export class AppModule {
}

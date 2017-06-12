import { BrowserModule } from '@angular/platform-browser';
import { Http, HttpModule } from "@angular/http";
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { IonicStorageModule, Storage } from "@ionic/storage";

import { MyApp } from './app.component';
import { Test } from "../components/test/test";

import { Auth } from "../providers/auth";
import { JwtClient } from "../providers/jwt-client";
import { AuthConfig, AuthHttp, JwtHelper } from "angular2-jwt";

import { HomePage } from '../pages/home/home';
import { ListPage } from '../pages/list/list';
import { LoginPage } from "../pages/login/login";
import { Env } from "../models/env";

declare var ENV: Env;

@NgModule( {
    declarations   : [
        HomePage,
        ListPage,
        LoginPage,
        MyApp,
        Test
    ],
    imports        : [
        BrowserModule,
        HttpModule,
        IonicModule.forRoot( MyApp, {}, {
            links: [
                { component: LoginPage, name: 'LoginPage', segment: 'login' },
                { component: HomePage, name: 'HomePage', segment: 'home' },
                { component: Test, name: 'TestPage', segment: 'test/:id/:name' }
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
        LoginPage,
        Test
    ],
    providers      : [
        Auth,
        JwtClient,
        JwtHelper,
        StatusBar,
        SplashScreen,
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
        }
    ]
} )
export class AppModule {
}

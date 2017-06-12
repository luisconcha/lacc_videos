import { BrowserModule } from '@angular/platform-browser';
import { HttpModule } from "@angular/http";
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { IonicStorageModule } from "@ionic/storage";

import { MyApp } from './app.component';
import { Test } from "../components/test/test";

import { Auth } from "../providers/auth";
import { JwtClient } from "../providers/jwt-client";
import { JwtHelper } from "angular2-jwt";

import { HomePage } from '../pages/home/home';
import { ListPage } from '../pages/list/list';
import { LoginPage } from "../pages/login/login";

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
        IonicModule.forRoot( MyApp ),
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
        { provide: ErrorHandler, useClass: IonicErrorHandler }
    ]
} )
export class AppModule {
}

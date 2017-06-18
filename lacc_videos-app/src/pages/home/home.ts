import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { Test } from "../../components/test/test";
import { Auth } from "../../decorators/auth.decorator";
import { AuthHttp } from "angular2-jwt";
import 'rxjs/add/operator/toPromise';
import { Http } from "@angular/http";

@Auth()

@Component( {
    selector   : 'page-home',
    templateUrl: 'home.html'
} )
export class HomePage {

    constructor( public navCtrl: NavController, public authHttp: AuthHttp ) {

    }

    ionViewDidLoad() {
        this.authHttp.get( 'http://videos.dev/api/user' )
            .toPromise()
            .then( () => {
                console.log( 'primeira' );
            } );
        //setInterval( () => {
        //    this.authHttp.get( 'http://videos.dev/api/user' )
        //        .toPromise()
        //        .then( () => {
        //            console.log( 'primeira' );
        //        } );
        //    this.authHttp.get( 'http://videos.dev/api/user' )
        //        .toPromise()
        //        .then( () => {
        //            console.log( 'segunda' );
        //        } );
        //    this.authHttp.get( 'http://videos.dev/api/user' )
        //        .toPromise()
        //        .then( () => {
        //            console.log( 'terceira' );
        //        } );
        //}, 60 * 1000 + 1 );

    }

    goToTest() {
        this.navCtrl.push( Test, {
            'id'  : 20,
            'name': 'Luis Alberto Concha Curay'
        } );
    }

}

import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import 'rxjs/add/operator/toPromise';
import { JwtClient } from "../../providers/jwt-client";
import { Auth } from "../../providers/auth";


@IonicPage()
@Component( {
    selector   : 'page-login',
    templateUrl: 'login.html',
} )
export class LoginPage {

    email: string;
    password: string;

    constructor( private jwtClient: JwtClient,
                 private auth: Auth,
                 public navCtrl: NavController,
                 public navParams: NavParams ) {

    }

    ionViewDidLoad() {
        console.log( 'ionViewDidLoad Login' );
    }

    login() {
        //this.jwtClient
        //    .accessToken( { email: this.email, password: this.password } )
        //    .then( ( token ) => {
        //        console.log( 'Obj: ', token );
        //    } );
    }

}

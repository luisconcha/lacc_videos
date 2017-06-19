import { Component } from "@angular/core";
import { IonicPage, MenuController, NavController, NavParams, ToastController } from "ionic-angular";
import "rxjs/add/operator/toPromise";
import { Auth } from "../../providers/auth";
import { HomePage } from "../home/home";

@IonicPage()
@Component( {
    selector   : 'page-login',
    templateUrl: 'login.html',
} )
export class LoginPage {

    user = {
        email   : '',
        password: ''
    };


    constructor( private auth: Auth,
                 public menuCtrl: MenuController,
                 public navCtrl: NavController,
                 public toasCtrl: ToastController,
                 public navParams: NavParams ) {

        this.menuCtrl.enable( false );
    }

    ionViewDidLoad() {
        console.log( 'ionViewDidLoad Login' );
    }

    login() {
        this.auth.login( this.user )
            .then( () => {
                this.afterLogin();
            } )
            .catch( () => {
                this.toastMessage( 'Invalid email or password', 3000, 'top', 'toast-login-error' );
            } );
    }

    loginWithFacebook() {
        this.auth.loginWithFacebook().then( () => {
            this.afterLogin();
        } ).catch( () => {
            this.toastMessage( 'Error signing in with facebook', 3000, 'top', 'toast-login-error' );
        } );
    }

    afterLogin() {
        this.menuCtrl.enable( true );
        this.navCtrl.push( HomePage );
    }

    toastMessage( message, duration, position, cssClass ) {
        let toast = this.toasCtrl.create( {
            message : message,
            duration: duration,
            position: position,
            cssClass: cssClass
        } );

        return toast.present();
    }

}

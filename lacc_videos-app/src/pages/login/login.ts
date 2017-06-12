import { Component } from "@angular/core";
import { IonicPage, MenuController, NavController, NavParams, ToastController } from "ionic-angular";
import "rxjs/add/operator/toPromise";
import { Auth } from "../../providers/auth";
import { HomePage } from "../home/home";
import { Test } from "../../components/test/test";

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
                let toast = this.toasCtrl.create( {
                    message : 'Invalid email or password',
                    duration: 3000,
                    position: 'top',
                    cssClass: 'toast-login-error'
                } );

                toast.present();
            } );
    }

    goToHome() {
        this.navCtrl.push( Test, { id: 30, name: 'Luia Alberto CC' } );
    }

    afterLogin() {
        this.menuCtrl.enable( true );
        this.navCtrl.push( HomePage );
    }

}

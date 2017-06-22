import { Component, ViewChild } from '@angular/core';
import { IonicPage, Nav, NavController, NavParams, ToastController } from 'ionic-angular';
import { Auth } from "../../decorators/auth.decorator";
import { UserResource } from "../../providers/resources/user-resource";

@Auth()
@IonicPage()
@Component( {
    selector   : 'page-my-settings',
    templateUrl: 'my-settings.html',
} )
export class MySettingsPage {
    @ViewChild( Nav ) nav: Nav;

    user = {
        password             : '',
        password_confirmation: ''
    };

    constructor( public navCtrl: NavController,
                 public navParams: NavParams,
                 public toasCtrl: ToastController,
                 public userResource: UserResource ) {
    }

    ionViewDidLoad() {
        console.log( 'ionViewDidLoad MySettingsPage' );
    }

    submit() {
        this.userResource
            .updatePassword( this.user )
            .then( (response) => {
                console.log('response: ', response);
                this.toastMessage( 'Data saved successfully', 3000, 'top', 'toast-reverse' );
            } )
            .catch( (errors) => {
                console.log('errors: ', errors);
                this.toastMessage( 'Oops! Invalid data, please try again', 3000, 'top', 'toast-login-error' );
            } )
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

    gotToHome() {
        this.nav.setRoot( 'HomePage' );
    }

}

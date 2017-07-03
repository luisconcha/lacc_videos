import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';
import { UserResource } from "../../providers/resources/user.resource";
import { PlansPage } from "../plans/plans";
import { Auth } from "../../decorators/auth.decorator";


@Auth()
@IonicPage()
@Component( {
    selector   : 'page-add-cpf',
    templateUrl: 'add-cpf.html',
} )
export class AddCpfPage {

    cpf  = null;
    mask = [
        /\d/, /\d/, /\d/, '.',
        /\d/, /\d/, /\d/, '.',
        /\d/, /\d/, /\d/, '-',
        /\d/, /\d/
    ];

    constructor( public navCtrl: NavController,
                 public navParams: NavParams,
                 public userResource: UserResource,
                 public toastCtrl: ToastController ) {
    }

    ionViewDidLoad() {
        console.log( 'ionViewDidLoad AddCpfPage' );
    }

    submit() {
        this.userResource
            .addCpf( this.cpf )
            .then( () => this.navCtrl.push( PlansPage ) )
            .catch( () => {
                this.toastMessage( 'Invalid CPF number! check again', 3000, 'top', 'toast-error' )
            } );
    }

    toastMessage( message, duration, position, cssClass ) {
        let toast = this.toastCtrl.create( {
            message : message,
            duration: duration,
            position: position,
            cssClass: cssClass
        } );

        return toast.present();
    }
}

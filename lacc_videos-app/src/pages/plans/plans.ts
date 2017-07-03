import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Auth } from "../../decorators/auth.decorator";

@Auth()
@IonicPage()
@Component( {
    selector   : 'page-plans',
    templateUrl: 'plans.html',
} )
export class PlansPage {

    constructor( public navCtrl: NavController, public navParams: NavParams ) {
    }

    ionViewDidLoad() {
        console.log( 'ionViewDidLoad PlansPage' );
    }

}

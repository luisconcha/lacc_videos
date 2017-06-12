import { Component } from '@angular/core';
import { NavController, NavParams } from "ionic-angular";
import { HomePage } from "../../pages/home/home";

@Component( {
    selector   : 'test',
    templateUrl: 'test.html'
} )
export class Test {

    text: string;

    constructor( public navCtrl: NavController, public navParams: NavParams ) {
        console.log( 'Hello Test Component' );
        this.text = `Hello ${this.navParams.get( 'name' )} your number is: ${this.navParams.get( 'id' )}`;
    }

    goToHome() {
        this.navCtrl.push( HomePage )
    }
}

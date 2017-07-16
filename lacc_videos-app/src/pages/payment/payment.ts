import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import scriptjs from 'scriptjs';

declare var PAYPAL;

@IonicPage()
@Component( {
    selector: 'page-payment',
    templateUrl: 'payment.html',
} )
export class PaymentPage {

    constructor( public navCtrl: NavController, public navParams: NavParams ) {
    }

    ionViewDidLoad() {
        scriptjs( 'https://www.paypalobjects.com/webstatic/ppplusdcc/ppplusdcc.min.js',
            () => {
                let ppp = PAYPAL.apps.PPP( {
                    approvalUrl: 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-31737613MN931841V',
                    placeholder: 'ppplus',
                    mode: 'sandbox',
                    country: 'BR',
                    language: 'pt_BR',
                    payerFirstName: 'Luis',
                    payerLastName: 'Concha',
                    payerEmail: 'admin@user.com',
                    payerTaxId: '35812651418',
                    payerTaxIdType: 'BR_CPF'
                } );
            } )
    }

}

import { Injectable } from '@angular/core';
import { Subject } from "rxjs/Subject";
import { NavController } from "ionic-angular";


@Injectable()
export class Redirector {

    subject = new Subject;
    link;

    config( nacCtrl: NavController ) {
        this.subject.subscribe( () => {
            setTimeout( () => {
                nacCtrl.setRoot( this.link );
            } );
        } )
    }

    redirector( link = 'LoginPage' ) {
        this.link = link;
        this.subject.next();
    }
}

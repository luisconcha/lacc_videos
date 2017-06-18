import { Injectable } from '@angular/core';
import { Subject } from "rxjs/Subject";
import { NavController } from "ionic-angular";


@Injectable()
export class Redirector {

    subject = new Subject;

    config( nacCtrl: NavController, link = 'LoginPage' ) {
        this.subject.subscribe( () => {
            setTimeout( () => {
                nacCtrl.setRoot( link );
            } );
        } )
    }

    redirector() {
        this.subject.next();
    }
}

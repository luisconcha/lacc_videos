import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Auth } from "../../decorators/auth.decorator";
import { PlanResource } from "../../providers/resources/plan.resource";

@Auth()
@IonicPage()
@Component( {
    selector   : 'page-plans',
    templateUrl: 'plans.html',
} )
export class PlansPage {

    plans = [];
    
    constructor( public navCtrl: NavController,
                 public navParams: NavParams,
                 public planResource: PlanResource ) {
    }

    ionViewDidLoad() {
        this.planResource
            .all()
            .then( plans => this.plans = plans )
    }

}

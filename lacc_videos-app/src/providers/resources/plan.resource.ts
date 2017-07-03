import { Injectable } from "@angular/core";
import "rxjs/add/operator/map";
import 'rxjs/add/operator/toPromise';
import { AuthHttp } from "angular2-jwt";
import { Env } from "../../models/env";

declare var ENV: Env;

@Injectable()
export class PlanResource {

    constructor( public http: AuthHttp ) {
        console.log( 'Hello PlanResource Provider' );
    }

    all(): Promise<Array<any>> {
        return this.http.get( `${ENV.API_URL}/plans` )
            .toPromise()
            .then( response => response.json().plans );
    }
}

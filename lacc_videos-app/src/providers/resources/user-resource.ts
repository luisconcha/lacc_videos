import { Injectable } from '@angular/core';
import { Headers, Http, RequestOptions } from '@angular/http';
import 'rxjs/add/operator/toPromise';
import { Env } from "../../models/env";

declare var ENV: Env;

@Injectable()
export class UserResource {

    constructor( public http: Http ) {
        console.log( 'Hello ResourcesUserResourceProvider Provider' );
    }

    register( accessToken: string ): Promise<string> {
        console.log('accessToken: ', accessToken);
        let headers = new Headers();
        headers.set( 'Authorization', `Bearer ${accessToken}` );

        return this.http
            .post( `${ENV.API_URL}/register`, {}, new RequestOptions( { headers } ) )
            .toPromise()
            .then( response => response.json().token )
    }

}

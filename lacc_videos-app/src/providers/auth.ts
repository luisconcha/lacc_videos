import { Injectable } from "@angular/core";
import "rxjs/add/operator/map";
import { JwtClient } from "./jwt-client";
import { JwtPayload } from "../models/jwt-payload";


@Injectable()
export class Auth {

    private _user = null;

    constructor( public jwtClient: JwtClient ) {
        this.user().then( ( user ) => {
            console.log( 'USRE: ', user );
        } );
    }

    user(): Promise<Object> {
        return new Promise( ( resolve ) => {
            if ( this._user ) {
                resolve( this._user );
            }

            this.jwtClient.getPayload().then( ( payload: JwtPayload ) => {
                this._user = payload.user;

                resolve( this._user );
            } )
        } )
    }
}

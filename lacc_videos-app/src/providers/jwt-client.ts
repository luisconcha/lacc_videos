import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import 'rxjs/add/operator/map';
import { JwtCredentials } from "../models/jwt-credentials";
import { JwtHelper } from "angular2-jwt";
import { Storage } from "@ionic/storage";

@Injectable()
export class JwtClient {

    private _token   = null;
    private _payload = null;

    constructor( public http: Http,
                 public storage: Storage,
                 public jwtHelper: JwtHelper ) {
        this.getToken();
        this.getPayload().then( ( payload ) => {
            console.log( 'payload: ', payload );
        } )
    }

    getPayload(): Promise<Object> {
        return new Promise( ( resolve ) => {
            if ( this._payload ) {
                resolve( this._payload );
            }

            this.getToken().then( ( token ) => {
                if ( token ) {
                    this._payload = this.jwtHelper.decodeToken( token );
                }

                resolve( this._payload );
            } )
        } );
    }

    getToken(): Promise<string> {

        return new Promise( ( resolve ) => {
            if ( this._token ) {
                resolve( this._token );
            }

            this.storage.get( 'token' ).then( ( token ) => {
                this._token = token;
                resolve( this._token );
            } );
        } );
    }

    accessToken( jwtCredentials: JwtCredentials ): Promise<string> {
        return this.http.post( 'http://videos.dev/api/access_token', jwtCredentials )
            .toPromise()
            .then( ( response: Response ) => {
                let token   = response.json().token;
                this._token = token;

                //Add token in localStorage
                this.storage.set( 'token', this._token );


                return token;
            } );
    }
}

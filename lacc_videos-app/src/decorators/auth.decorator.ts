/**
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: typeScript
 * Date: 12/06/17
 * Time: 00:11
 * Project: lacc_videos
 * Copyright: 2017
 */

import { appContainer } from "../app/app.container";
import { Auth as AuthService } from "../providers/auth";

export const Auth = () => {
    return ( target: any ) => {
        target.prototype.ionViewCanEnter = () => {
            let authService = appContainer().get( AuthService );
            return authService.check().then( isLogged => {
                if ( !isLogged ) {
                    return false;
                }
                return true;
            } );
        }
    }
};
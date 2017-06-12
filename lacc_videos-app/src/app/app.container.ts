/**
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: typeScript
 * Date: 12/06/17
 * Time: 00:14
 * Project: lacc_videos
 * Copyright: 2017
 */

import { Injector } from "@angular/core";

let localInjector: Injector;

export const appContainer = ( injector?: Injector ): Injector => {
    if ( injector ) {
        localInjector = injector;
    }

    return localInjector;
}
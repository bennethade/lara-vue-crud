// resources/js/global.d.ts
declare module 'ziggy-js' {
  import { Config, RouteParamsWithQueryOverload, RouteParam } from 'ziggy-js';

  export function route(
    name: string,
    params?: RouteParamsWithQueryOverload | RouteParam,
    absolute?: boolean,
    config?: Config
  ): string;

  export const Ziggy: Config;
  export const ZiggyVue: any;
}

export interface IHttpService {
  get(url: string, options?: HttpOptions): any;
  post(url: string, body: any, options?: HttpOptions): any;
}

export type HttpOptions = {
  headers?: Record<string, string>;
};

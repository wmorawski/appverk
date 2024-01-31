import { IHttpService, HttpOptions } from "../types/http.types";

export class HttpService implements IHttpService {
  private readonly baseUrl: string = import.meta.env.VITE_BACKEND_URL;

  public get(url: string, options?: HttpOptions): Promise<Response> {
    return fetch(this.composeUrl(url), {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
        ...(options?.headers || {}),
      },
    });
  }

  public post(
    url: string,
    body: any,
    options?: HttpOptions
  ): Promise<Response> {
    return fetch(this.composeUrl(url), {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
        ...(options?.headers || {}),
      },
      body: JSON.stringify(body),
    });
  }

  private composeUrl(path: string): string {
    return `${this.baseUrl}/${path}`;
  }
}

export default class HTTP {

    public async Get<T>(endpoint: any, page: number, $prefix: string = "page"): Promise<T> {
        return await this.fetchAsync<T>(endpoint.getUrl()+ "?"+$prefix+"="+ page, "get", null);
    }

    public async GetOne<T>(endpoint: any, id: number): Promise<T> {
        return await this.fetchAsync<T>(endpoint.getUrl() + "/" + id, "get", null);
    }

    public async Post<T>(endpoint: any, body: Object): Promise<T> {
        return await this.fetchAsync<T>(endpoint.getUrl(), "post", body);
    }

    public async Put<T>(endpoint: any, body: Object, id: number): Promise<T> {
        return await this.fetchAsync<T>(endpoint.getUrl()+ "/" + id, "put", body);
    }

    public async Delete<T>(endpoint: any, id: number): Promise<T> {
        return await this.fetchAsync<T>(endpoint.getUrl() + "/"+ id, "delete", null);
    }

    private async fetchAsync<T>(url: string, method: string, rawBody: any): Promise<T> {

        let body = rawBody ? JSON.stringify(rawBody) : null;
        
        let response = await fetch(url, {
            method: method,
            headers: {
                "Content-type": "application/json"
            },
            body
        });
        let data = await response.json();
        return data as T;
    }
}
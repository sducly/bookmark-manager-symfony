export default class HTTP {

    public async Get<T>(endpoint: any, page: number): Promise<T> {
        return await this.fetchAsync<T>(endpoint.getUrl()+ "/"+ page, "get", {});
    }

    public async GetOne<T>(endpoint: any, id: number): Promise<T> {
        return await this.fetchAsync<T>(endpoint.getUrl() + "/" + id, "get", {});
    }

    public async Post<T>(endpoint: any, body: Object): Promise<T> {
        return await this.fetchAsync<T>(endpoint.getUrl(), "post", body);
    }

    public async Put<T>(endpoint: any, body: Object): Promise<T> {
        return await this.fetchAsync<T>(endpoint.getUrl(), "put", body);
    }

    public async Delete<T>(endpoint: any, id: number): Promise<T> {
        return await this.fetchAsync<T>(endpoint.getUrl() + "/"+ id, "delete", {});
    }

    private async fetchAsync<T>(url: string, method: string, body: Object): Promise<T> {

        let response = await fetch(url, {
            method: method,
            headers: {
                "Content-type": "application/json"
            },
            body: null
        });
        let data = await response.json();
        return data as T;
    }
}
export default class BaseEndPoint {

    private prefix = (process.env.NODE_ENV || process.env.NODE_ENV === 'development') ? "app_dev.php" : "";

    public getBaseUrl() {
        return process.env.API_HOST + this.prefix + "/api/";
    }
}
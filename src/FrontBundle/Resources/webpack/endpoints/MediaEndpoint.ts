import BaseEndPoint from "./BaseEndpoint";

export default class MediaEndpoint extends BaseEndPoint {
    getUrl() {
        return this.getBaseUrl() + "media";
    }
}
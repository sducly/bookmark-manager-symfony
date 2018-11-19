import BaseEndPoint from "./BaseEndpoint";

export default class BookmarkEndpoint extends BaseEndPoint {
    getUrl() {
        return this.getBaseUrl() + "bookmarks";
    }
}
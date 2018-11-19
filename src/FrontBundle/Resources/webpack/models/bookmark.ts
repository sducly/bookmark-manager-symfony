import Media from "./Media";
import Video from "./video";
import Tag from "./tags";

export default class Bookmark extends Media {
    url: string;
    title: string;
    authorName: string;
    addedDate: string;
    thumbnailUrl: string;
    id: number;
    tags: Tag[];
    video: Video;
}
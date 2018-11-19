import Bookmark from "../models/bookmark";
import Video from "../models/video";
import Tag from "../models/tags";

export default class BookmarkTransformer {

    public transformFormToBookmark(data: []) {
        let bookmark = new Bookmark();
        bookmark.authorName = data['authorName'].value;
        bookmark.height = data['height'].value;
        bookmark.width = data['width'].value;
        bookmark.title = data['title'].value;
        bookmark.thumbnailUrl = data['thumbnailUrl'].value;
        bookmark.url = data['url'].value;

        if (data['duration'] && data['duration'].value) {
            let video = new Video();
            video.duration = data['duration'].value
            bookmark.video = video;
        }

        const tagsAsString = data['tags'].value;
        const tags: Tag[] = [];

        tagsAsString.split(",").map((label: string) => {
            let tag: Tag = new Tag();
            tag.label = label;
            tags.push(tag);
        });

        bookmark.tags = tags;

        return bookmark;
    }
}
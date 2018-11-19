import * as React from "react";
import Bookmark from 'src/FrontBundle/Resources/webpack/models/bookmark';
import { InputWidget, TagsWidget, HiddenWidget } from "../../../widget";

export const BookmarkForm = ({ bookmark, id }: { bookmark: Bookmark, id: number }) => {
    return <React.Fragment>
        <InputWidget name="title" defaultValue={bookmark.title} label="Title" key={"title_"+bookmark.title} />
        
        <InputWidget name="authorName" defaultValue={bookmark.authorName} label="Author name" key={"author_name_"+bookmark.authorName} />

        <InputWidget name="width" defaultValue={bookmark.width ? bookmark.width.toString(): ""} label="Width" key={"width_"+bookmark.width} />
        <InputWidget name="height" defaultValue={bookmark.height ? bookmark.height.toString(): ""} label="Height" key={"height_"+bookmark.height} />

        <TagsWidget name={"tags"} label={"Tags"} defaultValue={bookmark.tags} key={"tags_"+bookmark.url} />

        <HiddenWidget name="thumbnailUrl" value={bookmark.thumbnailUrl} />
        <HiddenWidget name="id" value={id} />
        <HiddenWidget name="url" value={bookmark.url} />

    </React.Fragment>
}
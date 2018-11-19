import * as React from "react";
import Bookmark from "src/FrontBundle/Resources/webpack/models/bookmark";
import { InputWidget } from "../../../widget";

export const VideoForm = ({ bookmark }: { bookmark: Bookmark }) => {
    if (bookmark.video) {
        const duration = bookmark.video ? bookmark.video.duration : 0;
        return <InputWidget
                name="duration"
                defaultValue={duration ? duration.toString(): ""}
                label="Duration" 
                key={"duration"+duration}/>
    }

    return <React.Fragment />
}
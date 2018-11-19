import * as React from "react";

import { BookmarkForm } from "./BookmarkForm";
import { VideoForm } from "./VideoForm";

import { IFormProps } from "../../interface";

export default class Form extends React.Component<IFormProps, {}> {
    render() {

        const { bookmark, id } = this.props

        return <React.Fragment>

            <BookmarkForm bookmark={bookmark} id={id} />

            <VideoForm bookmark={bookmark} />

            {/* Confirm button */}
            <input
                type="submit"
                className="btn btn-dark col-lg-12"
                value="OK" />

        </React.Fragment>
    }
}
import * as React from "react";

import { IEditProps, IEditState } from "../interface";
import { InputWidget } from "../../widget";
import Bookmark from "../../../models/bookmark";
import HTTP from "../../../services/Http";
import BookmarkEndpoint from "../../../endpoints/bookmarkEndpoint";

import MediaEndpoint from "../../../endpoints/MediaEndpoint";

import { Redirect } from "react-router";

import Form from "./Includes/Form";
import BookmarkTransformer from "../../../services/BookmarkTransformer";

export default class Edit extends React.Component<IEditProps, IEditState> {

    private HTTP = new HTTP();
    private endpoint = new BookmarkEndpoint();
    private mediaEnpoint = new MediaEndpoint();
    private transformer = new BookmarkTransformer();

    constructor(props: IEditProps) {
        super(props);
        this.handleChangeUrl = this.handleChangeUrl.bind(this);
        this.postData = this.postData.bind(this);

        this.state = {
            bookmark: undefined,
            isLoading: false,
            redirectUrl: undefined
        }
    }

    public async componentWillMount() {
        const { id } = this.props.match.params as { id: number };

        let bookmark: Bookmark = new Bookmark();

        if (id > 0) {
            bookmark = await this.HTTP.GetOne<Bookmark>(this.endpoint, id);
        }

        this.setState({
            bookmark
        });

    }

    public render() {
        const { id } = this.props.match.params as { id: number };
        const { bookmark, isLoading, redirectUrl } = this.state;

        if (!bookmark) {
            return null;
        }

        if (redirectUrl) {
            return <Redirect to={redirectUrl} />
        }

        return <React.Fragment>
            <h1>
                {bookmark.id > 0 ? "Edit Bookmark" : "Add Bookmark"}
            </h1>

            <div className="card border-default rounded-0">
                <div className="card-header p-0">
                    <div className="bg-default text-white">
                        {bookmark.title ? bookmark.title : "New bookmark"}
                    </div>
                    <img src={bookmark.thumbnailUrl} height="100%" />
                </div>
                <div className="card-body p-3">

                    <form onSubmit={this.postData}>

                        {/* Fake url input use to fetch data from api */}
                        <InputWidget
                            name="_tempUrl"
                            defaultValue={bookmark.url}
                            label="Url"
                            onChange={this.handleChangeUrl}
                            helpText={"Please paste a Flickr or Vimeo Url"} />

                        {/* Loader */}
                        <div className={isLoading ? "" : "d-none"}>
                            <div className="progress">
                                <div className="progress-bar progress-bar-striped progress-bar-animated col-lg-12" role="progressbar" aria-valuenow={100} aria-valuemin={0} aria-valuemax={100} />
                            </div>
                            <br />
                        </div>

                        <Form bookmark={bookmark} id={id} />

                    </form>
                </div>
            </div>


        </React.Fragment>
    }

    /**
     * Check if url is valid
     */
    private isValidUrl(url: string) {
        return (!url || url.match('www.flickr.com') || url.match('vimeo.com'));
    }

    /**
     * Fetch data from api when url change
     * @param e FormEvent
     */
    private async handleChangeUrl(e: any) {
        const input = e.target;
        const url = input.value;

        if (url && this.isValidUrl(url)) {

            this.setState({
                isLoading: true
            });

            const bookmark = await this.HTTP.Get<Bookmark>(this.mediaEnpoint, url, "url");

            if (bookmark.title) {
                this.setState({
                    bookmark,
                    isLoading: false
                })
            } else {
                this.setState({
                    isLoading: false
                })
            }
        }
    }

    /**
     * Post data to api
     * @param e 
     */
    private postData(e: any) {
        e.preventDefault();

        const bookmark = this.transformer.transformFormToBookmark(e.target.elements);

        const id = e.target.elements['id'].value;
        if (id > 0) {
            this.HTTP.Put(this.endpoint, bookmark, id);
        } else {
            this.HTTP.Post(this.endpoint, bookmark);
        }

        this.setState({
            redirectUrl: "/"
        })
        return false;
    }

}
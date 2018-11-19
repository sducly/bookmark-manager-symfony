import * as React from "react";

import { IEditProps, IEditState } from "../interface";
import { InputWidget } from "../../widget";
import Bookmark from "../../../models/bookmark";
import HTTP from "../../../services/Http";
import BookmarkEndpoint from "../../../endpoints/bookmarkEndpoint";
import { BookmarkForm } from "./Includes/BookmarkForm";
import { VideoForm } from "./Includes/VideoForm";
import MediaEndpoint from "../../../endpoints/MediaEndpoint";
import Video from "../../../models/video";
import { Redirect } from "react-router";
import Tag from "../../../models/tags";

export default class Edit extends React.Component<IEditProps, IEditState> {

    private HTTP = new HTTP();
    private endpoint = new BookmarkEndpoint();
    private mediaEnpoint = new MediaEndpoint();

    constructor(props: IEditProps) {
        super(props);
        this.handleChangeUrl = this.handleChangeUrl.bind(this);

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

        if(redirectUrl) {
            return <Redirect to={redirectUrl}/>
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
                    <form onSubmit={(e) => this.postData(e)}>

                        {/* Fake url use to fetch data from api */}
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

                        <BookmarkForm bookmark={bookmark} id={id}/>

                        <VideoForm bookmark={bookmark} />

                        {/* Confirm button */}
                        <input
                            type="submit"
                            className="btn btn-dark col-lg-12"
                            value="OK" />
                    </form>
                </div>
            </div>


        </React.Fragment>
    }

    /**
     * Post data to api
     * @param e 
     */
    private postData(e: any) {
        e.preventDefault();
        
        const bookmark = this.hydrateBookmark(e.target.elements);
        
        const id = e.target.elements['id'].value;
        if(id > 0) {    
            this.HTTP.Put(this.endpoint, bookmark, id);
        } else {
            this.HTTP.Post(this.endpoint, bookmark);
        }

        this.setState({
            redirectUrl: "/"
        })
        return false;
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

    /** Convert form data to bookmark */
    private hydrateBookmark(data: []) {
        let bookmark = new Bookmark();
        bookmark.authorName = data['authorName'].value;
        bookmark.height = data['height'].value;
        bookmark.width = data['width'].value;
        bookmark.title = data['title'].value;
        bookmark.thumbnailUrl = data['thumbnailUrl'].value;
        //bookmark.tags = data['tags'].value();
        bookmark.url = data['url'].value;
        
        if(data['duration'] && data['duration'].value) {
            let video = new Video();
            video.duration = data['duration'].value
            bookmark.video = video;
        }

        const tagsAsString = data['tags'].value;
        const tags:Tag[] = [];
        
        tagsAsString.split(",").map((label: string) => {
            let tag:Tag = new Tag();
            tag.label = label;
            tags.push(tag);
        });

        bookmark.tags = tags;
        
        return bookmark;
    }
}
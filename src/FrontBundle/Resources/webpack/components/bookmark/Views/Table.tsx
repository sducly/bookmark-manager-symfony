import * as React from "react";
import TableDTO from "../../../dto/TableDTO";
import BookmarkEndpoint from "../../../endpoints/bookmarkEndpoint";
import HTTP from "../../../services/Http";
import Bookmark from "../../../models/bookmark";
import Row from "./Row";
import Pagination from "../../pagination/Views/Pagination";
import Confirm from "./Confirm";
import { ITableState } from "../interface";

class Table extends React.Component<any, ITableState> {

    private endpoint = new BookmarkEndpoint;
    private HTTP = new HTTP();

    public constructor(props: any) {
        super(props);
        this.delete = this.delete.bind(this);
        this.closeModal = this.closeModal.bind(this);
        this.confirmDelete = this.confirmDelete.bind(this);
        this.refresh = this.refresh.bind(this);
        this.changePage = this.changePage.bind(this);

        this.state = {
            currentPage: 1,
            elems: [],
            nbElems: 0,
            nbPages: 0,
            needConfirmation: false,
            deletedBookmark: undefined
        }
    }

    public componentWillMount() {
        this.refresh();
    }

    public async changePage(page: number) {
        let response = await this.HTTP.Get<TableDTO>(this.endpoint, page);
        this.setState({...response});
    }

    public render() {
        return <React.Fragment>
            <h1 className="cover-heading">
                All bookmarks
            </h1>

            <table className="table table-striped">
                <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Added date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {this.state.elems.map((bookmark: Bookmark) => {
                        return <Row bookmark={bookmark} key={bookmark.id} confirmAction={this.confirmDelete}/>
                    })}
                </tbody>
            </table>

            <Pagination nbPages={this.state.nbPages} currentPage={this.state.currentPage} onClick={this.changePage}/>

            <Confirm 
                isOpen={this.state.needConfirmation}
                cancelAction={this.closeModal}
                validAction={this.delete}
            />

        </React.Fragment>
    }

    private refresh() {
        this.changePage(this.state.currentPage);
    }

    private confirmDelete(bookmark: Bookmark) {
        this.setState({
            needConfirmation: true,
            deletedBookmark: bookmark
        })
    }

    private closeModal() {
        this.setState({
            needConfirmation: false,
            deletedBookmark: undefined
        })
    }

    private async delete() {
        const bookmark = this.state.deletedBookmark;
        
        if(bookmark) {
            await this.HTTP.Delete(this.endpoint, bookmark.id);
            this.refresh();    
        }
        
        this.setState({
            needConfirmation: false,
            deletedBookmark: undefined
        })
    }
}

export default Table;



import * as React from "react";
import { IPaginationProps } from "../interface";
import PaginationItem from "./PaginationItem";

export default class Pagination extends React.Component<IPaginationProps, {}> {

    public getItems() {
        const {currentPage, nbPages, onClick} = this.props;
        let items = [];
        
        for(let i = 1; i<= nbPages; i++) {
            items.push(<PaginationItem classes={i == currentPage ? "active": ""} label={i.toString()} key={i} onClick={() => onClick(i)}/>)
        }
        return items;
    }

    render() {
        const {currentPage, nbPages, onClick} = this.props;

        return <nav aria-label="navigation">
            <ul className="pagination justify-content-center">
            <PaginationItem classes={currentPage == 1 ? "disabled": ""} label="Previous" onClick={() => onClick(currentPage - 1)}/>
            {this.getItems()}
            <PaginationItem classes={currentPage == nbPages ? "disabled": ""} label="Next" onClick={() => onClick(currentPage + 1)}/>
            </ul>
        </nav>
    }
}
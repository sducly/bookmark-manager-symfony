import Bookmark from "../models/bookmark";

export default class TableDTO {
    elems: Bookmark[];
    nbElems: number;
    nbPages: number;
    currentPage: number;
}
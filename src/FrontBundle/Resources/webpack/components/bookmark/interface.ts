import Bookmark from "../../models/bookmark";
import TableDTO from "../../dto/TableDTO";
import { ModalProps } from "reactstrap";

export interface IRowProps {
    bookmark: Bookmark;
    confirmAction: Function;
}

export interface ITableState extends TableDTO {
    needConfirmation: boolean,
    deletedBookmark?: Bookmark
}

export interface IConfirmProps extends ModalProps {
    isOpen: boolean;
    cancelAction: Function;
    validAction: Function;
}
import * as React from "react";
import { IPaginationItemProps } from "../interface";

export default class PaginationItem extends React.Component<IPaginationItemProps, {}> {
    render() {
        const {classes, label, onClick} = this.props;
        return <li className={"page-item " + classes}>
            <a className="page-link" onClick={(e) => {
                onClick();
                return false;
            }}>
                {label}
        </a>
        </li>

    }
}
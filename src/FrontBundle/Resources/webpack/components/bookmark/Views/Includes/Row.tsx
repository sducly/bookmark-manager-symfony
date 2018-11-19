import * as React from "react";
import {IRowProps} from "../../interface";
import { generatePath } from "react-router";
import { Link } from "react-router-dom";

export default class Row extends React.Component<IRowProps, {}> {
    render() {
        const {title, authorName,url,  thumbnailUrl, addedDate, id}  = this.props.bookmark;
        const addedDateObject = new Date(addedDate);
        const editUrl = generatePath("/edit/:id", {
            id: id
        });
        return <tr>
            <td><img src={thumbnailUrl} width={80}/></td>
            <td className="align-middle">{title}</td>
            <td className="align-middle">{authorName}</td>
            <td className="align-middle">{addedDateObject.toLocaleString()}</td>
            <td className="align-middle">
                <a href={url} target='_blank'>
                    <i className="fa fa-globe"/>
                </a>
                
                <Link to={editUrl}>
                    <i className="fa fa-pencil"/>
                </Link>
                
                <a href="#" onClick={(e) => {
                    this.props.confirmAction(this.props.bookmark);
                    return false;
                }}>
                    <i className="fa fa-times"/>
                </a>
            </td>
        </tr>
    }
}
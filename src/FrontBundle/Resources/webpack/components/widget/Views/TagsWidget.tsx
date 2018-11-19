import * as React from "react";

import * as TagsInput from 'react-tagsinput'

import { HiddenWidget } from "../";
import { ITagsInputProps } from "../types";
import Tag from "../../../models/tags";


/**
 * Tags widget
 */
export default class Tags extends React.Component<ITagsInputProps, { values: string[] }> {

    constructor(props: ITagsInputProps) {
        super(props);
        this.state = {
            values: this.getArrayValues(this.props.defaultValue)
        }
        this.handleChange = this.handleChange.bind(this);
        this.getArrayValues = this.getArrayValues.bind(this);
    }

    public render() {
        return <div className="form-group row">
            <label className="col-sm-3 col-form-label col-form-label-sm text-right">{this.props.label}</label>
            <div className="col-sm-9">
                <TagsInput value={this.state.values} onChange={this.handleChange} />
                <HiddenWidget name={this.props.name} value={this.state.values.join()} />
            </div>
        </div>

    }

    /**
     * Return a array of string
     */
    private getArrayValues(tags?: Tag[]): string[] {
        if (!tags) {
            return [];
        }

        let arrayValue: string[] = [];

        tags.map((tag: Tag) => {
            return arrayValue.push(tag.label)
        });

        return arrayValue;
    }

    /**
     * Handle Change on tags list (remove, add, ...)
     * @param tags String[]
     */
    private handleChange(tags: string[]) {
        this.setState({
            values: tags
        })
    }
}
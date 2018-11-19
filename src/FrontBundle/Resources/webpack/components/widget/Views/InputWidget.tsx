import * as React from "react";
import { ITextInputProps } from "../types";

/**
 * Input widget
 */
const renderHelpText = (helpText: string) => {
    if(helpText) {
        return <small id="passwordHelpBlock" className="form-text text-muted text-left">{helpText}</small>;
    }
    return null;
}

export default ({ name, label, type = "text", required = true, onChange, error = false, defaultValue, helpText = "" }: ITextInputProps) => {
    
    return <div className="form-group row">
        <label className="col-sm-3 col-form-label col-form-label-sm text-right">{label}</label>
        <div className="col-sm-9">
            <input
                defaultValue={defaultValue}
                onChange={onChange}
                required={required}
                className="form-control form-control-sm"
                type={type}
                id={name}
                name={name}/>
                {renderHelpText(helpText)}
        </div>
    </div>
}
import Tag from "../../models/tags";

export interface IInputProps {
    helpText?: string,
    error?: boolean,
    onChange?: (T: any) => void
    type?: "text" | "password" | "hidden" | "email",
    name: string,
    label: string,
    required?: boolean
}
export interface ITextInputProps extends IInputProps{
    defaultValue?: string,
}

export interface ITagsInputProps extends IInputProps {
    defaultValue?: Tag[]
}

export interface IPasswordState {
    password?: string,
    confirmation?: string
}

export interface IPasswordProps {
    required: boolean,
    defaultValue?: string | number,
}
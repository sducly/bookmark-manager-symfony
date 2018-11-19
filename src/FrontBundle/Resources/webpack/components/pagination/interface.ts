export interface IPaginationProps {
    nbPages: number;
    currentPage: number;
    onClick: Function;
}

export interface IPaginationItemProps {
    classes: string;
    label: string;
    onClick: Function;
}
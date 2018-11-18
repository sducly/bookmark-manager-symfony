import 'bootstrap/dist/css/bootstrap.min.css';
import './scss/fo.scss';

import * as React from "react";
import * as ReactDOM from "react-dom";

import Router from "./services/Router";

ReactDOM.render(
    <Router/>,
    document.getElementById("bookmark-manager")
);
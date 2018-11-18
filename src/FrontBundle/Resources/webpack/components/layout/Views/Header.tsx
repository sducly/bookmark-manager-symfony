import * as React from "react";
import { NavLink } from "react-router-dom";

export default () => {
    return <header className="masthead mb-auto">
        <div className="inner">
            <h3 className="masthead-brand">
                Bookmark Manager
        </h3>
            <nav className="nav nav-masthead justify-content-center">
                <NavLink exact to="/" className="nav-link" activeClassName={"active"}>Home</NavLink>
                <NavLink to="/about" className="nav-link" activeClassName={"active"}>About</NavLink>
                <NavLink to="/topics" className="nav-link" activeClassName={"active"}>Topics</NavLink>
            </nav>
        </div>
    </header>
}
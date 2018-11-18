import * as React from "react";
import Table from "../components/table/Views/Table";

import { BrowserRouter as Router, Route } from "react-router-dom";
import { Header, Footer } from "../components/layout";

const basename = (process.env.NODE_ENV || process.env.NODE_ENV === 'development') ? "app_dev.php" : "";
function BasicExample() {
    console.log(process.env.environement);
    return (
        <Router basename={basename}>
                <div className="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
 
                    <Header/>

                    <main role="main" className="inner cover">
                        <Route exact path="/" component={Table} />
                        <Route path="/about" component={About} />
                    </main>

                    <Footer/>
                </div>
        </Router>
    );
}

function About() {
    return (
        <div>
            <h2>About</h2>
        </div>
    );
}

export default BasicExample;
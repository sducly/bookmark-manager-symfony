import * as React from "react";
import Table from "../../bookmark/Views/Table";

import { BrowserRouter as Router, Route } from "react-router-dom";
import { Header, Footer } from "..";
import Main from "../../contact/Views/Main";
import Edit from "../../bookmark/Views/Edit";

const basename = (process.env.NODE_ENV || process.env.NODE_ENV === 'development') ? "app_dev.php" : "";

export default () => {
    return (
        <Router basename={basename}>
                <div className="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
 
                    <Header/>

                    <main role="main" className="inner cover">
                        <Route exact path="/" component={Table} />
                        <Route exact={true} path={"/edit/:id"} render={(props) => <Edit {...props} />} />
                        <Route exact path="/contact" component={Main} />
                    </main>

                    <Footer/>
                </div>
        </Router>
    );
}
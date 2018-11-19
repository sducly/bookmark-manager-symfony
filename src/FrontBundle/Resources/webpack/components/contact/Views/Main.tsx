import * as React from "react";

export default class Main extends React.Component {
    render() {
        return <React.Fragment>
            <h1>Contact</h1>
                <div className="card border-default rounded-0">
                    <div className="card-header p-0">
                        <div className="bg-default text-white text-left py-2">
                            <h5>
                                Sébastien DUCLY
                            </h5>
                        </div>
                    </div>
                    <div className="card-body p-3">

                        <ul className="list-unstyled mb-0">
                <li><i className="fa fa-map-marker fa-2x"></i>
                    <p>Roz Landrieux, France</p>
                </li>

                <li><i className="fa fa-phone mt-4 fa-2x"></i>
                    <p>06 67 38 01 59</p>
                </li>

                <li><i className="fa fa-envelope mt-4 fa-2x"></i>
                    <p><a href="mailto:sebastien.ducly@gmail.com">
                    sebastien.ducly@gmail.com
                    </a>
                    </p>
                </li>
            </ul>
                    </div>

                </div>
        </React.Fragment>
    }
}
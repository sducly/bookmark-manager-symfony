import * as React from "react";

class Table extends React.Component {
    public render() {
        return <React.Fragment>
            <h1 className="cover-heading">Cover your page.</h1>

            <table className="table table-striped">
                <thead>
                    <tr>
                        <th>Titi</th>
                        <th>Toto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>aaa</td>
                        <td>aaa</td>
                    </tr>
                    <tr>
                        <td>ddd</td>
                        <td>fff</td>
                    </tr>
                </tbody>
            </table>
        </React.Fragment>
    }
}

export default Table;



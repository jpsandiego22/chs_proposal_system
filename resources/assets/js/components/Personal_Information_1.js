import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Personal_Information_1 extends Component {
    render() {
        return (
            
                <div className="row">
                    <div className="col-md-12">
                        <div className="panel panel-default">
                            <div className="panel-heading">
                                <img width="70px" height="60px" src="asset/images/chsi_logo.png" alt="" />
                            </div>
                            <div className="panel-body">
                                <span id="product_iid" hidden></span>
                                <label><strong>CARITAS HEALTH SHIELD, INC.</strong></label>
                                <div className="col-md-12">
                                    <p className="card-description badge bg-green">
                                        <strong><span id="product_description"></span></strong>
                                    </p>
                                </div>
                                <p className="card-description">
                                    <strong>MEMBERSHIP APPLICATION</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

        );
    }
}

if (document.getElementById('personal_information_1')) {
    ReactDOM.render(<Personal_Information_1 />, document.getElementById('personal_information_1'));
}

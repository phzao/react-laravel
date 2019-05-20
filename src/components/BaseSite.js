import React from 'react'

const BaseSite = props =>
    <div className="container" >
        <div className="row">
            <div className="col pl-0 ml-0" style={{backgroundColor:'gray'}}>
                { props.children }
            </div>
        </div>
    </div>

export default BaseSite
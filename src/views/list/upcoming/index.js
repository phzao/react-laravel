import React from 'react'
import BaseSite from '../../../components/BaseSite';

class ListMovies extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
             list: []
        }
    }

    render() { 
        return (
        <BaseSite>
            <div className="row">
                <div className="col pl-0 ml-0">
                    
                </div>
            </div>
        </BaseSite>)
    }
}
  
export default ListMovies
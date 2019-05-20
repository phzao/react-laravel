import React from 'react'

class Home extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
             nextMovies: [],
             movie: {},
             loading: true,
             count: 0,
        }
      }
    
    render() {
        return <div></div>
    }
}

export default Home
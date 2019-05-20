import React from 'react'
import { BrowserRouter as Router, Switch, Route } from "react-router-dom"
import './App.css'
import NoRoute from './views/notFound';
import Routes from './routes/Routes';

class App extends React.Component {

  render() {
  
    return (
        <Router>
          <Switch>
            { Routes.map((route, k)=> <Route key={k} {...route}  />) }
            <Route component={NoRoute} />
          </Switch>
        </Router>)
    }
}

export default App
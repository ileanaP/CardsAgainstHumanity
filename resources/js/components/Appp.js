import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";
import Toolbar from './components/Toolbar/Toolbar';
import SideDrawer from './components/SideDrawer/SideDrawer';
import Backdrop from './components/Backdrop/Backdrop'
import sideDrawer from './components/SideDrawer/SideDrawer';
import Side from './components/Side/Side';
import Main from './components/Pages/Main/Main';
import Addd from "./components/Pages/Addd/Addd";

import './Appp.css';

class Appp extends Component {
  state = {
    sideDrawerOpen: false
  };

  drawerToggleClickHandler = () => {
    this.setState((prevState) => {
      return {sideDrawerOpen: !prevState.sideDrawerOpen};
    });
  };

  backdropClickHandler = () => {
    this.setState({sideDrawerOpen : false});
  };


  render() {
    let backdrop;

    if(this.state.sideDrawerOpen){
      backdrop = <Backdrop click = {this.backdropClickHandler} />;
    }

    return (
      <Router>
        <div className="App">
          <Toolbar drawerClickHandler = {this.drawerToggleClickHandler}
                  testtText = {this.state.testText} />
          <SideDrawer show={this.state.sideDrawerOpen}
                      closeSideDrawerFunction={this.backdropClickHandler}/>
          {backdrop}
            <div class="content">
      <div>
        <Switch>
          <Route path="/" exact component={Main} />
          <Route path="/addd" exact component={Addd}/>
        </Switch>
      </div>
    

            </div>
          </div>
          </Router>
    );
  }
}

function Home() {
  return <h2>Home</h2>;
}

function About() {
  return <h2>About</h2>;
}

function Users() {
  return <h2>Users</h2>;
}

export default Appp;

if (document.getElementById('appp')) {
  ReactDOM.render(<Appp />, document.getElementById('appp'));
}
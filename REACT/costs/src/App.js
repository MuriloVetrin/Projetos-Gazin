import { BrowserRoute as Router, Switch, Route } from 'react-router-dom'

function App() {
  return (
    <Route>
      <ul>
        <li>Home</li>
        <li>Contato</li>
      </ul>
      <switch>
        <Route path="/">
          <Home/>
        </Route>
        <Route path="/company">
          <Company/>
        </Route>
        <Route path="/contact">
          <Contact/>
        </Route>
        <Route path="/newproject">
          <NewProject/>
        </Route>
      </switch>
      <p>Footer</p>
    </Route>
  );
}

export default App;

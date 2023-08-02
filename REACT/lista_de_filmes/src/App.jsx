import React from 'react';
import { Link, Outlet } from 'react-router-dom';
import './App.css';

function App() {
  return (
    <div className="App">
      <nav id="navbar">
        <h2>
          <Link to="/">Lista de Filmes</Link>
        </h2>
        <Link to="/movie/1">Movie</Link>
        <Link to="/search">Search</Link>
      </nav>
      
      <Outlet />
    </div>
  );
}

export default App;

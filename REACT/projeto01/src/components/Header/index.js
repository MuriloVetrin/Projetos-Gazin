import './header.css';
import { Link } from 'react-router-dom';

function Header(){
    return(
        <header>
            <link className="logo" to="/">Prime Flix</link>
            <limk className="favoritos" to="/favoritos">Meus Filmes</limk>
        </header>
    )
}

export default Header;
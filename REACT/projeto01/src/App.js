import './App.css';
import HelloWorld from './components/HelloWorld';
import SayMyName from './components/SayMyName';
import Pessoa from './components/Pessoa';

function App() {

  const nome = 'Murilo'

  return (
    <div className="App">
      <HelloWorld />
      <SayMyName nome="Murilo" />
      <SayMyName nome="João" />
      <SayMyName nome={nome} />
      <Pessoa nome="Rodigo" idade="28" profissao="Programador" foto="https://hips.hearstapps.com/hmg-prod/images/2023-chevrolet-corvette-stingray-convertible-3lt-z51-116-1665496966.jpg?crop=0.612xw:0.459xh;0.107xw,0.541xh&resize=1200:*" />
    </div>
  );
}

export default App;

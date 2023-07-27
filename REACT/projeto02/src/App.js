import MostraNome from "./components/Nome";

function App() {
  return (
    <div>
      <h1>Components App</h1>
      <MostraNome aluno="Lucas" idade={25}/>
      <br />
      <MostraNome aluno="Ulton" idade={30}/>
    </div>
  );
}

export default App;

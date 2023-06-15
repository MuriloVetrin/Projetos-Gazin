function createUser(){
    const name = document.getElementById('name').value
    const cpf = document.getElementById('cpf').value
    const address = document.getElementById('address').value
    const telephone = document.getElementById('telephone').value
    const email = document.getElementById('email').value

    const form = new FormData()

    form.append('name', name);
    form.append('cpf', cpf)
    form.append('address', address)
    form.append('telephone', telephone)
    form.append('email', email)

    const url ='http://localhost/php/crud-clientes/cadastro.php';

    fetch(url, {
        method: 'POST',
        body: form
      }).then(response => {
        if (!response.ok) {
          throw new Error('Erro na requisição');
        }
        return response.json();
      }).then(result => {
        console.log(result);
      }).catch(err => {
        console.log(err);
      });
      

}
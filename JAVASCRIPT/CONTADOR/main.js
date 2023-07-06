const dataEvento = new Date('2024-07-10');

function atualizarContador() {
  const agora = new Date();
  const diffTempo = dataEvento - agora;

  const dias = Math.floor(diffTempo / (1000 * 60 * 60 * 24));
  const horas = Math.floor((diffTempo % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutos = Math.floor((diffTempo % (1000 * 60 * 60)) / (1000 * 60));
  const segundos = Math.floor((diffTempo % (1000 * 60)) / 1000);

  document.getElementById('dias').textContent = formatarDigito(dias);
  document.getElementById('horas').textContent = formatarDigito(horas);
  document.getElementById('minutos').textContent = formatarDigito(minutos);
  document.getElementById('segundos').textContent = formatarDigito(segundos);
}

function formatarDigito(digito) {
  return digito.toString().padStart(2, '0');
}

setInterval(atualizarContador, 1000);

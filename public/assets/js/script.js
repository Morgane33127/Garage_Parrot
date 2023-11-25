const range = document.querySelector('#prix');
const range2 = document.querySelector('#km');
const price = document.querySelector('.price');
const kilo = document.querySelector('.kilometer');

const elem = document.createElement('span');
price.appendChild(elem);

elem.textContent = range.value;

range.addEventListener('input', () => {
  elem.textContent = range.value;
});

const elem2 = document.createElement('span');
kilo.appendChild(elem2);

elem2.textContent = range2.value;

range2.addEventListener('input', () => {
  elem2.textContent = range2.value;
});


function changePrix() {
  let prix = document.getElementById('prix').value;

  const xhr = new XMLHttpRequest();

  xhr.addEventListener('readystatechange', () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let affichage = document.getElementById("request");
      affichage.innerHTML = xhr.response;

    }

  })
  xhr.open('GET', '../src/affichageVoitures.php?prix=' + prix);
  xhr.send();

}


function changeKm() {
  let kilometer = document.getElementById('km').value;

  const xhr = new XMLHttpRequest();

  xhr.addEventListener('readystatechange', () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let affichage = document.getElementById("request");
      affichage.innerHTML = xhr.response;

    }

  })
  xhr.open('GET', '../src/affichageVoitures.php?km=' + kilometer);
  xhr.send();

}

function changeDate() {
  let date = document.getElementById('year').value;

  const xhr = new XMLHttpRequest();

  xhr.addEventListener('readystatechange', () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let affichage = document.getElementById("request");
      affichage.innerHTML = xhr.response;

    }

  })
  xhr.open('GET', '../src/affichageVoitures.php?year=' + date);
  xhr.send();

}
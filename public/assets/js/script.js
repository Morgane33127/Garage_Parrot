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


range.addEventListener('change', affichagePrix);

function affichagePrix(){
  value= range.value;
  changePrix(value);
}

function changePrix(value) {
  let prix = value;
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


const elem2 = document.createElement('span');
kilo.appendChild(elem2);

elem2.textContent = range2.value;

range2.addEventListener('input', () => {
  elem2.textContent = range2.value;
});

range2.addEventListener('change', affichageKm);

function affichageKm(){
  value= range2.value;
  changeKm(value);
}

function changeKm(value) {
  let kilometer = value;

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

year = document.getElementById('year');
year.addEventListener('change', affichageAnnee);

function affichageAnnee(){
  value= year.value;
  changeDate(value);
}


function changeDate(value) {
  let date = value;

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
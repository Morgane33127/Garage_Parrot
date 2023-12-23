const range = document.querySelector('#prix');
const range2 = document.querySelector('#km');
const price = document.querySelector('.price');
const kilo = document.querySelector('.kilometer');
const div = document.getElementById('request');

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
  let prixapasser = value;

  fetch('src/affichageVoitures.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ 'prix': prixapasser })
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Erreur lors de la requête.');
    }
    return response.text();

  })
  .then(data => {
    div.innerHTML = '';
    div.innerHTML = data;
    })
  .catch(error => {
    console.error('Erreur :', error);
  });
};


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

  fetch('src/affichageVoitures.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ 'km': kilometer })
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Erreur lors de la requête.');
    }
    return response.text();
  })
  .then(data => {
    div.innerHTML = '';
    div.innerHTML = data;

    })
  .catch(error => {
    console.error('Erreur :', error);
  });

}

year = document.getElementById('year');
year.addEventListener('change', affichageAnnee);

function affichageAnnee(){
  value= year.value;
  changeDate(value);
}


function changeDate(value) {
  let date = value;

  fetch('src/affichageVoitures.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ 'date': date })
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Erreur lors de la requête.');
    }
    return response.text();
  })
  .then(data => {
    div.innerHTML = '';
    div.innerHTML = data;

    })
  .catch(error => {
    console.error('Erreur :', error);
  });

}
/* EN : Selection of input range and date field. For range field creation of a div to display values ​​on input input.
Update cars if one of the 3 filters is changed.

FR : Sélection des input range et du champ date. Pour champs ranges creation d'une div d'affichage des valeurs sur entrée input.
Mise à jour des voitures si changement d'au moins 1 des 3 filtres.
*/
const prixmin = document.querySelector('#prixmin');
const prixmax = document.querySelector('#prixmax');

const kmmin = document.querySelector('#kmmin');
const kmmax = document.querySelector('#kmmax');


const price = document.getElementById('price');
const kilo = document.getElementById('kilometer');

const div = document.getElementById('request');
const year = document.getElementById('year');

const elem = document.createElement('span');
price.appendChild(elem);

elem.textContent = prixmin.value + '€ - ' + prixmax.value + '€';

prixmin.addEventListener('input', () => {
  elem.textContent = prixmin.value + '€ - ' + prixmax.value + '€';
});

prixmax.addEventListener('input', () => {
  elem.textContent = prixmin.value + '€ - ' + prixmax.value + '€';
});

const elem2 = document.createElement('span');
kilo.appendChild(elem2);

elem2.textContent = kmmin.value + 'km - ' + kmmax.value + 'km';

kmmin.addEventListener('input', () => {
  elem2.textContent = kmmin.value + 'km - ' + kmmax.value + 'km';
});

kmmax.addEventListener('input', () => {
  elem2.textContent = kmmin.value + 'km - ' + kmmax.value + 'km';
});

prixmin.addEventListener('change', affichageFiltre);
prixmax.addEventListener('change', affichageFiltre);
kmmin.addEventListener('change', affichageFiltre);
kmmax.addEventListener('change', affichageFiltre);
year.addEventListener('change', affichageFiltre);


  /**
   * Displaying cars based on filtered data thanks to a callback function.
   */
  function affichageFiltre(){
  priceMinValue = prixmin.value;
  priceMaxValue = prixmax.value;
  kmMinValue = kmmin.value;
  kmMaxValue = kmmax.value;

  dateValue = year.value;
  changeVoitures(priceMinValue, priceMaxValue, kmMinValue, kmMaxValue, dateValue);
}

  /**
   * Updating the display request using a fetch
   *
   * @param int $priceMinValue
   * @param int $priceMaxValue
   * @param int $kmMinValue
   * @param int $kmMaxValue
   * @param int $kmValue
   * @param string $dateValue
   * 
   * @return text
   */
function changeVoitures(priceMinValue, priceMaxValue, kmMinValue, kmMaxValue, dateValue) {

  if(dateValue === ''){
    const d = new Date();
    dateValue = d.getFullYear();
  }

  fetch('src/affichageVoitures.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ 'prixmin': priceMinValue, 'prixmax': priceMaxValue, 'kmmin' : kmMinValue, 'kmmax' : kmMaxValue,'date': dateValue})
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
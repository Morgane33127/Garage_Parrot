/* EN : Selection of input range and date field. For range field creation of a div to display values ​​on input input.
Update cars if one of the 3 filters is changed.

FR : Sélection des input range et du champ date. Pour champs ranges creation d'une div d'affichage des valeurs sur entrée input.
Mise à jour des voitures si changement d'au moins 1 des 3 filtres.
*/
const range = document.querySelector('#prix');
const range2 = document.querySelector('#km');
const price = document.querySelector('.price');
const kilo = document.querySelector('.kilometer');
const div = document.getElementById('request');
const year = document.getElementById('year');

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

range.addEventListener('change', affichageFiltre);
range2.addEventListener('change', affichageFiltre);
year.addEventListener('change', affichageFiltre);


  /**
   * Displaying cars based on filtered data thanks to a callback function.
   */
  function affichageFiltre(){
  priceValue = range.value;
  kmValue = range2.value;
  dateValue = year.value;
  changeVoitures(priceValue, kmValue, dateValue);
}

  /**
   * Updating the display request using a fetch
   *
   * @param int $priceValue
   * @param int $kmValue
   * @param string $dateValue
   * 
   * @return text
   */
function changeVoitures(priceValue, kmValue, dateValue) {

  if(dateValue === ''){
    const d = new Date();
    dateValue = d.getFullYear();
  }

  fetch('src/affichageVoitures.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ 'prix': priceValue, 'km' : kmValue, 'date': dateValue})
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
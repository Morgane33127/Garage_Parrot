let url = new URL(document.location.href);

if(url.searchParams.get("page") === "accueil" || url.searchParams.get("page") === null){

//Carousel
    const back = document.getElementById("back");
    const next = document.getElementById("next");
    const divs = document.querySelector("#slider");
    const div0 = document.querySelector("#div0");
    const div3 = document.querySelector("#div3");
    let countDiv = divs.children.length;
    let lastDiv = document.getElementById("div" + (countDiv-3));


    try {
    next.addEventListener("click", nextEvent);
    } catch (e){
      console.log(e);
    }

    try {
    back.addEventListener("click", backEvent);
    } catch (e){
      console.log(e);
    }

    //If div0 is empty visibility=hidden
    if(div0.innerHTML === ""){
      back.style.visibility= "hidden";
    }

  /**
   * For each children of slider, the content become the content i+1 if next
   * If div0 is empty back button is hidden
   * If div3 is empty next button is hidden
   */
    function nextEvent () {

      for (let i = 1; i < countDiv-1; i++) {
          if(divs.children[(i+1)].id !== "next"){
            divs.children[i].innerHTML =  divs.children[(i+1)].innerHTML; 
          }
          if(i === countDiv-2){
          lastDiv.innerHTML = div0.innerHTML;
          }

      }

      if(div0.innerHTML !== ""){
        back.style.visibility= "visible";
      } else {
        back.style.visibility= "hidden";
      }

      
      if(div3.innerHTML !== lastDiv.innerHTML){
        next.style.visibility= "visible";
      } else {
        next.style.visibility= "hidden";
      }

    }

  /**
   * For each children of slider, the content become the content i-1 if back
   * If div0 is empty back button is hidden
   * If div3 is empty next button is hidden
   */
    function backEvent () {

      for (let i = countDiv-1; i >1 ; i--) {
        if(divs.children[(i)].id != "next"){
          divs.children[i].innerHTML =  divs.children[(i-1)].innerHTML;
        }
        if(i === countDiv-1){
           div0.innerHTML = lastDiv.innerHTML;
          }
    }
    if(div3.innerHTML !== lastDiv.innerHTML){
      next.style.visibility= "visible";
    } else {
      next.style.visibility= "hidden";
    }

      if(div0.innerHTML !== ""){
      back.style.visibility= "visible";
    } else {
      back.style.visibility= "hidden";
    }
    }
  }

  if(url.searchParams.get("page") === "vehicules"){

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

//elem.textContent = prixmin.value + '€ - ' + prixmax.value + '€';
elem.textContent = `${prixmin.value}€ - ${prixmax.value}€`;

prixmin.addEventListener('input', () => {
  elem.textContent = `${prixmin.value}€ - ${prixmax.value}€`;
});

prixmax.addEventListener('input', () => {
  elem.textContent = `${prixmin.value}€ - ${prixmax.value}€`;
});

const elem2 = document.createElement('span');
kilo.appendChild(elem2);

elem2.textContent = `${kmmin.value}km - ${kmmin.value}km`;

kmmin.addEventListener('input', () => {
  elem2.textContent = `${kmmin.value}km - ${kmmin.value}km`;
});

kmmax.addEventListener('input', () => {
  elem2.textContent = `${kmmin.value}km - ${kmmin.value}km`;
});

try {
  prixmin.addEventListener('change', affichageFiltre);
  prixmax.addEventListener('change', affichageFiltre);
  kmmin.addEventListener('change', affichageFiltre);
  kmmax.addEventListener('change', affichageFiltre);
  year.addEventListener('change', affichageFiltre);
} catch (e){
  console.log(e);
}

  /**
   * Displaying cars based on filtered data thanks to a callback function.
   */
  function affichageFiltre() {
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
  }

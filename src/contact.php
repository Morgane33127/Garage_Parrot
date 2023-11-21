<div class="container">

  <style>
    #section1 {
      display: flex;
      justify-content: flex-start;
      flex-wrap: nowrap;
      flex-direction: row;
      align-items: center;
    }
  </style>

  <section id="section1" style="padding:5%">
    <div style="text-align: center; background-color:#D92332; height:400px; width:100%; 
    color: white; font-weight: bold; margin:30px;">
      <span style="border: solid; font-weight: bold; border-color : #D92332;text-align:center; 
      background-color : white; color: #D92332;border-radius:30px;">1 rue de nulle part 33600 Pessac</span>
      <span style="border: solid; font-weight: bold; border-color : #D92332;text-align:center; 
      background-color : white; color: #D92332;border-radius:30px;">N° de tel</span>
    </div>
    <div class="logo">
      <h3>Nous contacter</h3>
      <input type="text" placeholder="nom*" required>
      <input type="text" placeholder="prenom*" required>
      <input type="email" placeholder="email*" required>
      <input type="tel" placeholder="tel*" required>
      <textarea placeholder="Message**" required></textarea>
      <div class="contact">
        <button style="border: solid; font-weight: bold; border-color : #D92332;text-align:center; 
      background-color : white; color: #D92332;border-radius:30px;" type="submit">Envoyer</button>
      </div>
    </div>
  </section>

</div>

<?php

require_once 'footer.php';

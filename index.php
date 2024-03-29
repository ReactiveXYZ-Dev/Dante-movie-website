<?php
	// Basic auth setup
	$valid_passwords = array ("eng124" => "dantemovie");
	$valid_users = array_keys($valid_passwords);

	$user = $_SERVER['PHP_AUTH_USER'];
	$pass = $_SERVER['PHP_AUTH_PW'];

	$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

	if (!$validated) {
		header('WWW-Authenticate: Basic realm="My Realm"');
		header('HTTP/1.0 401 Unauthorized');
		die ("Not authorized");
	}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Dante's Inferno Movie</title>
  <link href="https://fonts.googleapis.com/css?family=Nosifer" rel="stylesheet">  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
  
</head>

<body>
  <canvas id="flame" style="position: absolute; bottom:0"></canvas>
  <div class="trailer" align="center" style="height: 100vh; background-image: url('./assets/cave_to_hell.jpg');background-attachment: fixed;background-size: cover;">
    <div class="logo">
      <img id="logo-img" style="height: 141px; width: 655px" src="./assets/movie_logo.png">
    </div>
    <div class="video">
      <iframe width="70%" src="https://www.youtube.com/embed/4zQMJB8PSJM" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="details">
      <img id="piemier-text" style="width: 330px; height: 66px"  src="./assets/premier_text.png">
      <div class="buttons" style="margin-top: -20px">
        <a href="#" style="cursor: pointer;" onclick="alert('sold OUT!!')">
          <img class="hover-btn" id="buy-ticket" style="cursor: pointer;" src="./assets/buy_ticket.png">
        </a>
        <a href="#" style="cursor: pointer">
          <img class="hover-btn" id="enter-inferno" style="cursor: pointer;" src="./assets/enter_inferno.png">
        </a>
      </div>
    </div>
  </div>
  <div class="timeline-container" id="timeline-1">
    <div class="timeline-header">
      <h2 class="timeline-header__title">Dante's Pilgrimage Through Inferno</h2>
      <h3 class="timeline-header__subtitle">How sins are revealed</h3>
    </div>
    <div class="timeline">
      <div class="timeline-item" data-text="River of Archelon">
        <div class="timeline__content"><img class="timeline__img" src="./assets/river_archelon.jpeg"/>
          <h2 class="timeline__content-title">Entrance</h2>
          <p class="timeline__content-desc">
            The River of Archelon is the gateway of hell for all sinful souls. Dante will start his redemption through this gateway and see a world that confuses him, frights him, challenges him but ultimately redeems him.
          </p>
        </div>
      </div>
      <div class="timeline-item" data-text="Pre-Christain Suffering">
        <div class="timeline__content"><img class="timeline__img" src="./assets/limbo.jpeg"/>
          <h2 class="timeline__content-title">Limbo</h2>
          <p class="timeline__content-desc">A circle of hell that holds pagan souls unable to hear the word of the Christ. Dante's guide, Virgil, along with many Pre-Christian lives are bearing torments in this circle. While not suffering from piercing pain like other circles, souls here are punished with eternal lonliness and darkness. </p>
        </div>
      </div>
      <div class="timeline-item" data-text="Sexual cues to Sin">
        <div class="timeline__content"><img class="timeline__img" src="./assets/lust.jpeg"/>
          <h2 class="timeline__content-title">Lust</h2>
          <p class="timeline__content-desc">Endless thunderstorms hereby tortures souls that fall for love and sex. Dante is going to face his first challenge, when he falls for lust after promising Beatrice that he will forsaken all joys of flesh until he returns. How would him face this sin?</p>
        </div>
      </div>
      <div class="timeline-item" data-text="Superfluous desire of food">
        <div class="timeline__content"><img class="timeline__img" src="./assets/glutton.jpeg"/>
          <h2 class="timeline__content-title">Glutton</h2>
          <p class="timeline__content-desc">Monstrous beasts like Ceberus torture sinful souls that fail to control their desire for edibles. This desire is a surrender to nature of sensuality and self-indulgence.</p>
        </div>
      </div>
      <div class="timeline-item" data-text="Money is the evil of all">
        <div class="timeline__content"><img class="timeline__img" src="./assets/greed.jpeg"/>
          <h2 class="timeline__content-title">Greed</h2>
          <p class="timeline__content-desc">For those who grasp their wealth so much and do not know to suffice, this is their destiny. Boiling gold burns their soul, golden chambers incarcerate them indefinitely; they are punished with what they love. Dante sees his corrupted father in this circle. Will he face his father's sin, just like facing his own? </p>
        </div>
      </div>
      <div class="timeline-item" data-text="Unleashed anger is disaster">
        <div class="timeline__content"><img class="timeline__img" src="./assets/anger.jpeg"/>
          <h2 class="timeline__content-title">Anger</h2>
          <p class="timeline__content-desc">Souls with uncontainable wrath are placed in this circle, chained on mountains and burned with fire. Dante sees himself when he was fighting for the crusade, when he put his wrath on prisoners. Will he repent and leave himself in this circle?</p>
        </div>
      </div>
      <div class="timeline-item" data-text="When faith is misled">
        <div class="timeline__content"><img class="timeline__img" src="./assets/heresy.jpeg"/>
          <h2 class="timeline__content-title">Heresy</h2>
          <p class="timeline__content-desc">This circle contains the souls who are misled into other faiths, and torments those who claim to absolve sins in the name of the evil.</p>
        </div>
      </div>
      <div class="timeline-item" data-text="Violence is paid back with violence">
        <div class="timeline__content"><img class="timeline__img" src="./assets/violence.jpeg">
          <h2 class="timeline__content-title">Violence</h2>
          <p class="timeline__content-desc">
            Those whom use violence is here tortured by the boiling blood on their hand. Dante sees many of his own deeds commited during his crusade, will he be able to keep bearing his sins and continue? 
          </p>
        </div>
      </div>
      <div class="timeline-item" data-text="Sign of cowardice">
        <div class="timeline__content"><img class="timeline__img" src="./assets/suicide.jpeg"/>
          <h2 class="timeline__content-title">Suicide</h2>
          <p class="timeline__content-desc">
            The Wood Of Suicide resides in the second ring of the circle of Violence, where the violence is not imposed on others, but oneself. Here, Dante encouters his mother, a suicided woman who was so desparate to relieve from the tyranny of Dante's father. 
          </p>
        </div>
      </div>
      <div class="timeline-item" data-text="Betrayal to others is betrayal to yourself">
        <div class="timeline__content"><img class="timeline__img" src="./assets/treachery.jpeg"/>
          <h2 class="timeline__content-title">Treachery</h2>
          <p class="timeline__content-desc">
            For those who have committed treachery, their souls are trapped here on unstable ice, which will make them fall if the ice breaks, just like how they would feel when they commit treachery. Dante encounters Beatrice again, whom he had commited this deed to. He is dispair and wants to give up. Will his redemption stop here? 
          </p>
        </div>
      </div>
      <div class="timeline-item" data-text="Ultimate evilness">
        <div class="timeline__content"><img class="timeline__img" src="./assets/lucifer.jpeg">
          <h2 class="timeline__content-title">Lucifer</h2>
          <p class="timeline__content-desc">
            Standing before the evil of all evil and confessing wholeheartedly to his very own sin, Dante realizes his greater mission, to stop the evasion of Lucifer and to stop sins from spreading. Is his ready now to accomplish his ultimate mission? and is that an end?
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="demo-footer">
    <a>Educational Purpose only. Built by</a>
    <a href="https://reactive.xyz" target="_blank">Reactive XYZ</a>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src="js/index.js"></script>

</body>
</html>

<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/boilerplate/definitions.php");
?>

<html>
<?php include($boilerplate_html_header); ?>

<body>
  <div id="container">
    <?php include($boilerplate_header); ?>

    <main>
      <h2>Registrieren</h2>
      <div id="regmain">
        <section class="regform">
          <form action="/etc/registerd.php" method="post" enctype="multipart/form-data">
            <h3>Profil</h3>
            <input name="username" type="text" maxlength="16" placeholder="Nutzername *">
            <label style="width:10%; margin-right:20px" for="public"> Profilbild</label>
            <input name="profile_picture" id="pb" style="width:50%" type="file">
            <textarea name="description" rows="4" cols="25" style="resize: vertical" placeholder="Beschreibung"></textarea>
            <h3> Datenschutz </h3>
            <input checked name="public" id="public" style="width:10%" type="checkbox">
            <label style="width:100%" for="public"> Mein yasn-Profil soll öffentlich angezeigt werden</label>
            <br>
            <input name="tos" id="tos" style="width:10%" type="checkbox">
            <label style="width:100%" for="tos"> Ich akzeptiere die <a href="https://mockup.io/tos/"> Terms of Service
              </a></label>
            <h3>Kontaktdaten</h3>
            <input name="vorname" type="text" placeholder="Vorname">
            <input name="nachname" type="text" placeholder="Nachname">
            <input name="tel" type="tel" placeholder="Telefonnummer">
            <input name="addr" type="text" placeholder="Adresse">
            <h3>Login</h3>
            <input name="email" type="email" placeholder="Email *">
            <input name="password" type="password" placeholder="Passwort *">
            <button type="submit">Registrieren</button>
          </form>
        </section>
      </div>
    </main>

    <?php include($boilerplate_footer); ?>

</body>

</html>

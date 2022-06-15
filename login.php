<main>
  <h2>Einloggen</h2>
  <div id="login">
    <section class="form">

      <!-- Anmeldeformular -->
      <form action="/etc/logind.php" method="post" enctype="multipart/form-data">
        <input name="email" type="text" placeholder="Emailadresse">
        <input name="password" type="password" placeholder="Passwort">
        <button type="submit">Einloggen</button>
      </form>

    </section>
    <div id="vertLine"></div>
    <section>
      <a class="register" href="/register.php">Registrieren</a>
    </section>
  </div>
</main>

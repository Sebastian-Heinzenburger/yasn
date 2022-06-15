<header>
  <a href="/"><img src="/img/logo.png" alt="Logo" /></a>
  <h1>yet another social network</h1>
  <span id="menu_label" onclick="build();">MENU</span>
</header>
<nav id="nav">
  <ul>
    <?php if ($_SESSION["username"]) : ?>
      <li>
        <a href="/">feed</a>
      </li>
      <li>
        <a href="/trending_posts.php">trending posts</a>
      </li>
      <li>
        <a href="/trending_profiles.php">trending profiles</a>
      </li>
      <li>
        <a href="/chat">chat</a>
      </li>
      <li>
        <a href="/myprofile.php">my profile</a>
      </li>
      <li>
        <a href="/logout.php">logout</a>
      </li>
    <?php else : ?>
      <li>
        <a href="/">login</a>
      </li>
      <li>
        <a href="/register.php">register</a>
      </li>
      <li>
        <a href="/trending_posts.php">trending posts</a>
      </li>
      <li>
        <a href="/trending_profiles.php">trending profiles</a>
      </li>
    <?php endif ?>
  </ul>
</nav>

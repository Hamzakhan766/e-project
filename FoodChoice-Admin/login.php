<?php include 'components/header.php'; ?>

<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Welcome!</h1>
    <p class="sign-up__subtitle">Log In to your account to continue</p>

    <form id="adminLogin" class="sign-up-form form" method="POST">
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input id="email" type="text" class="form-input" name="email" placeholder="Enter your email" required autofocus>
      </label>

      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input id="password" type="password" class="form-input" name="password" placeholder="Enter your password" required autofocus>
      </label>
      <a class="link-info forget-link" href="##">Forgot your password?</a>
     
      <button id="submit" class="form-btn primary-default-btn transparent-btn">Login</button>
    </form>
  </article>
</main>

<?php include 'DB_HELPER/firebase.php'; ?>
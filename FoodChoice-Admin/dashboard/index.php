<?php include '../components/header.php'; ?>
<?php include '../components/sidebar.php'; ?>
<main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Activity Tracking</h2>
        <div class="row stat-cards">
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon primary">
           
            <img src="../dist/img/user.png" alt="User name">
      
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">Users</p>
                <p class="stat-cards-info__title">Total Users</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success" id="totalUsers">
                    <i data-feather="trending-up" aria-hidden="true"></i>
                  </span>           
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon warning">
              <img src="../dist/img/category.png" alt="User name">
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">Category</p>
                <p class="stat-cards-info__title">Total Categories</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success" id="category">
                    <i data-feather="trending-up" aria-hidden="true"></i>
                  </span>
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon purple">
              <img src="../dist/img/receipe.png" alt="User name">
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">Receipe</p>
                <p class="stat-cards-info__title">Total Receipe</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success" id="receipe">
                    <i data-feather="trending-up" aria-hidden="true"></i>
                  </span>               
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon success">
              <img src="../dist/img/ingred.png" alt="User name">
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num">Ingredents</p>
                <p class="stat-cards-info__title">Total Ingredents</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success" id="ingredent">
                    <i data-feather="trending-up" aria-hidden="true"></i>
                  </span>               
                </p>
              </div>
            </article>
          </div>
        </div>  
      </div>
    </main>
      <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>

  <!-- TODO: Add SDKs for Firebase products that you want to use
      https://firebase.google.com/docs/web/setup#available-libraries -->
      <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>
      <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-database.js"></script>
    <script>
        
        var config = {
            apiKey: "AIzaSyD77ljr0UY9jcv9RH8o0RZKRZYMQgGHn_Q",
            authDomain: "foodchoice-b79b6.firebaseapp.com",
            databaseURL: "https://foodchoice-b79b6-default-rtdb.firebaseio.com",
            projectId: "foodchoice-b79b6",
            storageBucket: "foodchoice-b79b6.appspot.com",
            messagingSenderId: "697086354851",
            appId: "1:697086354851:web:ba61788096927d0b8d2616",
            measurementId: "G-H8KBM46JRJ"
        };
        
        firebase.initializeApp(config);
        firebase.analytics();

        var database = firebase.database();

          // USERS 
    firebase.database().ref('Users/').on('value', function(snapshot) {
        var value = snapshot.val();
        var i=0;
        $.each(value, function(index, value) {
            i++;
        });
        $("#totalUsers").text(i);
    });
            // category
            firebase.database().ref('Categories/').on('value', function(snapshot) {
        var value = snapshot.val();
        var i=0;
        $.each(value, function(index, value) {
            i++;
        });
        $("#category").text(i);
    });
            // receipe
            firebase.database().ref('Recipe/').on('value', function(snapshot) {
        var value = snapshot.val();
        var i=0;
        $.each(value, function(index, value) {
            i++;
        });
        $("#receipe").text(i);
    });
            // grocery 
            firebase.database().ref('grocery/').on('value', function(snapshot) {
        var value = snapshot.val();
        var i=0;
        $.each(value, function(index, value) {
            i++;
        });
        $("#ingredent").text(i);
    });
         </script>
<?php  include '../components/footer.php';  ?>
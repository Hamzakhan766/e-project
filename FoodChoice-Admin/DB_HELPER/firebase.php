<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-database.js"></script>

<script type="module">
    // Import the functions you need from the SDKs you need
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.12.1/firebase-app.js";
    import {
        getAnalytics
    } from "https://www.gstatic.com/firebasejs/9.12.1/firebase-analytics.js";
    import {
        getAuth,
        signInWithEmailAndPassword
    } from "firebase/auth";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyD58POI8Z12AgWY6t95sK43R7MeOVTvvWA",
        authDomain: "foodchoice-47490.firebaseapp.com",
        databaseURL: "https://foodchoice-47490-default-rtdb.firebaseio.com",
        projectId: "foodchoice-47490",
        storageBucket: "foodchoice-47490.appspot.com",
        messagingSenderId: "1022022576124",
        appId: "1:1022022576124:web:e2519e83599ffbd06f3479",
        measurementId: "G-18GHR79F7S"
    };


    const app = firebase.initializeApp(firebaseConfig);
    var databse = firebase.databse();
    const auth = getAuth();

    $('#submit').on('click', function() {
        var values = $('#adminLogin').serializeArray();
        var email = values[0].value;
        var password = values[1].value;

        signInWithEmailAndPassword(auth, email, password)
       .then((userCredential) => {
         // Signed in 
       const user = userCredential.user;
  })
  .catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;
  });



    });
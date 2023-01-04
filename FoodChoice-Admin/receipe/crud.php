    <div class="container" style="margin-top: 20px;">
        <h4 class="text-center">Receipe</h4><br>
        <br>
        <h5>View</h5>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Ingredients</th>
                <th>Direction</th>
                <th>serving</th>
                <th>Cateogry Id</th>
                <th>User Id</th>
            </tr>
            <tbody id="tbody">
            </tbody>
        </table>
    </div>

   

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-database.js"></script>
    

    <script>

       
            
        // Initialize Firebase
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

        var lastIndex = 0;

        // Get Data
        firebase.database().ref('Recipe/').on('value', function (snapshot) {
            var value = snapshot.val();
            var htmls = [];
            $.each(value, function (index, value) {
                if (value) {
                    htmls.push('<tr>\
                    <td>' + value.recipeName + '</td>\
                    <td>' + value.recipeDescription + '</td>\
                    <td>' + value.Ingredients+ '</td>\
                    <td>' + value.recipeDirection  + '</td>\
                    <td>' + value.recipeServing + '</td>\
                    <td>' + value.recipeCategoryId + '</td>\
                    <td>' + value.userID + '</td>\
                     </tr>');
                }
                lastIndex = index;
            });
            $('#tbody').html(htmls);
            $("#submitUser").removeClass('desabled');
        });

      
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

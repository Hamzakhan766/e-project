    <div class="container" style="margin-top: 20px;">
        <h4 class="text-center">Category</h4><br>
        <h5>Insert</h5>
        <div class="card card-default">
            <div class="card-body">
                <form id="addUser" class="form-inline" method="POST" action="">
                    <div class="form-group mb-2">
                        <label for="name" class="sr-only">Name</label>
                        <input id="categoryName" type="text" class="form-control" name="name" placeholder="Name"
                               required autofocus>
                    </div>
                    <div class="form-group mb-2">
                        <label for="text" class="sr-only">Description</label>
                        <input id="categoryDescription" type="text" class="form-control" name="description" placeholder="Description"
                               required autofocus>
                       
                    </div>
                    <div class="form-group mb-2">
                        <label for="text" class="sr-only">Image</label>       
                                        
                        <input type="file" class="form-control"  id="categoryImageUri" name="img"  required autofocus>
                    </div>
                    <button id="submitUser" type="button" class="btn btn-primary mb-2">Insert</button>
                </form>
            </div>
        </div>
        <br>
        <h5>View</h5>
        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th width="180" class="text-center">Action</th>
            </tr>
            <tbody id="tbody">
            </tbody>
        </table>
    </div>

    <!-- Update Model -->
    <form action="" method="POST" class="users-update-record-model form-horizontal">
        <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content" style="overflow: hidden;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body" id="updateBody">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-success updateUser">Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Delete Model -->
    <form action="" method="POST" class="users-remove-record-model">
        <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                        <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to delete this record?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light deleteRecord">Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
        firebase.database().ref('Categories/').on('value', function (snapshot) {
            var value = snapshot.val();
            var htmls = [];
            $.each(value, function (index, value) {
                if (value) {
                    htmls.push('<tr>\
                    <td>' + value.categoryId + '</td>\
                    <td>' + value.categoryName + '</td>\
                    <td>' + value.categoryDescription + '</td>\
                    <td><img src='+ value.categoryImageUri +' width="100px" height="70px" style="border-radius:20%;"> </td>\
                    <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="' + index + '">Update</button>\
                    <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" data-id="' + index + '">Delete</button></td>\
                </tr>');
                }
                lastIndex = index;
            });
            $('#tbody').html(htmls);
            $("#submitUser").removeClass('desabled');
        });

        // Add Data
        $('#submitUser').on('click', function () {
        

            var values = $("#addUser").serializeArray();
            var categoryName = values[0].value;
            var categoryDescription = values[1].value;
            
            var categoryId = lastIndex + 1;

            console.log(values);

            firebase.database().ref('Categories/' + categoryId).set({
                categoryId: categoryId,
                categoryName: categoryName,
                categoryDescription: categoryDescription,
               
            });

            // Reassign lastID value
            lastIndex = CategoryID;
            $("#addUser input").val("");
        });

        // Update Data
        var updateID = 0;
        $('body').on('click', '.updateData', function () {
            updateID = $(this).attr('data-id');
            firebase.database().ref('Categories/' + updateID).on('value', function (snapshot) {
                var values = snapshot.val();
                var updateData = '<div class="form-group">\
                    <label for="first_name" class="col-md-12 col-form-label">Name</label>\
                    <div class="col-md-12">\
                        <input id="first_name" type="text" class="form-control" name="name" value="' + values.categoryName + '" required autofocus>\
                    </div>\
                </div>\
                <div class="form-group">\
                    <label for="last_name" class="col-md-12 col-form-label">Description</label>\
                    <div class="col-md-12">\
                        <input id="last_name" type="text" class="form-control" name="description" value="' + values.categoryDescription + '" required autofocus>\
                    </div>\
                </div>';

                $('#updateBody').html(updateData);
            });
        });

        $('.updateUser').on('click', function () {
            var values = $(".users-update-record-model").serializeArray();
            var postData = {
                categoryName: values[0].value,
                categoryDescription: values[1].value,
                categoryId: updateID,
              
            };

            var updates = {};
            updates['/Categories/' + updateID] = postData;

            firebase.database().ref().update(updates);

            $("#update-modal").modal('hide');
        });

        // Remove Data
        $("body").on('click', '.removeData', function () {
            var id = $(this).attr('data-id');
            $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
        });

        $('.deleteRecord').on('click', function () {
            var values = $(".users-remove-record-model").serializeArray();
            var id = values[0].value;
            firebase.database().ref('Categories/' + id).remove();
            $('body').find('.users-remove-record-model').find("input").remove();
            $("#remove-modal").modal('hide');
        });
        $('.remove-data-from-delete-form').click(function () {
            $('body').find('.users-remove-record-model').find("input").remove();
        });
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

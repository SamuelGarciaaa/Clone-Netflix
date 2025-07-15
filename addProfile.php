<?php $title = 'Add user page'; ?>

<?php require_once('./shared/header.php'); ?>

    <link rel="stylesheet" href="/src/css/addUser.css">
</head>

<!-- Code beggins here. -->

<body>
    <div class="custom-container position-relative">
        <div class="close-button">
            <a href="/src/controller/addProfileControll.php"><i class="fa-solid fa-xmark"></i></a>
        </div>

        <div class="text text-center mb-5">
            <p class="h2 text-white fw-bold">Add a profile</p>
            <p class="text-white p-profile">Add a Netflix profile for someone.</p>
        </div>

        <form action="/src/controller/addProfileControll.php" method="POST" enctype="multipart/form-data" class="m-5">
            <div class="first-layer row d-flex flex-wrap align-items-center mb-5">
                <div class="col-12 col-md-3 img-container mb-3 mb-md-0 text-center text-md-start">
                    <input type="file" name="imgProfile" id="imgProfile" class="customImgProfile">
                    <label for="imgProfile"><i class="fa-solid fa-image me-1"></i></label>
                </div>

                <div class="col-12 col-md-9 name-container">
                    <input type="text" name="name" id="name" class="form-name" placeholder="Name">
                </div>
            </div>

            <hr class="form-hr">

            <div class="row mt-5">
                <div class="text-child col">
                    <p class="h5 text-white fw-bold">Profile for children</p>
                    <p class="p-child">Watch only series and films suitable for children</p>
                </div>

                <div class="col switch mb-5">
                    <div class="form-check form-switch">
                        <input class="form-check-input customSwitch" type="checkbox" id="mySwitch" name="children" value="children" checked>
                    </div>
                </div>

                <div class="buttons mt-5 text-center">
                    <input type="submit" name="save" id="save" value="Save" class="custom-save mb-2">
                    <a href="/src/controller/addProfileControll.php" class="cancelbuttton d-block w-100 fw-bold">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

<!-- Code ends here. -->

<?php require_once('./shared/footer.php'); ?>
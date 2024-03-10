<?php
if (isset($_POST["submit"])) {
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $region = $_POST["region"];
    $province = $_POST["province"];
    $city = $_POST["city"];
    $barangay = $_POST["barangay"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $errors = array();
    if (empty($firstName) || empty($lastName) || empty($email) || empty($country) || empty($region) || empty($province) || empty($city) || empty($barangay) || empty($password) || empty($confirmPassword)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }
    if ($password !== $confirmPassword) {
        array_push($errors, "Password does not match");
    }

    require_once "database.php";

    $sql = "SELECT * FROM `user` WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        array_push($errors, "Email already exists!");
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $sql = "INSERT INTO `user` (firstname, lastname, email, country, region, province, city, barangay, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssss", $firstName, $lastName, $email, $country, $region, $province, $city, $barangay, $passwordHash);
        if (mysqli_stmt_execute($stmt)) {
            echo "<div class='alert alert-success'>You are registered successfully</div>";
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <title>Registration</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #FBFACD;
        }
        .form-container {
            max-width: 1200px; /* Adjust the maximum width as needed */
            margin: 0 auto;
        }
        .form-outline {
            margin-bottom: 10px; /* Increase the margin between form elements */
        }
    </style>
</head>
<body>

<form action="register.php" method="post" enctype="multipart/form-data">
    <div class="container form-container">
        <section>
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-light text-dark" style="border-radius: 2rem;">
                            <div class="card-body text-start">
                                <div class="mb-md-5 mt-md-4 text-center">
                                    <h2 class="fw-bold mb-5 text-uppercase">Create an Account</h2>

                                    <!-- First Name and Last Name in one row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-start form-outline mb-2">
                                                <label class="form-label" for="fname">First Name</label>
                                                <input type="text" id="fname" name="firstname" class="form-control form-control" /> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-start form-outline mb-2">
                                                <label class="form-label" for="lname">Last Name</label>
                                                <input type="text" id="lname" name="lastname" class="form-control form-control" /> 
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Address Fields in the same row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-start form-outline mb-2">
                                                <label class="form-label" for="lotBlk">Lot/Blk</label>
                                                <input type="text" id="lotBlk" name="lot_blk" class="form-control form-control" /> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-start form-outline mb-2">
                                                <label class="form-label" for="street">Street</label>
                                                <input type="text" id="street" name="street" class="form-control form-control" /> 
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Phase/Subdivision Field -->
                                    <div class="text-start form-outline mb-2">
                                        <label class="form-label" for="phase">Phase/Subdivision</label>
                                        <input type="text" id="phase" name="phase_subdivision" class="form-control form-control" /> 
                                    </div>

                                    <!-- Country -->
                                    <div class="text-start form-outline mb-2">
                                        <label class="form-label select-label">Country</label>
                                        <select class="form-select" id="country" name="country">
                                            <option selected disabled>Select Country</option>
                                            <option value="1">Philippines</option>
                                        </select>
                                    </div>

                                    <!-- Region -->
                                    <div class="text-start form-outline mb-2">
                                        <label class="form-label select-label">Region</label>
                                        <select class="form-select" id="region" name="region">
                                            <option selected disabled>Select Region</option>
                                        </select>
                                    </div>

                                    <div class="text-start form-outline mb-2">
                                        <label class="form-label select-label">Province</label>
                                        <select class="form-select" id="province" name="province">
                                            <option selected disabled>Select Province</option>
                                        </select>
                                    </div>


                                    <!-- City -->
                                    <div class="text-start form-outline mb-2">
                                        <label class="form-label select-label">City</label>
                                        <select class="form-select" id="city" name="city">
                                            <option selected disabled>Select City</option>
                                        </select>
                                    </div>

                                    <!-- Barangay -->
                                    <div class="text-start form-outline mb-2">
                                        <label class="form-label select-label">Barangay</label>
                                        <select class="form-select" id="barangay" name="barangay">
                                            <option selected disabled>Select Barangay</option>
                                        </select>
                                    </div>

                                    <!-- Input for Email -->
                                    <div class="text-start form-outline form-white mb-2">
                                        <label class="form-label" for="typeEmailX">Email</label>
                                        <input type="email" id="typeEmailX" name="email" class="form-control form-control" />
                                    </div>
                                    <div class="text-start form-outline form-white mb-2">
                                          <label class="form-label" for="typePhoneNumber">Phone Number</label>
                                     <input type="tel" id="typePhoneNumber" name="phoneNumber" class="form-control form-control" />
                                      </div>        

                                    <!-- Input for Password -->
                                    <div class="text-start form-outline mb-2">
                                        <label class="form-label">Password</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control password" id="password" type="password" name="password" required />
                                            <span class="input-group-text togglePassword" id="">
                                                <i data-feather="eye-off" style="cursor: pointer"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="text-start form-outline mb-4">
                                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control password" id="confirmPassword" type="password" name="confirmPassword" required />
                                            <span class="input-group-text togglePassword" id="">
                                                <i data-feather="eye-off" style="cursor: pointer"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button type="submit" name="submit" class="btn btn-primary" data-mdb-ripple-init>Register</button>
                                    </div>

                                    <div>
                                        <p class="text-center text-muted mb-0 p-3">Already have an account? <a href="login.php" class="text-dark-50 fw-bold">Login</a></p>
                                    </div> 

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // Make sure DOM is ready before executing jQuery code
    $(document).ready(function() {
        feather.replace({ 'aria-hidden': 'true' });

        $(".togglePassword").click(function (e) {
            e.preventDefault();
            var type = $(this).parent().parent().find(".password").attr("type");
            console.log(type);
            if(type == "password"){
                $("svg.feather.feather-eye-off").replaceWith(feather.icons["eye"].toSvg());
                $(this).parent().parent().find(".password").attr("type","text");
            }else if(type == "text"){
                $("svg.feather.feather-eye").replaceWith(feather.icons["eye-off"].toSvg());
                $(this).parent().parent().find(".password").attr("type","password");
            }
        });

        var my_handlers = {
            fill_provinces: function() {
                var region_code = $(this).val();
                var region_text = $(this).find("option:selected").text();
                $('#region-text').val(region_text);

                $('#province-text').val('');
                $('#city-text').val('');
                $('#barangay-text').val('');

                var dropdown = $('#province');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
                dropdown.prop('selectedIndex', 0);

                var url = 'province.json';
                $.getJSON(url, function(data) {
                    var result = data.filter(function(value) {
                        return value.region_code == region_code;
                    });

                    result.sort(function(a, b) {
                        return a.province_name.localeCompare(b.province_name);
                    });

                    $.each(result, function(key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
                    })
                });
            },

            fill_cities: function() {
                var province_code = $(this).val();
                var province_text = $(this).find("option:selected").text();
                $('#province-text').val(province_text);

                $('#city-text').val('');
                $('#barangay-text').val('');

                var dropdown = $('#city');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose city/municipality</option>');
                dropdown.prop('selectedIndex', 0);

                var url = 'city.json';
                $.getJSON(url, function(data) {
                    var result = data.filter(function(value) {
                        return value.province_code == province_code;
                    });

                    result.sort(function(a, b) {
                        return a.city_name.localeCompare(b.city_name);
                    });

                    $.each(result, function(key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
                    })
                });
            },

            fill_barangays: function() {
                var city_code = $(this).val();
                var city_text = $(this).find("option:selected").text();
                $('#city-text').val(city_text);

                $('#barangay-text').val('');

                var dropdown = $('#barangay');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose barangay</option>');
                dropdown.prop('selectedIndex', 0);

                var url = 'barangay.json';
                $.getJSON(url, function(data) {
                    var result = data.filter(function(value) {
                        return value.city_code == city_code;
                    });

                    result.sort(function(a, b) {
                        return a.brgy_name.localeCompare(b.brgy_name);
                    });

                    $.each(result, function(key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
                    })
                });
            },

            onchange_barangay: function() {
                var barangay_text = $(this).find("option:selected").text();
                $('#barangay-text').val(barangay_text);
            },
        };

        $('#region').on('change', my_handlers.fill_provinces);
        $('#province').on('change', my_handlers.fill_cities);
        $('#city').on('change', my_handlers.fill_barangays);
        $('#barangay').on('change', my_handlers.onchange_barangay);

        let dropdown = $('#region');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose Region</option>');
        dropdown.prop('selectedIndex', 0);
        const url = 'region.json';
        $.getJSON(url, function(data) {
            $.each(data, function(key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
            })
        });
    });
</script>

</html>

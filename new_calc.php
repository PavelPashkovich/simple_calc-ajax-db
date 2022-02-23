<?php

$firstDigit = $_POST['first_digit'] ?? '';
$secondDigit = $_POST['second_digit'] ?? '';
$sign = $_POST['sign'] ?? '';

$firstDate = $_POST['first_date'] ?? '';
$secondDate = $_POST['second_date'] ?? '';

?>

<title>TeachMeSkills</title>
<link rel="stylesheet" href="style-ajax.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<body>

<div class="container">
    <h1>Simple calculator</h1>
    <form class="form" method="post">
        <table class="table">
            <tr>
                <td class="td-title">First digit:</td>
                <td><input class="input" type="text" id="first_digit" name="first_digit" ></td>
            </tr>
            <tr>
                <td class="td-title">Sign:</td>
                <td><input class="input" type="text" id="sign" name="sign"></td>
            </tr>
            <tr>
                <td class="td-title">Second digit:</td>
                <td><input class="input" type="text" id="second_digit" name="second_digit" ></td>
            </tr>
        </table>
        <input class="calculate-btn" type="button" onclick="onclick_fn()" value="Calculate">
        <input class="input" type="text" id="first_date" name="first_date" value="">
        <input class="input" type="text" id="second_date" name="second_date" value="">
        <input class="calculate-btn" type="button" onclick="onclick_f()" value="Filter">



    </form>

    <script>

        function onclick_fn() {
            let first_digit = document.getElementById('first_digit').value;
            let second_digit = document.getElementById('second_digit').value;
            let sign = document.getElementById('sign').value;
            let data_result = {first_digit: first_digit, second_digit: second_digit, sign: sign};

            jQuery.ajax({
                type: "GET",
                url: 'calculate_post.php',
                data: data_result,
                success: function (array) {
                    let array_parsed = JSON.parse(array);
                    let result_data = document.getElementById('result'); // передать html в div result
                    result_data.innerHTML = array_parsed.result;
                    // date_time_data.innerHTML = array_parsed.date;
                }
            });
        }
    </script>

    <script>

        function onclick_f() {
            let first_date = document.getElementById('first_date').value;
            let second_date = document.getElementById('second_date').value;
            let date_time = {first_date: first_date, second_date: second_date};

            jQuery.ajax({
                type: "GET",
                url: 'date_filter.php',
                data: date_time,
                success: function (response) {
                    let date_returned = document.getElementById('old_result');
                    date_returned.innerHTML = response;
                }
            });
        }
    </script>

    <div class="result" id="result"></div>
    <div class="result" id="date_time"></div>
    <div id="old_result"></div>
</div>

</body>




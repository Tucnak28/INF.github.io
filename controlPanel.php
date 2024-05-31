<?php
$connection = null;
require_once "pripojit.php";

if (isset($_POST["smazat"])) {
    $delete_id = $_POST["delete"];
    $delete_query = "DELETE FROM accounts WHERE id = " . intval($delete_id);
    if (mysqli_query($connection, $delete_query)) {
        //echo "pryč";
    } else {
        //echo "meh";
    }
}

$display_record = null;
if (isset($_POST["zobrazit"])) {
    $show_id = $_POST["show"];
    $show_query = "SELECT * FROM accounts WHERE id = " . intval($show_id);
    $result_show = mysqli_query($connection, $show_query);
    $display_record = mysqli_fetch_assoc($result_show);
}

if (isset($_POST["ulozit"])) {
    $edit_id = $_POST["edit_id"];
    $new_username = $_POST["edit_username"];
    $new_password = $_POST["edit_password"];
    $new_gender = $_POST["edit_gender"];
    $new_plan = $_POST["edit_plan"];
    $new_dob = $_POST["edit_dob"];

    $edit_query = "UPDATE accounts SET 
        username = '" . mysqli_real_escape_string($connection, $new_username) . "', 
        password = '" . mysqli_real_escape_string($connection, $new_password) . "', 
        gender = '" . mysqli_real_escape_string($connection, $new_gender) . "', 
        dob = '" . mysqli_real_escape_string($connection, $new_dob) . "',
        plan = '" . mysqli_real_escape_string($connection, $new_plan) . "' 
        WHERE id = " . intval($edit_id);

    if (mysqli_query($connection, $edit_query)) {
        //echo "echo";
    } else {
        //echo "aaaaaaaaaa";
    }
}


$query = "SELECT * FROM accounts";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="style.css" rel="stylesheet">
    <title>Control Panel</title>

    <script>
        function showEditForm() {
            document.getElementById('editForm').style.display = 'block';
        }

        function hideEditForm() {
            document.getElementById('editForm').style.display = 'none';
        }

        function showDetailsForm() {
            document.getElementById('detailsForm').style.display = 'block';
        }

        function hideDetailsForm() {
            document.getElementById('detailsForm').style.display = 'none';
        }

        function handleEditSelect() {
            var editSelect = document.getElementById('editSelect');
            if (editSelect.value !== "") {
                showEditForm();
            } else {
                hideEditForm();
            }
        }

        function handleDetailsSelect() {
            var detailsSelect = document.getElementById('detailsSelect');
            if (detailsSelect.value !== "") {
                showDetailsForm();
            } else {
                hideDetailsForm();
            }
        }

        window.onload = function() {
            hideEditForm();
            hideDetailsForm();
        }
    </script>
</head>
<body>

<a href="index.php" class="back-button">Zpět</a>
<div class="container">
    <h2>List of Accounts</h2>
    <table class="custom-table">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Pohlaví</th>
            <th>Plán</th>
            <th>Datum narození</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['plan']; ?></td>
                <td><?php echo $row['dob']; ?></td>
                <td>
                    <form action="" method="post" style="display:inline;">
                        <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="smazat" class="action-button remove-button">Remove</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</div>


<div class="container">
    <h2>Actions</h2>
    <h2 class="reservTableHeader">Odstranit rezervaci</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <select class="idSelect" name="delete" required>
            <option value="">Select ID</option>
            <?php
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)): ?>
                <option value="<?php echo htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="submit" name="smazat" value="Vymazat" class="remove-button">
    </form>

    <h2 class="reservTableHeader">Zobrazit detaily</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <select class="idSelect" id="detailsSelect" name="show" required onchange="handleDetailsSelect()">
            <option value="">Select ID</option>
            <?php
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)): ?>
                <option value="<?php echo htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endwhile; ?>
        </select>
        <div id="detailsForm">
            <input type="submit" name="zobrazit" value="Zobrazit" class="edit-button">
        </div>
    </form>
    <?php if ($display_record): ?>
        <div class="container">
            <h2>Detaily ID <?php echo $display_record['id']; ?></h2>
            <div style="color: black">Username: <?php echo htmlspecialchars($display_record['username'], ENT_QUOTES, 'UTF-8'); ?></div>
            <div style="color: black">Password: <?php echo htmlspecialchars($display_record['password'], ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
    <?php endif; ?>

    <h2 class="reservTableHeader">Editovat záznam</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <select class="idSelect" id="editSelect" name="edit_id" required onchange="handleEditSelect()">
            <option value="">Select ID</option>
            <?php
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)): ?>
                <option value="<?php echo htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($row["id"], ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endwhile; ?>
        </select>
        <div id="editForm">
            <label for="edit_username" class="labelEntry">New Username:</label>
            <input type="text" name="edit_username" required>
            <br><br>
            <label for="edit_password" class="labelEntry">New Password:</label>
            <input type="text" name="edit_password" required>
            <br><br>
            <label for="edit_gender" class="labelEntry">Gender:</label>
            <select name="edit_gender" class="genderSelect"required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="Apache helicopter 9000">Apache helicopter 9000</option>
                <option value="Walmart bag">Walmart bag</option>
                <option value="other">Other</option>
            </select>
            <br><br>
            <label for="edit_plan">Plán:
                <select name="edit_plan" id="plan" style="background: white; color: black">
                    <option value="Noob 1Gb/s optika">Noob 1Gb/s (optika, 1000 Mb/s Down, 1000 Mb/s Up)</option>
                    <option value="Pro 2.5Gb/s optika">Pro 2.5Gb/s (optika, 2500 Mb/s Down, 2500 Mb/s Up)</option>
                    <option value="Hacker 50Gb/s optika">Hacker 50Gb/s (optika, 50000 Mb/s Down, 50000 Mb/s Up)</option>
                    <option value="Noob 10Mb/s wireless">Noob 10Mb/s (wireless, 10 Mb/s Down, 10 Mb/s Up)</option>
                    <option value="Pro 100Mb/s wireless">Pro 100Mb/s (wireless, 100 Mb/s Down, 100 Mb/s Up)</option>
                    <option value="Hacker 1Gb/s wireless">Hacker 1Gb/s (wireless, 1000 Mb/s Down, 1000 Mb/s Up)</option>
                </select>
            </label>
            <label for="edit_dob" class="labelEntry">Date of Birth:</label>
            <input type="date" name="edit_dob" required>
            <br><br>
            <input type="submit" name="ulozit" value="Uložit" class="edit-button">
        </div>
    </form>

</div>

<?php mysqli_close($connection); ?>

</body>
</html>

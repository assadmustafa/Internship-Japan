<?php
require '../../../connection.php';

/** @var PDO $db */

$sql = 'SELECT * FROM intern';
$statement = $db->prepare($sql);
$statement->execute();
$interns = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>
    <h1 style="text-align: center">Intern</h1><br>
    <div class="container" style="margin-left: 0; font-size: small; width: 1340px">
        <div class="card mt-5">
            <div class="card-header">
            </div>
            <div class="card-body">
                <a href="create.php" class="btn btn-success"> Add Student</a><br><br>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Firstname</th>
                        <th>Surname</th>
                        <th>Street</th>
                        <th>Postal Code</th>
                        <th>City</th>
                        <th style="width: 8em">Date of Birth</th>
                        <th>Country ID</th>
                        <th>Profile Text</th>
                        <th>Study</th>
                        <th>Video</th>
                        <th>Profile Image</th>
                    </tr>
                    <?php foreach($interns as $intern): ?>
                        <tr>
                            <td><?= $intern->intern_id; ?></td>
                            <td><?= $intern->email; ?></td>
                            <td><?= $intern->firstname; ?></td>
                            <td><?= $intern->surname; ?></td>
                            <td><?= $intern->street_address; ?></td>
                            <td><?= $intern->postal_code; ?></td>
                            <td><?= $intern->city; ?></td>
                            <td><?= $intern->dateofbirth; ?></td>
                            <td><?= $intern->countryid; ?></td>
                            <td><?= $intern->profiletext; ?></td>
                            <td><?= $intern->study; ?></td>
                            <td><?= $intern->video; ?></td>
                            <td><?= $intern->profileimage; ?></td>
                            <td>
                                <a href="update.php?id=<?= $intern->user_id ?>" class="btn btn-info">Update</a>
                                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $intern->user_id ?>" class='btn btn-danger' style="margin-top: 2px; padding-right: 18px">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>
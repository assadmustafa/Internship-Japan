<?php

/** @var PDO $db */

require '../../../connection.php';

$sql = 'SELECT * FROM education';
$statement = $db->prepare($sql);
$statement->execute();
$educations = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>
    <h1 style="text-align: center">Education</h1><br>
    <div class="container" style="margin-left: 0; font-size: small">
        <div class="card mt-5">
            <div class="card-header">
            </div>
            <div class="card-body">
                <a href="create.php" class="btn btn-success"> Add Education</a><br><br>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>street</th>
                        <th>postal code</th>
                        <th>city</th>
                        <th>country ID</th>
                        <th>profile text</th>
                        <th>position</th>
                        <th>position text</th>
                        <th>video</th>
                        <th>logo</th>
                        <th>contact person</th>
                        <th>email contact person</th>
                        <th>website</th>
                    </tr>
                    <?php foreach($educations as $education): ?>
                        <tr>
                            <td><?= $education->education_id; ?></td>
                            <td><?= $education->name; ?></td>
                            <td><?= $education->street_address; ?></td>
                            <td><?= $education->postal_code; ?></td>
                            <td><?= $education->city; ?></td>
                            <td><?= $education->countryid; ?></td>
                            <td><?= $education->profiletext; ?></td>
                            <td><?= $education->position; ?></td>
                            <td><?= $education->positiontext; ?></td>
                            <td><?= $education->video; ?></td>
                            <td><?= $education->logo; ?></td>
                            <td><?= $education->contactpersoon; ?></td>
                            <td><?= $education->email_contactpersoon; ?></td>
                            <td><?= $education->website; ?></td>
                            <td>
                                <a href="update.php?id=<?= $education->education_id ?>" class="btn btn-info">Update</a>
                                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $education->education_id ?>" class='btn btn-danger' style="margin-top: 2px; padding-right: 18px">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
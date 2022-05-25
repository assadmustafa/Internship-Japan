<?php

/** @var PDO $db */

require '../../../connection.php';

$sql = 'SELECT * FROM entity';
$statement = $db->prepare($sql);
$statement->execute();
$entities = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>
    <h1 style="text-align: center">Entity</h1><br>
    <div class="container" style="margin-left: 0; font-size: small">
        <div class="card mt-5" >
            <div class="card-header">
            </div>
            <div class="card-body">
                <a href="create.php" class="btn btn-success"> Add Entity</a><br><br>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>company name</th>
                        <th>street address</th>
                        <th>postal code</th>
                        <th>city</th>
                        <th>country id</th>
                        <th>profile text</th>
                        <th>position</th>
                        <th>position text</th>
                        <th>video</th>
                        <th>logo</th>
                        <th>contact person</th>
                        <th>email contact persoon</th>
                        <th>website</th>
                    </tr>
                    <?php foreach($entities as $entity): ?>
                        <tr>
                            <td><?= $entity->company_id; ?></td>
                            <td><?= $entity->companyname; ?></td>
                            <td><?= $entity->street_address; ?></td>
                            <td><?= $entity->postal_code; ?></td>
                            <td><?= $entity->city; ?></td>
                            <td><?= $entity->countryid; ?></td>
                            <td><?= $entity->profiletext; ?></td>
                            <td><?= $entity->position; ?></td>
                            <td><?= $entity->positiontext; ?></td>
                            <td><?= $entity->video; ?></td>
                            <td><?= $entity->logo; ?></td>
                            <td><?= $entity->contactpersoon; ?></td>
                            <td><?= $entity->email_contactpersoon; ?></td>
                            <td><?= $entity->website; ?></td>
                            <td>
                                <a href="update.php?id=<?= $entity->user_id ?>" class="btn btn-info">Update</a>
                                <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $entity->user_id ?>" class='btn btn-danger' style="margin-top: 2px; padding-right: 18px">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>
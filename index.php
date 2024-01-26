<?php
include 'header.php';
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    ob_end_flush();
}
?>

<div class="container-fluid d-flex justify-content-center">
    <div class="tab-content d-flex my-5 justify-content-center align-items-center" id="v-pills-tabContent" style="height: 300px;">

        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
            <div class="px-2 position-relative" style="font-size: .8rem;">

                <table class="table">
                    <thead align="center">
                        <tr>
                            <th scope="col" class="text-start px-md-4">First</th>
                            <th scope="col" class="px-md-4">Last</th>
                            <th scope="col" class="px-md-4">Course</th>
                            <th scope="col" class="px-md-4">Section</th>
                            <th scope="col" class="px-md-4">Action</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                            <?php
                            $userID = $_SESSION['u_id'];
                            $select = $conn->prepare("SELECT * FROM students_record WHERE user_id = ?");
                            $select->execute([$userID]);
                            foreach ($select as $selects) { ?>
                            <tr>
                                <td class="px-md-4"><?= $selects['firstName'] ?></td>
                                <td class="px-md-4"><?= $selects['lastName'] ?></td>
                                <td class="px-md-4"><?= $selects['course'] ?></td>
                                <td class="px-md-4"><?= $selects['section'] ?></td>
                                <td class="px-md-1">
                                    <a class="text-decoration-none " href="add.php?update&id=<?= $selects['s_id'] ?>" class="text-decoration-none">✏</a>
                                    |
                                    <a class="text-decoration-none" href="process.php?delete&id=<?= $selects['s_id'] ?>" class="text-decoration-none">❌</a>
                                </td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
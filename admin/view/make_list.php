<?php require('header.php'); ?> 

<main class="container">
    <section class="mt-2 mb-2">
        <h2>Vehicle Make List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($makes as $make) { ?>
                    <tr>
                        <td><?php echo $make['make']; ?></td>
                        <td>
                            <form action="index.php" method="POST">
                                <input type="hidden" name="make_id" value="<?php echo $make['id']; ?>">
                                <input type="hidden" name="action" value="delete_make">
                                <button class="btn-close" aria-label="Delete"></button>
                            </form>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </section>
    <section>
        <h2>Add Make</h2>
        <form action="../admin/index.php" method="POST">
            <label for="new_make">
                Make:
            </label>
            <input class="form-control m-1" type="text" name="new_make">
            <input type="hidden" name="action" value="add_make">
            <button class="btn btn-primary m-1">Add Make</button>
        </form>
    </section>

</main>

<?php require('footer.php'); ?>
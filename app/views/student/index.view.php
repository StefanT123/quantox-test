<?php require 'app/views/partials/header.php' ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="title h-100 d-flex justify-content-center align-items-center">Students</h3>

            <a href="/student/create" class="btn btn-info mb-3">Create new student</a>

            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">School Board</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($students as $student) : ?>
                <tr>
                  <th scope="row"><?= $student->id ?></th>
                  <td><?= $student->name ?></td>
                  <td><?= $student->school_name ?></td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
        </div>
    </div>
</div>

<?php require 'app/views/partials/footer.php' ?>

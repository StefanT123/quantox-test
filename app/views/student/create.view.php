<?php require 'app/views/partials/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title h-100 d-flex justify-content-center align-items-center">Create new student</h3>

            <form action="/student/create" method="POST">
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" required>
              </div>
              <div class="form-group">
                <label for="school_board">Select school board</label>
                <select class="form-control" name="school_board_id" id="school_board">
                <?php foreach ($schoolBoards as $school) : ?>
                  <option value="<?= $school->id ?>"><?= $school->name ?></option>
                <?php endforeach; ?>
                </select>
              </div>

              <button type="submit">Create new student</button>
            </form>
        </div>
    </div>
</div>


<?php require 'app/views/partials/footer.php' ?>

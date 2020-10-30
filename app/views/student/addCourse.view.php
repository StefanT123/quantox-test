<?php require 'app/views/partials/header.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Add Course to student</h3>

            <form action="/student/courses/add" method="POST">
                <input type="hidden" name="studentId" value="<?= $_GET['studentId'] ?>">

                <div class="form-group">
                    <label for="course_id">Example multiple select</label>
                    <select multiple class="form-control" name="coursesIds[]" id="course_id">
                    <?php foreach ($courses as $course) : ?>
                      <option value="<?= $course->id ?>"><?= $course->name; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit">Add</button>
            </form>
        </div>
    </div>
</div>


<?php require 'app/views/partials/footer.php' ?>

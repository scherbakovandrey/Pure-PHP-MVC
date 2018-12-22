<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task</div>
                <form name="TaskEdit" action="<?= TaskBook\App::siteUrl() ?>edit" class="needs-validation" novalidate
                      method="POST">
                    <div class="card-body">

                        <?php require('form.php') ?>

                        <div class="col-md-6 offset-md-4 text-md-left">
                            <button class="btn btn-primary">
                                Edit Task
                            </button>
                        </div>
                    </div>
		<input type="hidden" name="id" value="<?= $this->model->getAttribute('id') ?>">
                </form>
            </div>
        </div>
    </div>
</div>
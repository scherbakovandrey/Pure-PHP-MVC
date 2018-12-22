<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Task</div>
                <form name="TaskAdd" action="<?= TaskBook\App::siteUrl() ?>add" method="POST" class="needs-validation"
                      novalidate>
                    <div class="card-body">

                    <?php require('form.php') ?>

                        <div class="col-md-6 offset-md-4 text-md-left">
                            <button class="btn btn-primary">
                                Submit Task
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
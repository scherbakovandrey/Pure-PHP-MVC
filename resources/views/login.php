<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login Form</div>
                <div class="card-body">
                    <form name="Login" action="<?= TaskBook\App::siteUrl() ?>admin/login" method="POST"
                          class="needs-validation" novalidate>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input id="username" class="form-control"
                                       name="username" <?= !empty($this->model->getAttribute('username')) ? ' value="' . $this->model->getAttribute('username') . '"' : '' ?>
                                       required>
                                <div class="invalid-feedback text-md-left">
                                    Please provide a username.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password" required>
                                <div class="invalid-feedback text-md-left">
                                    Please provide a password.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-4 text-md-left">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
    <div class="col-md-6">
        <input id="username" class="form-control" name="username" required
               placeholder="John Smith"<?= !empty($this->model->getAttribute('username')) ? ' value="' . $this->model->getAttribute('username') . '"' : '' ?>>
        <div class="invalid-feedback text-md-left">
            Please provide a username.
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail
        Address</label>
    <div class="col-md-6">
        <input type="email" id="email" class="form-control" name="email" required
               placeholder="johnsmith@email.com"<?= !empty($this->model->getAttribute('email')) ? ' value="' . $this->model->getAttribute('email') . '"' : '' ?>>
        <div class="invalid-feedback text-md-left">
            Please provide a email.
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Task Body</label>
    <div class="col-md-6">
        <textarea class="form-control" id="text" name="text" required
                  rows="6"><?= !empty($this->model->getAttribute('text')) ? $this->model->getAttribute('text') : '' ?></textarea>
        <div class="invalid-feedback text-md-left">
            Please enter a task body.
        </div>
    </div>
</div>

<?php if (TaskBook\App::isLogged()) { ?>
    <div class="form-group row">
        <div class="col-sm-4 text-md-right">Status</div>
        <div class="col-sm-6">
            <div class="form-check text-md-left">
                <input class="form-check-input" type="checkbox" id="status"
                       name="status"<?= $this->model->getAttribute('status') ? ' checked="checked"' : '' ?>>
                <label class="form-check-label" for="status">Implemented</label>
            </div>
        </div>
    </div>
<?php } ?>
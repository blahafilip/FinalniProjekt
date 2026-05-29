<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?php
    /**
     * @var array $rocniky2
     * @var array $kategorie
     */
?>
<div class="container mt-4">
<h1>Přidat závod</h1>
<a href="<?= site_url('/') ?>" class="btn btn-dark mb-3">Zpět</a>

<div class="row">
    <form action="<?= base_url('form-helper/races/create') ?>" method="post">
        <div class="col-md-10">
            <?php
            $atributyRaceName = [
                'class' => 'form-control',
                'id'    => 'race_name',
                'placeholder' => 'Enter name of race'
            ];

            $atributyZacatek = [
                'class' => 'date',
                'id'    => 'start_date',
                'placeholder' => 'Zadejte začátek závodu'
            ];

            $atributyKonec = [
                'class' => 'date',
                'id'    => 'start_date',
                'placeholder' => 'Zadejte začátek závodu'
            ];

            ?>
<?php  /** 
        <?= form_dropdown_bs("year", $rocniky2, [], 'mb-3', "Ročník závodu") ?>
        */
?>

<div class="mb-3">
    <label for="year" class="form-label">Ročník závodu</label>

    <select class="form-select js-example-basic-single" id="year" name="year">

        <?php foreach($rocniky2 as $key => $value): ?>

            <option value="<?= $key ?>">
                <?= esc($value) ?>
            </option>

        <?php endforeach; ?>

    </select>
</div>


            <div class="mb-3">
    <label for="race_id" class="form-label">Závod</label>

    <select class="form-select js-example-basic-single" id="race_id" name="race_id">

        <?php foreach($zavody as $type => $races): ?>

        
                <?php foreach($races as $race): ?>

                    <option value="<?= $race['id'] ?>">
                        <?= esc($race['default_name']) ?>
                    </option>

                <?php endforeach; ?>

        <?php endforeach; ?>

    </select>
</div>

            <?=  form_input_bs("real_name", $atributyRaceName, "Název závodu") ?>

            <?= form_input_bs("start_date", $atributyZacatek, "Datum startu závodu", "date") ?>

            <?= form_input_bs("end_date", $atributyKonec, "Datum konce závodu", "date") ?>

            <?= form_dropdown_bs("categories", $kategorie, [], 'mb-3', "Kategorie Závodů") ?>

            <input type="file" name="logo" class="form-control" id="logo" accept=".jpg, .png"> 

            <button type="submit" class="btn btn-dark">Send</button>
            
        </div>
        
    </form>
</div>

</div>

<script>
   

    $(document).ready(function () {

$('.js-example-basic-single').select2();

});
</script>
<?= $this->endSection() ?>

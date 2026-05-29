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

            <?= form_dropdown_bs("year", $rocniky2, [], 'mb-3', "Ročník závodu") ?>

            <div class="mb-3">
    <label for="race_id" class="form-label">Závod</label>

    <select class="form-select js-example-basic-single" id="race_id" name="race_id">

        <?php foreach($zavody as $type => $races): ?>

            <optgroup label="<?= esc($type) ?>">

                <?php foreach($races as $race): ?>

                    <option value="<?= $race['id'] ?>">
                        <?= esc($race['default_name']) ?>
                    </option>

                <?php endforeach; ?>

            </optgroup>

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
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
    tinymce.init({
        license_key: 'gpl',
        promotion: false,
        selector: 'textarea#description',
        height: 500,
        entity_encoding: 'raw',
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount',
        ],
        toolbar: 'undo redo | blocks | ' +
            'bold italic underline backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });

    $(document).ready(function () {

$('.js-example-basic-single').select2({
    placeholder: 'Vyber závod',
    width: '100%'
});

});
</script>

<?= $this->endSection() ?>